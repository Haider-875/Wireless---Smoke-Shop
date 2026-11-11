<?php

namespace App\Http\Controllers;

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
        $count = array_reduce($cart, fn($carry, $item) => $carry + ($item['quantity'] ?? 1), 0);
        $subtotal = array_reduce($cart, fn($carry, $item) => $carry + (($item['price'] ?? 0) * ($item['quantity'] ?? 1)), 0);

        return response()->json([
            'items' => array_values($cart),
            'count' => $count,
            'subtotal' => round($subtotal, 2),
            'formatted_subtotal' => '$' . number_format($subtotal, 2),
        ]);
    }

    /**
     * Add an item to the session cart.
     */
    public function add(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['nullable', 'integer', 'min:1'],
        ]);

        $cart = $request->session()->get('bugs_cart', []);
        $id = $validated['id'];
        $qty = $validated['quantity'] ?? 1;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $validated['name'],
                'price' => (float)$validated['price'],
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
        $validated = $request->validate([
            'id' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        $cart = $request->session()->get('bugs_cart', []);
        $id = $validated['id'];

        if (isset($cart[$id])) {
            if ($validated['quantity'] <= 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['quantity'] = $validated['quantity'];
            }
        }

        $request->session()->put('bugs_cart', $cart);

        return $this->index($request);
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id' => ['required', 'string'],
        ]);

        $cart = $request->session()->get('bugs_cart', []);
        unset($cart[$validated['id']]);
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
            'items' => [],
            'count' => 0,
            'subtotal' => 0.00,
            'formatted_subtotal' => '$0.00',
        ]);
    }
}
