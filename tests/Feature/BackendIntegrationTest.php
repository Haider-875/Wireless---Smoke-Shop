<?php

namespace Tests\Feature;

use App\Models\RepairInquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BackendIntegrationTest extends TestCase
{
    /**
     * Test repair quote submission with valid data.
     */
    public function test_repair_quote_submission_persists_in_database(): void
    {
        $payload = [
            'name' => 'John Doe',
            'phone' => '314-555-1234',
            'device_model' => 'iPhone 13 Pro',
            'service_needed' => 'Screen Replacement',
            'notes' => 'Cracked front glass after drop',
        ];

        $response = $this->postJson(route('repairs.quote'), $payload);

        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
        ]);

        $this->assertDatabaseHas('repair_inquiries', [
            'name' => 'John Doe',
            'phone' => '314-555-1234',
            'device_model' => 'iPhone 13 Pro',
            'service_needed' => 'Screen Replacement',
        ]);
    }

    /**
     * Test repair quote validation failure on missing fields.
     */
    public function test_repair_quote_requires_mandatory_fields(): void
    {
        $response = $this->postJson(route('repairs.quote'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'phone', 'device_model', 'service_needed']);
    }

    /**
     * Test session cart operations (add, update, remove, clear).
     */
    public function test_session_cart_api_lifecycle(): void
    {
        // Ensure product exists for testing cart lifecycle
        $product = \App\Models\Product::first();
        if (!$product) {
            $category = \App\Models\Category::firstOrCreate(['slug' => 'vapes'], ['name' => 'Vapes', 'sort_order' => 1]);
            $product = \App\Models\Product::create([
                'category_id' => $category->id,
                'name' => 'Geek Bar Pulse 15000',
                'slug' => 'vape-geekbar-pulse',
                'price' => 19.99,
                'stock' => 50,
                'is_active' => true,
            ]);
        }

        // 1. Initial cart should be empty
        $response = $this->getJson(route('cart.index'));
        $response->assertStatus(200);
        $response->assertJson([
            'count' => 0,
            'subtotal' => 0,
        ]);

        // 2. Add item to cart
        $response = $this->postJson(route('cart.add'), [
            'id' => $product->id,
            'quantity' => 2,
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'count' => 2,
            'subtotal' => round($product->price * 2, 2),
        ]);

        // 3. Update quantity
        $response = $this->postJson(route('cart.update'), [
            'id' => $product->id,
            'quantity' => 3,
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'count' => 3,
            'subtotal' => round($product->price * 3, 2),
        ]);

        // 4. Remove item
        $response = $this->postJson(route('cart.remove'), [
            'id' => $product->id,
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'count' => 0,
            'subtotal' => 0,
        ]);

        // 5. Add and Clear
        $this->postJson(route('cart.add'), [
            'id' => 'pipe-glass-spoon',
            'name' => 'Hand Blown Spoon Pipe',
            'price' => 15.00,
            'quantity' => 1,
        ]);

        $clearResponse = $this->postJson(route('cart.clear'));
        $clearResponse->assertStatus(200);
        $clearResponse->assertJson([
            'count' => 0,
            'subtotal' => 0,
        ]);
    }
}

