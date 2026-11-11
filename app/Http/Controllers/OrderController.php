<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Show order confirmation / receipt page.
     */
    public function show(string $order_number): View
    {
        $order = Order::where('order_number', $order_number)
            ->with(['items.product'])
            ->firstOrFail();

        return view('pages.orders.show', compact('order'));
    }

    /**
     * Look up existing orders by order number and email or phone.
     */
    public function lookup(Request $request): View
    {
        $order = null;
        $searched = false;

        if ($request->filled('order_number')) {
            $searched = true;
            $orderNumber = trim($request->input('order_number'));
            $contact = trim($request->input('contact'));

            $query = Order::where('order_number', $orderNumber)->with(['items.product']);

            if (!empty($contact)) {
                $query->where(function ($q) use ($contact) {
                    $q->where('customer_email', 'like', "%{$contact}%")
                      ->orWhere('customer_phone', 'like', "%{$contact}%");
                });
            }

            $order = $query->first();
        }

        return view('pages.orders.lookup', compact('order', 'searched'));
    }
}
