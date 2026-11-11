<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Get current session cart items and totals.
     */
    public function index(Request $request): JsonResponse
    {
        $cart = $request->session()->get('bugs_cart', []);
        
        // Ensure all items in cart still exist in database and sync authoritative prices
        $validCart = [];
        $count = 0;
        $subtotal = 0.0;

        if (!empty($cart)) {
            $productIds = array_keys($cart);
            $products = Product::whereIn('id', $productIds)->where('is_active', true)->get()->keyBy('id');

            foreach ($cart as $id => $item) {
                if (isset($products[$id])) {
                    $prod = $products[$id];
                    $qty = max(1, min((int)($item['quantity'] ?? 1), 50));
                    $itemTotal = $prod->price * $qty;

                    $validCart[$id] = [
                        'id' => $prod->id,
                        'slug' => $prod->slug,
                        'name' => $prod->name,
                        'category' => $prod->category?->name ?? 'Shop',
                        'price' => (float)$prod->price,
                        'formatted_price' => '$' . number_format($prod->price, 2),
                        'image' => $prod->image_url,
                        'quantity' => $qty,
                        'total' => (float)$itemTotal,
                        'formatted_total' => '$' . number_format($itemTotal, 2),
                    ];

                    $count += $qty;
                    $subtotal += $itemTotal;
                }
            }
        }

        $request->session()->put('bugs_cart', $validCart);

        return response()->json([
            'success' => true,
            'items' => array_values($validCart),
            'count' => $count,
            'subtotal' => round($subtotal, 2),
            'formatted_subtotal' => '$' . number_format($subtotal, 2),
        ]);
    }

    /**
     * Add an item to the session cart securely by database product_id or slug.
     * Price is authoritative from database. Any submitted price is validated or rejected.
     */
    public function add(Request $request): JsonResponse
    {
        // Support either product_id or id alias
        if (!$request->has('product_id') && $request->has('id')) {
            $request->merge(['product_id' => $request->input('id')]);
        }

        $validated = $request->validate([
            'product_id' => ['required'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:50'],
            'price' => ['nullable', 'numeric', 'min:0'],
        ]);

        $identifier = $validated['product_id'];
        $product = Product::where('id', $identifier)
            ->orWhere('slug', $identifier)
            ->where('is_active', true)
            ->first();

        if (!$product) {
            return response()->json([
                'message' => 'The selected product is invalid or unavailable.',
                'errors' => [
                    'product_id' => ['The selected product is invalid.'],
                ],
            ], 422);
        }

        // Validate client submitted price against authoritative DB record to prevent price manipulation
        if ($request->has('price') && abs((float)$request->input('price') - (float)$product->price) > 0.01) {
            return response()->json([
                'message' => 'Price manipulation detected. Authoritative database pricing enforced.',
                'errors' => [
                    'price' => ['The submitted price does not match the product record.'],
                ],
            ], 422);
        }

        $cart = $request->session()->get('bugs_cart', []);
        $id = $product->id;
        $qty = $validated['quantity'] ?? 1;

        if (isset($cart[$id])) {
            $newQty = min($cart[$id]['quantity'] + $qty, 50);
            $cart[$id]['quantity'] = $newQty;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'slug' => $product->slug,
                'name' => $product->name,
                'category' => $product->category?->name ?? 'Shop',
                'price' => (float)$product->price,
                'formatted_price' => '$' . number_format($product->price, 2),
                'image' => $product->image_url,
                'quantity' => $qty,
            ];
        }

        $request->session()->put('bugs_cart', $cart);

        return $this->index($request);
    }

    /**
     * Update item quantity in the cart.
     */
    public function update(Request $request): JsonResponse
    {
        if (!$request->has('product_id') && $request->has('id')) {
            $request->merge(['product_id' => $request->input('id')]);
        }

        $validated = $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required', 'integer', 'min:1', 'max:50'],
        ]);

        $cart = $request->session()->get('bugs_cart', []);
        $identifier = $validated['product_id'];

        $targetId = null;
        if (isset($cart[$identifier])) {
            $targetId = $identifier;
        } else {
            foreach ($cart as $key => $item) {
                if (($item['slug'] ?? '') === $identifier) {
                    $targetId = $key;
                    break;
                }
            }
        }

        if ($targetId && isset($cart[$targetId])) {
            $cart[$targetId]['quantity'] = $validated['quantity'];
        }

        $request->session()->put('bugs_cart', $cart);

        return $this->index($request);
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(Request $request): JsonResponse
    {
        if (!$request->has('product_id') && $request->has('id')) {
            $request->merge(['product_id' => $request->input('id')]);
        }

        $validated = $request->validate([
            'product_id' => ['required'],
        ]);

        $cart = $request->session()->get('bugs_cart', []);
        $identifier = $validated['product_id'];

        if (isset($cart[$identifier])) {
            unset($cart[$identifier]);
        } else {
            foreach ($cart as $key => $item) {
                if (($item['slug'] ?? '') === $identifier) {
                    unset($cart[$key]);
                    break;
                }
            }
        }

        $request->session()->put('bugs_cart', $cart);

        return $this->index($request);
    }

    /**
     * Clear the entire cart.
     */
    public function clear(Request $request): JsonResponse
    {
        $request->session()->forget('bugs_cart');

        return response()->json([
            'success' => true,
            'items' => [],
            'count' => 0,
            'subtotal' => 0.00,
            'formatted_subtotal' => '$0.00',
        ]);
    }
}
