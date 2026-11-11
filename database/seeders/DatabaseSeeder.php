<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create or update Default Admin User
        User::updateOrCreate(
            ['email' => 'admin@bugswireless.com'],
            [
                'name' => 'Store Manager',
                'password' => Hash::make('admin12345'),
                'is_admin' => true,
            ]
        );

        // 2. Categories
        $categoriesData = [
            [
                'name' => 'Vapes',
                'slug' => 'vapes',
                'description' => 'Disposables, pods and rechargeables',
                'image' => 'cat-vapes.jpg',
                'sort_order' => 1,
            ],
            [
                'name' => 'E-Liquids',
                'slug' => 'e-liquids',
                'description' => 'Nic salts and freebase, 0–50mg',
                'image' => 'cat-eliquid.jpg',
                'sort_order' => 2,
            ],
            [
                'name' => 'Glass & Pipes',
                'slug' => 'glass-pipes',
                'description' => 'Beakers, spoons and hand-blown pieces',
                'image' => 'cat-glass.jpg',
                'sort_order' => 3,
            ],
            [
                'name' => 'Hookah',
                'slug' => 'hookah',
                'description' => 'Stems, hoses, bowls and shisha',
                'image' => 'cat-hookah.jpg',
                'sort_order' => 4,
            ],
            [
                'name' => 'Phone Accessories',
                'slug' => 'phone-accessories',
                'description' => 'Cases, glass, audio and power',
                'image' => 'cat-accessories.jpg',
                'sort_order' => 5,
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['slug']] = Category::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }

        // 3. Products with Realistic Photography
        $productsData = [
            [
                'category_slug' => 'vapes',
                'name' => 'Midnight Ice 20K Disposable',
                'slug' => 'midnight-ice-20k-disposable',
                'badge' => 'Best seller · Save $5.00',
                'price' => 24.99,
                'compare_at_price' => 29.99,
                'stock' => 45,
                'image' => 'vape-midnight-ice.jpg',
                'description' => 'Midnight Ice delivers a crisp blackberry and dark currant inhale cut with arctic mint. High-capacity battery with dual mesh coil and smart LED display.',
                'featured' => true,
            ],
            [
                'category_slug' => 'vapes',
                'name' => 'Blue Razz Cloud 6K',
                'slug' => 'blue-razz-cloud-6k',
                'badge' => 'New',
                'price' => 18.99,
                'compare_at_price' => null,
                'stock' => 30,
                'image' => 'vape-blue-razz.jpg',
                'description' => 'Bright blue raspberry candy on the inhale with an icy finish. Slim body, draw-activated, no buttons.',
                'featured' => true,
            ],
            [
                'category_slug' => 'e-liquids',
                'name' => 'Salty Coast Nic Salt 30ml',
                'slug' => 'salty-coast-nic-salt-30ml',
                'badge' => null,
                'price' => 21.99,
                'compare_at_price' => null,
                'stock' => 55,
                'image' => 'eliquid-salty-coast.jpg',
                'description' => 'Smooth coastal fruit blend with a cool menthol wave. Formulated for ultra-low wattage pod systems.',
                'featured' => true,
            ],
            [
                'category_slug' => 'glass-pipes',
                'name' => 'Ember Beaker Bong 12"',
                'slug' => 'ember-beaker-bong-12',
                'badge' => 'Staff pick · Save $15.00',
                'price' => 64.99,
                'compare_at_price' => 79.99,
                'stock' => 12,
                'image' => 'glass-ember-beaker.jpg',
                'description' => 'Heavy-duty 7mm borosilicate glass beaker with ice pinch and removable diffused downstem.',
                'featured' => true,
            ],
            [
                'category_slug' => 'glass-pipes',
                'name' => 'Nebula Hand Pipe',
                'slug' => 'nebula-hand-pipe',
                'badge' => null,
                'price' => 32.99,
                'compare_at_price' => null,
                'stock' => 20,
                'image' => 'glass-nebula-pipe.jpg',
                'description' => 'Thick color-changing fumed glass spoon pipe with deep bowl and ergonomic side carb.',
                'featured' => false,
            ],
            [
                'category_slug' => 'hookah',
                'name' => 'Brass Haze Hookah',
                'slug' => 'brass-haze-hookah',
                'badge' => 'Gift-ready',
                'price' => 129.99,
                'compare_at_price' => null,
                'stock' => 8,
                'image' => 'hookah-brass-haze.jpg',
                'description' => 'Traditional solid brass stem with heavy cut-crystal glass base, silicone washable hose, and unglazed clay bowl.',
                'featured' => false,
            ],
            [
                'category_slug' => 'phone-accessories',
                'name' => 'Fog Guard Clear Case',
                'slug' => 'fog-guard-clear-case',
                'badge' => null,
                'price' => 19.99,
                'compare_at_price' => null,
                'stock' => 75,
                'image' => 'case-fog-guard.jpg',
                'description' => 'Anti-yellowing crystal clear polycarbonate back with shock-absorbing TPU bumper and reinforced corners.',
                'featured' => false,
            ],
            [
                'category_slug' => 'phone-accessories',
                'name' => 'Armor Glass Screen Shield',
                'slug' => 'armor-glass-screen-shield',
                'badge' => null,
                'price' => 14.99,
                'compare_at_price' => null,
                'stock' => 100,
                'image' => 'screen-armor-glass.jpg',
                'description' => '9H hardness electroplated tempered glass with oleophobic fingerprint-resistant coating and installation alignment tray.',
                'featured' => false,
            ],
            [
                'category_slug' => 'phone-accessories',
                'name' => 'Pulse Buds Wireless',
                'slug' => 'pulse-buds-wireless',
                'badge' => 'Save $10.00',
                'price' => 49.99,
                'compare_at_price' => 59.99,
                'stock' => 25,
                'image' => 'audio-pulse-buds.jpg',
                'description' => 'True wireless stereo earbuds with active noise cancellation, deep bass drivers, and 32-hour battery life with charging case.',
                'featured' => false,
            ],
            [
                'category_slug' => 'phone-accessories',
                'name' => 'Ember Power Bank 10K',
                'slug' => 'ember-power-bank-10k',
                'badge' => null,
                'price' => 34.99,
                'compare_at_price' => null,
                'stock' => 40,
                'image' => 'power-ember-bank.jpg',
                'description' => '10,000mAh compact portable charger with 22.5W USB-C Power Delivery and dual high-speed outputs.',
                'featured' => false,
            ],
        ];

        foreach ($productsData as $prod) {
            $catSlug = $prod['category_slug'];
            unset($prod['category_slug']);
            $prod['category_id'] = $categories[$catSlug]->id;

            Product::updateOrCreate(
                ['slug' => $prod['slug']],
                $prod
            );
        }
    }
}
