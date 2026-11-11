<?php

namespace Tests\Feature;

use App\Models\RepairInquiry;
use Tests\TestCase;

class ComprehensiveFunctionalTest extends TestCase
{
    /**
     * Test repair quote standard form POST with session flash and redirect.
     */
    public function test_repair_quote_standard_form_redirects_with_flash(): void
    {
        $payload = [
            'name' => 'Sarah Connor',
            'phone' => '314-555-8899',
            'device_model' => 'Samsung Galaxy S22',
            'service_needed' => 'Battery Replacement',
            'notes' => 'Battery dies quickly in cold weather',
        ];

        $response = $this->post(route('repairs.quote'), $payload);

        $response->assertStatus(302);
        $response->assertRedirect(route('repairs'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('repair_inquiries', [
            'name' => 'Sarah Connor',
            'device_model' => 'Samsung Galaxy S22',
        ]);
    }

    /**
     * Test Cart API rejects invalid / negative pricing or quantity.
     */
    public function test_cart_api_rejects_invalid_inputs(): void
    {
        // Negative price
        $response = $this->postJson(route('cart.add'), [
            'id' => 'bad-item',
            'name' => 'Bad Item',
            'price' => -10.00,
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['price']);

        // Zero or negative quantity on update
        $response = $this->postJson(route('cart.update'), [
            'id' => 'bad-item',
            'quantity' => -1,
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['quantity']);
    }

    /**
     * Test unknown route returns clean 404 response.
     */
    public function test_unknown_route_returns_404(): void
    {
        $response = $this->get('/non-existent-page-url');
        $response->assertStatus(404);
    }

    /**
     * Test all assets linked in layout return HTTP 200.
     */
    public function test_static_assets_exist(): void
    {
        $this->assertFileExists(public_path('assets/css/bootstrap.min.css'));
        $this->assertFileExists(public_path('assets/css/bootstrap-icons.min.css'));
        $this->assertFileExists(public_path('assets/css/bugs-theme.css'));
        $this->assertFileExists(public_path('assets/js/bootstrap.bundle.min.js'));
        $this->assertFileExists(public_path('assets/js/bugs-app.js'));
        $this->assertFileExists(public_path('assets/images/logo.png'));
    }
}

