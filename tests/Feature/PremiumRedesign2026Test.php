<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;

class PremiumRedesign2026Test extends TestCase
{
    /**
     * Test that the homepage renders all required reference sections and design tokens.
     */
    public function test_homepage_renders_all_required_sections_and_tokens(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // 1. Navigation & Header
        $response->assertSee('BUGS');
        $response->assertSee('Repairs');
        $response->assertSee('Phone gear');
        $response->assertSee('Shop all');
        $response->assertSee('Smoke shop');
        $response->assertSee('Visit us');
        $response->assertSee('Your orders');
        $response->assertSee('314-441-2851');
        $response->assertSee('Fix my phone');
        $response->assertSee('id="navCartCount"', false);
        $response->assertSee('data-bs-target="#bugsCartOffcanvas"', false);

        // 2. Exact Reference Hero Section
        $response->assertSee('Certified repair counter · St. Louis');
        $response->assertSee('Phone repair,');
        $response->assertSee('the same day');
        $response->assertSee('on Halls Ferry.');
        $response->assertSee('Free diagnostics');
        $response->assertSee('Bring it in — we quote the repair before we start.');
        $response->assertSee('30 min');
        $response->assertSee('90 days');
        $response->assertSee('All carriers');

        // 3. Repair Bench Section
        $response->assertSee('The repair bench');
        $response->assertSee('Broken today,');
        $response->assertSee('fixed by tonight');
        $response->assertSee('Screen & glass replacement');
        $response->assertSee('Battery replacement');
        $response->assertSee('Charging port repair');
        $response->assertSee('Liquid damage service');
        $response->assertSee('Data transfer & backup');
        $response->assertSee('Carrier activation');
        $response->assertSee('from $79');

        // 4. Featured Products (Wireless Counter)
        $response->assertSee('The wireless counter');
        $response->assertSee('Gear for the phone');
        $response->assertSee('you just fixed');
        $response->assertSee('What everybody gets with a new screen');
        $response->assertSee('Shop all products');
        $response->assertSee('data-add-to-cart=', false);

        // 5. Smoke Shop Aisles (Five Aisles)
        $response->assertSee('The smoke shop');
        $response->assertSee('side of the counter.');
        $response->assertSee('Disposables, pods and rechargeables');
        $response->assertSee('Nic salts and freebase, 0–50mg');
        $response->assertSee('Beakers, spoons and hand-blown pieces');
        $response->assertSee('Stems, hoses, bowls and shisha');
        $response->assertSee('Cases, glass, audio and power');

        // 6. Store Location & Hours
        $response->assertSee('Visit the counter');
        $response->assertSee('10010 Halls Ferry Rd, St. Louis, MO 63136');
        $response->assertSee('Mon – Sun · 10:00 AM – 8:00 PM');
        $response->assertSee('Get directions');

        // 7. Footer & Compliance
        $response->assertSee('bugs_wirless_and_smoke_shop');
        $response->assertSee('/policies#shipping');
        $response->assertSee('/policies#returns');
        $response->assertSee('/policies#age');
        $response->assertSee('/policies#privacy');

        // 8. Design System Assets & Libraries
        $response->assertSee('assets/css/bootstrap.min.css');
        $response->assertSee('assets/css/bugs-theme.css');
        $response->assertSee('assets/js/gsap.min.js');
        $response->assertSee('assets/js/ScrollTrigger.min.js');
        $response->assertSee('assets/js/lucide.min.js');
        $response->assertSee('assets/js/bugs-app.js');
    }

    /**
     * Test that legal pages render successfully.
     */
    public function test_legal_pages_render_successfully(): void
    {
        $privacyResponse = $this->get(route('privacy'));
        $privacyResponse->assertStatus(200);
        $privacyResponse->assertSee('The fine print');
        $privacyResponse->assertSee('Pickup, returns');
        $privacyResponse->assertSee('21+ age policy');

        $termsResponse = $this->get(route('terms'));
        $termsResponse->assertStatus(200);
        $termsResponse->assertSee('Terms and Conditions');
        $termsResponse->assertSee('Age Requirement &amp; Eligibility', false);
    }

    /**
     * Test custom 404 page renders for missing routes.
     */
    public function test_custom_404_page(): void
    {
        $response = $this->get('/non-existent-page-url-12345');
        $response->assertStatus(404);
        $response->assertSee('Page Not Found');
        $response->assertSee('Back to Homepage');
    }
}

