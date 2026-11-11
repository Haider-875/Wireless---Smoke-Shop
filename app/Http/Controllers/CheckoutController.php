<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page with current session bag items.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $cart = $request->session()->get('bugs_cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('warning', 'Your bag is empty. Please add items to checkout.');
        }

        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->where('is_active', true)->get()->keyBy('id');

        $items = [];
        $subtotal = 0.0;

        foreach ($cart as $id => $cartItem) {
            if (isset($products[$id])) {
                $prod = $products[$id];
                $qty = (int)($cartItem['quantity'] ?? 1);
                $itemTotal = $prod->price * $qty;
                $items[] = [
                    'product' => $prod,
                    'quantity' => $qty,
                    'price' => $prod->price,
                    'total' => $itemTotal,
                ];
                $subtotal += $itemTotal;
            }
        }

        if (empty($items)) {
            $request->session()->forget('bugs_cart');
            return redirect()->route('shop.index')->with('warning', 'The items in your bag are no longer available.');
        }

        $taxRate = 0.0861; // St. Louis sales tax ~8.61%
        $tax = round($subtotal * $taxRate, 2);

        return view('pages.checkout', compact('items', 'subtotal', 'tax'));
    }

    /**
     * Process checkout submission and create order in database.
     */
    public function store(CheckoutRequest $request): RedirectResponse
    {
        $cart = $request->session()->get('bugs_cart', []);
        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'Your bag is empty.');
        }

        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->where('is_active', true)->get()->keyBy('id');

        $subtotal = 0.0;
        $orderItemsData = [];

        foreach ($cart as $id => $cartItem) {
            if (isset($products[$id])) {
                $prod = $products[$id];
                $qty = (int)($cartItem['quantity'] ?? 1);
                $itemTotal = $prod->price * $qty;

                $orderItemsData[] = [
                    'product_id' => $prod->id,
                    'product_name' => $prod->name,
                    'price' => $prod->price,
                    'quantity' => $qty,
                    'total' => $itemTotal,
                ];

                $subtotal += $itemTotal;
            }
        }

        if (empty($orderItemsData)) {
            $request->session()->forget('bugs_cart');
            return redirect()->route('shop.index')->with('error', 'Unable to process checkout because items are no longer available.');
        }

        $taxRate = 0.0861;
        $tax = round($subtotal * $taxRate, 2);

        $fulfillment = $request->input('fulfillment_type');
        $deliveryFee = 0.00;
        if ($fulfillment === 'delivery') {
            $deliveryFee = $subtotal >= 50.0 ? 0.00 : 4.99;
        } elseif ($fulfillment === 'shipping') {
            $deliveryFee = 5.99;
        }

        $total = round($subtotal + $tax + $deliveryFee, 2);

        // Generate unique order number (e.g. BUGS-837492)
        $orderNumber = 'BUGS-' . strtoupper(Str::random(7));

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_phone' => $request->input('customer_phone'),
            'fulfillment_type' => $fulfillment,
            'delivery_address' => $request->input('delivery_address'),
            'notes' => $request->input('notes'),
            'subtotal' => $subtotal,
            'tax' => $tax,
            'delivery_fee' => $deliveryFee,
            'total' => $total,
            'status' => 'pending',
            'payment_method' => $fulfillment === 'pickup' ? 'pay_at_counter' : 'cash_or_card_on_delivery',
        ]);

        foreach ($orderItemsData as $itemData) {
            $order->items()->create($itemData);
        }

        // Clear bag session after successful placement
        $request->session()->forget('bugs_cart');

        return redirect()->route('orders.show', $order->order_number)->with('success', 'Your order has been placed successfully!');
    }
}
