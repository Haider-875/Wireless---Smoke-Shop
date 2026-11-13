<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;

class PremiumRedesign2026Test extends TestCase
{
    /**
     * Test that the homepage renders all required 2026 redesign sections and tokens.
     */
    public function test_homepage_renders_all_required_sections_and_tokens(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // 1. Navigation & Header
        $response->assertSee('BUGS');
        $response->assertSee('bugs-floating-header');
        $response->assertSee('bugs-navbar-pill');
        $response->assertSee('Home');
        $response->assertSee('Shop');
        $response->assertSee('Vapes');
        $response->assertSee('E-Liquids');
        $response->assertSee('Glass &amp; Pipes', false);
        $response->assertSee('Hookah');
        $response->assertSee('Phone Repair');
        $response->assertSee('Contact');
        $response->assertSee('314-441-2851');
        $response->assertSee('id="navCartCount"', false);
        $response->assertSee('data-bs-target="#bugsSearchModal"', false);
        $response->assertSee('data-bs-target="#bugsMobileMenu"', false);

        // 2. Cinematic Hero Section
        $response->assertSee('Your smoke shop.');
        $response->assertSee('Your phone doctor.');
        $response->assertSee('Everything you need, from premium accessories to expert phone repairs, all in one place');
        $response->assertSee('Shop the shelves');
        $response->assertSee('Fix my phone');
        $response->assertSee('Walk-in repair desk');
        $response->assertSee('30 min');
        $response->assertSee('21+');
        $response->assertSee('7 days');

        // 3. Brand Experience Section
        $response->assertSee('Two worlds, one counter.');
        $response->assertSee('The BUGS Standard');
        $response->assertSee('Open Diagnostic Counter');

        // 4. Shop Categories (Five Aisles)
        $response->assertSee('Five aisles, one');
        $response->assertSee('What\'s on the shelves', false);
        $response->assertSee('Disposables, pods and rechargeables');
        $response->assertSee('Nic salts and freebase, 0–50mg');
        $response->assertSee('Beakers, spoons and hand-blown pieces');
        $response->assertSee('Stems, hoses, bowls and shisha');
        $response->assertSee('Cases, glass, audio and power');

        // 5. Featured Products
        $response->assertSee('What everybody');
        $response->assertSee('Moving fastest');
        $response->assertSee('Shop all products');
        $response->assertSee('data-add-to-cart=', false);

        // 6. Repair Bench Section
        $response->assertSee('The repair bench');
        $response->assertSee('Broken today,');
        $response->assertSee('fixed by tonight');
        $response->assertSee('Screen &amp; glass replacement', false);
        $response->assertSee('Battery replacement');
        $response->assertSee('Charging port repair');
        $response->assertSee('Liquid damage service');
        $response->assertSee('Data transfer &amp; backup', false);
        $response->assertSee('Carrier activation');
        $response->assertSee('Explore Repair Services');

        // 7. Mandatory Tagline Reveal Section (SKILL.md B11)
        $response->assertSee('id="brandTaglineSection"', false);
        $response->assertSee('class="tagline-word"', false);
        $response->assertSee('From');
        $response->assertSee('purest');
        $response->assertSee('smoothest');
        $response->assertSee('restoration');

        // 8. Why Choose BUGS Section
        $response->assertSee('Why Customers Return');
        $response->assertSee('Same-day repairs');
        $response->assertSee('Walk-in service');
        $response->assertSee('Free diagnosis');
        $response->assertSee('Strict 21+ verification');
        $response->assertSee('Local delivery');
        $response->assertSee('Open 7 days a week');

        // 9. Store Location & Hours
        $response->assertSee('Come through');
        $response->assertSee('Ten minutes from');
        $response->assertSee('10010 Halls Ferry Rd, St. Louis, MO 63136');
        $response->assertSee('Mon – Sun · 10:00 AM – 8:00 PM');
        $response->assertSee('Get directions');

        // 10. FAQ Section
        $response->assertSee('Frequently Asked Questions');
        $response->assertSee('How fast can my phone screen or battery be replaced?');
        $response->assertSee('Do I have to pay for a phone diagnosis?');
        $response->assertSee('Do I need an appointment for phone repair or shopping?');
        $response->assertSee('What are your operating hours and location?');
        $response->assertSee('How does in-store pickup and local delivery work?');
        $response->assertSee('What identification is required for purchasing?');

        // 11. Footer & Compliance
        $response->assertSee('The Shelves');
        $response->assertSee('Repair Bench');
        $response->assertSee('Visit The Counter');
        $response->assertSee('https://www.instagram.com/bugs_wirless_and_smoke_shop/', false);
        $response->assertSee('Privacy Policy');
        $response->assertSee('Terms and Conditions');
        $response->assertSee('Back to top');

        // 12. Modern Icons & Motion Libraries
        $response->assertSee('phosphor-regular.css');
        $response->assertSee('gsap.min.js');
        $response->assertSee('ScrollTrigger.min.js');
        $response->assertSee('bugs-app.js');
    }

    /**
     * Test that legal pages render successfully.
     */
    public function test_legal_pages_render_successfully(): void
    {
        $privacyResponse = $this->get(route('privacy'));
        $privacyResponse->assertStatus(200);
        $privacyResponse->assertSee('Privacy Policy');
        $privacyResponse->assertSee('21+ Age Verification');

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

