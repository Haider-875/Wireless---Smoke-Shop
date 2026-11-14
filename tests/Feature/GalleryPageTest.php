<?php

namespace Tests\Feature;

use Tests\TestCase;

class GalleryPageTest extends TestCase
{
    /**
     * Test that the gallery page responds successfully.
     */
    public function test_gallery_page_loads_successfully(): void
    {
        $response = $this->get(route('gallery'));
        $response->assertStatus(200);

        // SEO Title and Eyebrow
        $response->assertSee('Store & Inventory Gallery');
        $response->assertSee('Inside the shop');
        $response->assertSee('and on the shelves');
        $response->assertSee('10010 Halls Ferry Rd · Live In-Store Showcase');

        // All 8 gallery images
        for ($i = 1; $i <= 8; $i++) {
            $response->assertSee("assets/images/gallery/{$i}.jpeg");
        }

        // Key titles and badges
        $response->assertSee('Storefront &amp; Iconic Rick &amp; Morty Mural', false);
        $response->assertSee('BUGS Wireless &amp; Smoke Shop Entrance', false);
        $response->assertSee('Apple iPhone Pro &amp; Pro Max Display Shelf', false);
        $response->assertSee('Samsung Galaxy S24 Ultra &amp; Google Pixel Showcase', false);
        $response->assertSee('Google Pixel 8 Pro Bay Blue &amp; Galaxy S24', false);

        // Filter pills
        $response->assertSee('All Photos (8)');
        $response->assertSee('Storefront &amp; Exterior (2)', false);
        $response->assertSee('Unlocked iPhones (4)');
        $response->assertSee('Samsung &amp; Google Pixel (2)', false);

        // Interactive Lightbox Modal
        $response->assertSee('id="galleryLightboxModal"', false);
        $response->assertSee('id="lightboxImage"', false);

        // Location & Counter CTA
        $response->assertSee('10010 Halls Ferry Rd, St. Louis, MO 63136');
        $response->assertSee('314-441-2851');
    }

    /**
     * Test that the gallery is linked in navigation and footer.
     */
    public function test_gallery_is_linked_in_navigation_and_footer(): void
    {
        $homeResponse = $this->get(route('home'));
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee(route('gallery'));
        $homeResponse->assertSee('Gallery');
        $homeResponse->assertSee('Store gallery');
    }
}
