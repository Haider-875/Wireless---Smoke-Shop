<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewDataSeeder extends Seeder
{
    /**
     * Run the database seeds for all newly created data.
     */
    public function run(): void
    {
        // 1. Create / Update Smartphones Category
        $category = Category::updateOrCreate(
            ['slug' => 'smartphones'],
            [
                'name' => 'Smartphones & Counter Stock',
                'description' => 'Certified unlocked & carrier smartphones in-store at Bugs Wireless. Tested with clean ESN.',
                'image' => 'phones/iphone-1tb-unlocked-case.jpg',
                'sort_order' => 6,
            ]
        );

        // 2. Create / Update Smartphone Cards (From User Images)
        $phones = [
            [
                'name' => 'Apple iPhone 14 / 15 Pro Max (Unlocked 1TB)',
                'slug' => 'iphone-14-15-pro-max-unlocked',
                'badge' => '1TB Unlocked Stock',
                'price' => 799.99,
                'compare_at_price' => 899.99,
                'stock' => 8,
                'description' => 'Premium certified unlocked Apple iPhone Pro Max showcase. Available in Deep Purple, Silver, Space Black, and Gold. 1TB high-capacity tiers in stock. Inquire online or visit the Halls Ferry counter.',
                'image' => 'iphone-1tb-unlocked-case.jpg',
                'is_active' => true,
                'featured' => true,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra & S24+ (Titanium)',
                'slug' => 'samsung-galaxy-s24-ultra-titanium',
                'badge' => 'Titanium Series',
                'price' => 849.99,
                'compare_at_price' => 949.99,
                'stock' => 6,
                'description' => 'Flagship Samsung Galaxy S24 Ultra and S24+ counter units. Titanium Gray, Titanium Black, and Violet colorways on display. Tested, unlocked and ready for activation.',
                'image' => 'samsung-galaxy-pixel-showcase.jpg',
                'is_active' => true,
                'featured' => true,
            ],
            [
                'name' => 'Google Pixel 8 & Pixel 8 Pro (Flagship AI)',
                'slug' => 'google-pixel-8-pro-flagship',
                'badge' => 'Clean ESN',
                'price' => 549.99,
                'compare_at_price' => 649.99,
                'stock' => 5,
                'description' => 'Google Pixel 8 and 8 Pro showcase with Google Tensor G3 and advanced AI photography. In-store Bay Blue and Obsidian models available for same-day walk-in or pickup.',
                'image' => 'simple-mobile-samsung-galaxy.jpg',
                'is_active' => true,
                'featured' => true,
            ],
            [
                'name' => 'Apple iPhone 13 & 14 Pro (Sierra Blue & Alpine)',
                'slug' => 'iphone-13-14-pro-sierra-blue-alpine',
                'badge' => 'Multi-Carrier',
                'price' => 599.99,
                'compare_at_price' => 679.99,
                'stock' => 7,
                'description' => 'Certified iPhone Pro display units in Sierra Blue, Alpine Green, and Graphite. Multi-carrier ready for Ultra Mobile, Simple Mobile, T-Mobile, AT&T, and Verizon.',
                'image' => 'iphone-pro-colorways.jpg',
                'is_active' => true,
                'featured' => true,
            ],
            [
                'name' => 'Apple iPhone 14 & 15 Colors (Mint, Red & Sky Blue)',
                'slug' => 'iphone-14-15-color-editions',
                'badge' => 'Counter Special',
                'price' => 499.99,
                'compare_at_price' => 579.99,
                'stock' => 9,
                'description' => 'Vibrant Apple iPhone lineup including Product(RED), Mint Green, Soft Pink, and Sky Blue. Inspected and bench-tested with clean ESN and guaranteed battery health.',
                'image' => 'iphone-counter-display.jpg',
                'is_active' => true,
                'featured' => true,
            ],
            [
                'name' => 'In-Store Multi-Tier Smartphone Showcase',
                'slug' => 'in-store-mobile-phone-inventory-counter',
                'badge' => 'Halls Ferry Showcase',
                'price' => 399.99,
                'compare_at_price' => 499.99,
                'stock' => 15,
                'description' => 'Complete multi-tier display of iPhones, Samsung Galaxy, and Google Pixel smartphones at our 10010 Halls Ferry Rd counter. Trade-ins welcomed, free quotes, and immediate activations.',
                'image' => 'iphone-multi-tier-inventory.jpg',
                'is_active' => true,
                'featured' => true,
            ],
        ];

        foreach ($phones as $phone) {
            $phone['category_id'] = $category->id;
            Product::updateOrCreate(['slug' => $phone['slug']], $phone);
        }

        // 3. Create / Update Super Admin Account
        User::updateOrCreate(
            ['email' => 'superadmin@bugswireless.com'],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('SuperAdmin@Bugs2026!'),
                'is_admin' => true,
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
