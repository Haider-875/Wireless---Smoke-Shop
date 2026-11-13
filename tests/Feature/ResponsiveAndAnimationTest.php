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
     * Test advanced cinematic motion design elements on homepage.
     */
    public function test_advanced_cinematic_motion_elements_render(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // 1. Motion and 3D Asset scripts
        $response->assertSee('assets/js/three.min.js');
        $response->assertSee('assets/js/gsap.min.js');
        $response->assertSee('assets/js/ScrollTrigger.min.js');
        $response->assertSee('assets/js/bugs-app.js');

        // 2. Three.js Ambient Particle Canvas in Hero
        $response->assertSee('id="heroThreeCanvas"', false);

        // 3. Pinned Apple-style Product Storytelling Section
        $response->assertSee('id="cinematicStorytelling"', false);
        $response->assertSee('story-pin-container');
        $response->assertSee('story-step');
        $response->assertSee('story-visual-stage');
        $response->assertSee('story-visual-layer');

        // 4. Controlled Horizontal Scrolling Section
        $response->assertSee('id="horizontalAislesSection"', false);
        $response->assertSee('id="horizontalTrack"', false);
        $response->assertSee('bugs-horizontal-track');
        $response->assertSee('bugs-horizontal-card');

        // 5. Image Masking Classes
        $response->assertSee('mask-reveal-wrap');
        $response->assertSee('mask-reveal-img');

        // 6. Final Cinematic CTA
        $response->assertSee('id="cinematicFinalCta"', false);
        $response->assertSee('Step up to the counter.');
    }
}
