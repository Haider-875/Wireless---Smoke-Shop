<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;

class PerformanceSecuritySeoTest extends TestCase
{
    /**
     * Test that production security headers are attached by the middleware.
     */
    public function test_security_headers_are_emitted(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-XSS-Protection', '1; mode=block');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
    }

    /**
     * Test that SEO meta tags and OpenGraph tags render on homepage.
     */
    public function test_seo_meta_tags_and_opengraph_render_on_homepage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<meta name="description"', false);
        $response->assertSee('<link rel="canonical"', false);
        $response->assertSee('<meta property="og:title"', false);
        $response->assertSee('<meta property="og:type"', false);
        $response->assertSee('<meta property="og:url"', false);
        $response->assertSee('<meta name="twitter:card" content="summary_large_image"', false);
    }

    /**
     * Test that Schema.org LocalBusiness / ElectronicsStore JSON-LD renders.
     */
    public function test_schema_org_json_ld_renders_valid_store_data(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('application/ld+json');
        $response->assertSee('ElectronicsStore');
        $response->assertSee('10010 Halls Ferry Rd');
        $response->assertSee('+1-314-441-2851');
    }

    /**
     * Test that product detail page includes Product schema JSON-LD.
     */
    public function test_product_detail_page_emits_product_schema(): void
    {
        $category = Category::firstOrCreate(
            ['slug' => 'vapes'],
            ['name' => 'Vapes', 'description' => 'Vape devices and accessories']
        );

        $product = Product::firstOrCreate(
            ['slug' => 'test-seo-vape-device'],
            [
                'category_id' => $category->id,
                'name' => 'SEO Test Vape Device',
                'description' => 'A test device for schema verification',
                'price' => 29.99,
                'stock' => 10,
                'is_active' => true,
            ]
        );

        $response = $this->get(route('shop.show', $product->slug));

        $response->assertStatus(200);
        $response->assertSee('"@type": "Product"', false);
        $response->assertSee('SEO Test Vape Device');
        $response->assertSee('29.99');

        // Cleanup test product
        $product->delete();
    }

    /**
     * Test that sitemap and robots.txt are accessible.
     */
    public function test_sitemap_and_robots_are_accessible(): void
    {
        $sitemapResponse = $this->get('/sitemap.xml');
        $sitemapResponse->assertStatus(200);
        $sitemapResponse->assertSee('<urlset', false);
        $sitemapResponse->assertSee(url('/'), false);

        $this->assertFileExists(public_path('robots.txt'));
        $this->assertStringContainsString('sitemap.xml', file_get_contents(public_path('robots.txt')));
    }
}
