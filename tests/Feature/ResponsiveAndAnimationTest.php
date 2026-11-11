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
}

