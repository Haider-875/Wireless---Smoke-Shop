<?php

namespace Tests\Feature;

use Tests\TestCase;

class SharedComponentsTest extends TestCase
{
    /**
     * Verify that all global shared components render on the layout.
     */
    public function test_shared_components_render_correctly(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // 1. Navbar & Announcement Bar
        $response->assertSee('21+ only · ID required in store');
        $response->assertSee('Free local delivery over $50');
        $response->assertSee('Open daily 10 – 8');
        $response->assertSee('bugs-navbar-scroll');
        $response->assertSee('314-441-2851');
        $response->assertSee('data-bs-target="#bugsCartOffcanvas"', false);
        $response->assertSee('data-bs-target="#bugsMobileMenu"', false);

        // 2. Offcanvas Cart Drawer
        $response->assertSee('id="bugsCartOffcanvas"', false);
        $response->assertSee('Your Bag');
        $response->assertSee('cartEmptyState');
        $response->assertSee('cartSubtotalText');
        $response->assertSee('Empty the bag');

        // 3. Age Verification Modal
        $response->assertSee('id="bugsAgeModal"', false);
        $response->assertSee('Are you 21 or older?');
        $response->assertSee("Yes, I'm 21 or older", false);
        $response->assertSee('No, take me out');

        // 4. Footer
        $response->assertSee('10010 Halls Ferry Rd, St. Louis, MO 63136');
        $response->assertSee('Mon – Sun · 10:00 AM – 8:00 PM');
        $response->assertSee('https://www.instagram.com/bugs_wirless_and_smoke_shop/', false);
        $response->assertSee('21+ Only. Valid government-issued photo ID required', false);
    }
}
