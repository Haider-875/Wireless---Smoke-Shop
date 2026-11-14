<?php

namespace Tests\Feature;

use Tests\TestCase;

class ResponsiveAndAnimationTest extends TestCase
{
    /**
     * Test viewport meta tag and responsive layout breakpoints.
     */
    public function test_responsive_meta_and_layout_elements(): void
    {
        $response = $this->get('/repairs');

        $response->assertStatus(200);

        // 1. Check viewport meta
        $response->assertSee('<meta name="viewport" content="width=device-width, initial-scale=1">', false);

        // 2. Responsive grid breakpoints on services
        $response->assertSee('col-md-6 col-lg-4');

        // 3. Responsive grid breakpoints on 3 steps
        $response->assertSee('col-lg-4');

        // 4. Responsive flex CTA banner
        $response->assertSee('flex-column flex-md-row');

        // 5. Check animation classes and assets
        $response->assertSee('bugs-service-card');
        $response->assertSee('bugs-cta-card');
        $response->assertSee('btn-bugs-primary');
        $response->assertSee('glow-gold');
    }

    /**
     * Test motion, animations and interactive elements on homepage matching reference.
     */
    public function test_advanced_cinematic_motion_elements_render(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // 1. Motion and Icon Asset scripts
        $response->assertSee('assets/js/gsap.min.js');
        $response->assertSee('assets/js/ScrollTrigger.min.js');
        $response->assertSee('assets/js/lucide.min.js');
        $response->assertSee('assets/js/bugs-app.js');

        // 2. Ambient radial lighting and glows
        $response->assertSee('glow-platinum');
        $response->assertSee('glow-steel');
        $response->assertSee('glow-gold');

        // 3. Infinite Marquee Announcement Ticker
        $response->assertSee('marquee-track');
        $response->assertSee('marquee-content');
        $response->assertSee('Same-day screen repair');

        // 4. Interactive Drawers and Modals
        $response->assertSee('id="bugsCartOffcanvas"', false);
        $response->assertSee('id="bugsAgeModal"', false);
        $response->assertSee('id="bugsSearchModal"', false);

        // 5. Card motion and transitions
        $response->assertSee('transition-all');
        $response->assertSee('ratio-1x1');
    }
}
