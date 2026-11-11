<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoutesAndLayoutTest extends TestCase
{
    /**
     * Test the homepage responds with status 200 and loads layout components.
     */
    public function test_homepage_responds_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('BUGS');
        $response->assertSee('Your smoke shop');
        $response->assertSee('assets/css/bootstrap.min.css');
        $response->assertSee('assets/css/bugs-theme.css');
        $response->assertDontSee('tailwindcss');
    }

    /**
     * Test the repairs page responds with status 200 and matches all reference sections.
     */
    public function test_repairs_page_responds_successfully(): void
    {
        $response = $this->get('/repairs');

        $response->assertStatus(200);

        // 1. Hero Section
        $response->assertSee('The repair bench');
        $response->assertSee('We fix all phones');
        $response->assertSee('while you wait');
        $response->assertSee('glow-gold');
        $response->assertSee('Call 314-441-2851');
        $response->assertSee('Walk in — 10010 Halls Ferry Rd, St. Louis, MO 63136');

        // 2. What We Fix 6 Cards
        $response->assertSee('What we');
        $response->assertSee('fix');
        $response->assertSee('Screen & glass replacement');
        $response->assertSee('Battery replacement');
        $response->assertSee('Charging port repair');
        $response->assertSee('Liquid damage service');
        $response->assertSee('Data transfer & backup');
        $response->assertSee('Carrier activation');
        $response->assertSee("Prices depend on your model and the part — you'll always get the number before we start.", false);

        // 3. 3-Step Process
        $response->assertSee('01');
        $response->assertSee('Bring it in');
        $response->assertSee('02');
        $response->assertSee('Free quote');
        $response->assertSee('03');
        $response->assertSee('Same-day fix');

        // 4. CTA Shop Counter Banner
        $response->assertSee('Open Mon – Sun · 10:00 AM – 8:00 PM');
        $response->assertSee('Bring it by the counter.');
        $response->assertSee('Free diagnosis · no appointment needed');
        $response->assertSee('Call the shop');
    }
}
