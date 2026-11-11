<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\RepairInquiry;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RefinementAndCompletionTest extends TestCase
{
    /**
     * Test shop catalog loads and displays products.
     */
    public function test_shop_catalog_displays_products(): void
    {
        $response = $this->get(route('shop.index'));
        $response->assertStatus(200);
        $response->assertSee('Everything in');
        $response->assertSee('All Products');
    }

    /**
     * Test shop catalog category filter.
     */
    public function test_shop_catalog_filters_by_category(): void
    {
        $category = Category::where('slug', 'vapes')->first();
        if ($category) {
            $response = $this->get(route('shop.index', ['category' => 'vapes']));
            $response->assertStatus(200);
            $response->assertSee($category->name);
        } else {
            $this->assertTrue(true);
        }
    }

    /**
     * Test product detail page loads with accurate data.
     */
    public function test_product_detail_page_loads_successfully(): void
    {
        $product = Product::where('is_active', true)->first();
        $this->assertNotNull($product, 'At least one active product should exist in database.');

        $response = $this->get(route('shop.show', $product->slug));
        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee('$' . number_format($product->price, 2));
        $response->assertSee('Add to Bag');
        $response->assertSee('21+ Age Verification Required');
    }

    /**
     * Test cart security: price tampering is rejected.
     */
    public function test_cart_security_rejects_price_tampering(): void
    {
        $product = Product::where('is_active', true)->first();

        // Attempt to submit a modified fake price (e.g. $1.00 when product price is higher)
        $response = $this->postJson(route('cart.add'), [
            'product_id' => $product->id,
            'price' => 1.00,
            'quantity' => 1,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['price']);
    }

    /**
     * Test checkout requires items in session cart.
     */
    public function test_checkout_redirects_when_cart_is_empty(): void
    {
        $response = $this->withSession([])->get(route('checkout'));
        $response->assertRedirect(route('shop.index'));
    }

    /**
     * Test checkout page loads when cart has items.
     */
    public function test_checkout_loads_when_cart_has_items(): void
    {
        $product = Product::where('is_active', true)->first();

        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float)$product->price,
                'quantity' => 2,
            ],
        ];

        $response = $this->withSession(['bugs_cart' => $cart])->get(route('checkout'));
        $response->assertStatus(200);
        $response->assertSee('Checkout');
        $response->assertSee($product->name);
        $response->assertSee('How would you like to receive your order?');
    }

    /**
     * Test checkout submission creates order in database and clears cart.
     */
    public function test_checkout_submission_persists_order_and_clears_cart(): void
    {
        $product = Product::where('is_active', true)->first();

        $cart = [
            $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float)$product->price,
                'quantity' => 1,
            ],
        ];

        $orderPayload = [
            'customer_name' => 'Alice Test',
            'customer_phone' => '314-555-7890',
            'customer_email' => 'alice@example.com',
            'fulfillment_type' => 'pickup',
            'age_confirmed' => '1',
            'notes' => 'Testing order flow',
        ];

        $response = $this->withSession(['bugs_cart' => $cart])->post(route('checkout.store'), $orderPayload);

        $response->assertStatus(302);

        $order = Order::where('customer_phone', '314-555-7890')->latest()->first();
        $this->assertNotNull($order);
        $this->assertEquals('Alice Test', $order->customer_name);
        $this->assertEquals('pickup', $order->fulfillment_type);
        $this->assertGreaterThan(0, $order->total);

        // Check order item persisted
        $this->assertDatabaseHas('order_items', [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        // Cart should be cleared from session
        $response->assertSessionMissing('bugs_cart');
    }

    /**
     * Test order lookup displays matching order.
     */
    public function test_order_lookup_finds_existing_order(): void
    {
        $order = Order::latest()->first();
        if (!$order) {
            $order = Order::create([
                'order_number' => 'ORD-TEST-9999',
                'customer_name' => 'Lookup Tester',
                'customer_email' => 'lookup@example.com',
                'customer_phone' => '314-555-9999',
                'fulfillment_type' => 'pickup',
                'subtotal' => 19.99,
                'tax' => 1.72,
                'delivery_fee' => 0.00,
                'total' => 21.71,
                'status' => 'pending',
                'age_confirmed' => true,
            ]);
        }

        $response = $this->get(route('orders.lookup', [
            'order_number' => $order->order_number,
            'contact' => $order->customer_phone,
        ]));

        $response->assertStatus(200);
        $response->assertSee($order->order_number);
        $response->assertSee($order->customer_name);
    }

    /**
     * Test admin routes are protected against unauthenticated users.
     */
    public function test_admin_dashboard_redirects_unauthenticated(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test admin dashboard accessible by authenticated admin.
     */
    public function test_admin_dashboard_accessible_by_admin(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@bugswireless.com'],
            [
                'name' => 'Store Manager',
                'password' => Hash::make('admin12345'),
                'is_admin' => true,
            ]
        );

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Admin Dashboard');
        $response->assertSee('Products');
        $response->assertSee('Orders');
    }

    /**
     * Test admin can create a new product.
     */
    public function test_admin_can_create_product(): void
    {
        $admin = User::where('is_admin', true)->first();
        $category = Category::first();

        $productData = [
            'category_id' => $category->id,
            'name' => 'Unit Test Premium Vape',
            'price' => 24.99,
            'compare_at_price' => 29.99,
            'stock' => 30,
            'badge' => 'Test Unit',
            'image' => 'vape-midnight-ice.jpg',
            'description' => 'Created during automated feature testing',
            'is_active' => '1',
            'featured' => '0',
        ];

        $response = $this->actingAs($admin)->post(route('admin.products.store'), $productData);
        $response->assertRedirect(route('admin.products'));

        $this->assertDatabaseHas('products', [
            'name' => 'Unit Test Premium Vape',
            'price' => 24.99,
        ]);
    }

    /**
     * Test admin can update order status.
     */
    public function test_admin_can_update_order_status(): void
    {
        $admin = User::where('is_admin', true)->first();
        $order = Order::latest()->first();

        if (!$order) {
            $order = Order::create([
                'order_number' => 'ORD-TEST-8888',
                'customer_name' => 'Status Tester',
                'customer_email' => 'status@example.com',
                'customer_phone' => '314-555-8888',
                'fulfillment_type' => 'pickup',
                'subtotal' => 20.00,
                'tax' => 1.72,
                'delivery_fee' => 0.00,
                'total' => 21.72,
                'status' => 'pending',
                'age_confirmed' => true,
            ]);
        }

        $response = $this->actingAs($admin)->patch(route('admin.orders.status', $order), [
            'status' => 'confirmed',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'status' => 'confirmed',
        ]);
    }

    /**
     * Test admin can update repair inquiry status.
     */
    public function test_admin_can_update_inquiry_status(): void
    {
        $admin = User::where('is_admin', true)->first();
        $inquiry = RepairInquiry::latest()->first();

        if (!$inquiry) {
            $inquiry = RepairInquiry::create([
                'name' => 'Inquiry Tester',
                'phone' => '314-555-7777',
                'device_model' => 'iPhone 14 Pro',
                'service_needed' => 'Battery Replacement',
                'notes' => 'Battery health at 74%',
                'status' => 'pending',
            ]);
        }

        $response = $this->actingAs($admin)->patch(route('admin.inquiries.status', $inquiry), [
            'status' => 'contacted',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('repair_inquiries', [
            'id' => $inquiry->id,
            'status' => 'contacted',
        ]);
    }
}
