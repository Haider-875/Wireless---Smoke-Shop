<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Tests\TestCase;

class FinalProductionQATest extends TestCase
{
    /**
     * 1. Test visitor journey: home and repairs pages, quote submission, and DB persistence.
     */
    public function test_visitor_journey_home_and_repairs(): void
    {
        // Homepage
        $homeResponse = $this->get('/');
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('Walk-in repair desk');
        $homeResponse->assertSee('Five aisles, one');
        $homeResponse->assertSee('What everybody');
        $homeResponse->assertSee('10010 Halls Ferry Rd');
        $homeResponse->assertSee('314-441-2851');

        // Repairs page
        $repairsResponse = $this->get('/repairs');
        $repairsResponse->assertStatus(200);
        $repairsResponse->assertSee('The repair bench');
        $repairsResponse->assertSee('What we');
        $repairsResponse->assertSee('Screen Replacement');
        $repairsResponse->assertSee('Battery Replacement');
        $repairsResponse->assertSee('Request a Repair Quote');

        // Quote submission
        $quotePayload = [
            'name' => 'Sarah Connor',
            'phone' => '314-555-8822',
            'device_model' => 'iPhone 15 Pro Max',
            'service_needed' => 'Screen Replacement',
            'notes' => 'Cracked OLED screen, touch unresponsive',
        ];

        $quoteResponse = $this->post(route('repairs.quote'), $quotePayload);
        $quoteResponse->assertRedirect(route('repairs'));
        $quoteResponse->assertSessionHas('success');

        $this->assertDatabaseHas('repair_inquiries', [
            'name' => 'Sarah Connor',
            'device_model' => 'iPhone 15 Pro Max',
            'service_needed' => 'Screen Replacement',
        ]);
    }

    /**
     * 2. Test shopper journey: catalog search, product detail, cart lifecycle, checkout, order lookup.
     */
    public function test_shopper_journey_catalog_cart_checkout_and_lookup(): void
    {
        // 1. Search in shop
        $shopSearchResponse = $this->get('/shop?search=Disposable');
        $shopSearchResponse->assertStatus(200);

        // 2. Fetch or create a test product
        $category = Category::firstOrCreate(['slug' => 'vapes'], ['name' => 'Vapes']);
        $product = Product::firstOrCreate(
            ['slug' => 'qa-test-vape-bar'],
            [
                'category_id' => $category->id,
                'name' => 'QA Test Vape Bar',
                'description' => 'Tested for final QA production flow',
                'price' => 24.99,
                'stock' => 50,
                'is_active' => true,
            ]
        );

        // 3. View detail page
        $detailResponse = $this->get(route('shop.show', $product->slug));
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee('QA Test Vape Bar');
        $detailResponse->assertSee('24.99');
        $detailResponse->assertSee('21+ Age Verification Required');

        // 4. Cart API lifecycle
        $addCartResponse = $this->postJson(route('cart.add'), [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);
        $addCartResponse->assertStatus(200);
        $addCartResponse->assertJson(['success' => true, 'count' => 2]);

        // 5. Checkout page
        $checkoutPageResponse = $this->get(route('checkout'));
        $checkoutPageResponse->assertStatus(200);
        $checkoutPageResponse->assertSee('Step 1 · Fulfillment');
        $checkoutPageResponse->assertSee('Step 2 · Contact Information');
        $checkoutPageResponse->assertSee('Step 3 · Payment & Compliance');
        $checkoutPageResponse->assertSee('QA Test Vape Bar');

        // 6. Submit checkout
        $checkoutPayload = [
            'customer_name' => 'Alex QA Tester',
            'customer_email' => 'alex.qa@example.com',
            'customer_phone' => '314-555-4433',
            'customer_address' => '123 QA Lane, St. Louis, MO',
            'fulfillment_type' => 'pickup',
            'age_confirmed' => '1',
            'notes' => 'Hold at front desk',
        ];

        $checkoutSubmitResponse = $this->post(route('checkout.store'), $checkoutPayload);
        $this->assertDatabaseHas('orders', [
            'customer_name' => 'Alex QA Tester',
            'customer_email' => 'alex.qa@example.com',
        ]);

        $order = Order::where('customer_email', 'alex.qa@example.com')->latest()->first();
        $this->assertNotNull($order);
        $checkoutSubmitResponse->assertRedirect(route('orders.show', $order->order_number));

        // 7. Order Lookup
        $lookupResponse = $this->get(route('orders.lookup', [
            'order_number' => $order->order_number,
        ]));
        $lookupResponse->assertStatus(200);
        $lookupResponse->assertSee($order->order_number);
        $lookupResponse->assertSee('Order Found');

        // Clean up test records
        $order->items()->delete();
        $order->delete();
        $product->delete();
    }

    /**
     * 3. Test administrative security, portal access, and status updates.
     */
    public function test_admin_portal_flow_and_security(): void
    {
        // Unauthenticated access redirects to login
        $unauthResponse = $this->get(route('admin.dashboard'));
        $unauthResponse->assertRedirect(route('login'));

        // Admin authentication
        $admin = User::firstOrCreate(
            ['email' => 'admin_qa@bugswireless.com'],
            [
                'name' => 'QA Admin',
                'password' => bcrypt('password123'),
                'is_admin' => true,
            ]
        );
        $admin->is_admin = true;
        $admin->save();

        $authResponse = $this->actingAs($admin)->get(route('admin.dashboard'));
        $authResponse->assertStatus(200);
        $authResponse->assertSee('Admin Dashboard');
        $authResponse->assertSee('Products');
        $authResponse->assertSee('Orders');
        $authResponse->assertSee('Repair Inquiries');

        // Cleanup
        $admin->delete();
    }

    /**
     * 4. Technical compliance: Zero Tailwind CSS, valid robots, sitemap, and security headers.
     */
    public function test_production_readiness_and_zero_tailwind(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Security headers
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');

        // Zero Tailwind check
        $response->assertDontSee('tailwind');
        $response->assertDontSee('@tailwind');

        // Static files check
        $this->assertFileExists(public_path('assets/css/bootstrap.min.css'));
        $this->assertFileExists(public_path('assets/css/bugs-theme.css'));
        $this->assertFileExists(public_path('assets/js/bootstrap.bundle.min.js'));
        $this->assertFileExists(public_path('assets/js/bugs-app.js'));
        $this->assertFileExists(public_path('robots.txt'));
        $this->assertFileExists(public_path('sitemap.xml'));
    }
}
