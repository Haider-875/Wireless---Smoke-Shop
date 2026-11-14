<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display the storefront and inventory gallery.
     */
    public function index(): View
    {
        $categories = [
            'all' => 'All Photos',
            'store' => 'Storefront & Exterior',
            'iphones' => 'Unlocked iPhones',
            'android' => 'Samsung & Google Pixel',
        ];

        $photos = [
            [
                'id' => 1,
                'file' => '5.jpeg',
                'title' => 'Storefront & Iconic Rick & Morty Mural',
                'category' => 'store',
                'badge' => '10010 Halls Ferry Rd',
                'description' => 'Nighttime view of our 10010 Halls Ferry Road storefront featuring the custom hand-painted Rick & Morty mural, customer parking, and neon signage.',
                'meta' => 'Storefront · Halls Ferry Rd'
            ],
            [
                'id' => 2,
                'file' => '6.jpeg',
                'title' => 'BUGS Wireless & Smoke Shop Entrance',
                'category' => 'store',
                'badge' => 'Open Daily 10 – 8',
                'description' => 'Full storefront view with bright OPEN window signage, cell phone counter displays, and convenient walk-in access.',
                'meta' => 'Storefront · Walk-ins Welcome'
            ],
            [
                'id' => 3,
                'file' => '1.jpeg',
                'title' => 'Apple iPhone Pro & Pro Max Display Shelf',
                'category' => 'iphones',
                'badge' => 'Unlocked & Certified',
                'description' => 'Glass display cases loaded with unlocked iPhone 14 Pro and 15 Pro Max devices in Natural Titanium, Deep Purple, Gold, and Sierra Blue.',
                'meta' => 'Apple Pro Series · Pristine Grade'
            ],
            [
                'id' => 4,
                'file' => '2.jpeg',
                'title' => 'High-Capacity 1TB Unlocked iPhones',
                'category' => 'iphones',
                'badge' => 'Up to 1TB Storage',
                'description' => 'Top-tier storage configurations up to 1TB, tested and sanitized for instant activation across all major US carriers.',
                'meta' => 'Carrier Unlocked · 1TB Models'
            ],
            [
                'id' => 5,
                'file' => '3.jpeg',
                'title' => 'Samsung Galaxy S24 Ultra & Google Pixel Showcase',
                'category' => 'android',
                'badge' => 'Flagship Android',
                'description' => 'Samsung Galaxy S23 Ultra, S24 Ultra, and Google Pixel flagships ready with Simple Mobile activation options.',
                'meta' => 'Samsung Ultra · Simple Mobile'
            ],
            [
                'id' => 6,
                'file' => '4.jpeg',
                'title' => 'Google Pixel 8 Pro Bay Blue & Galaxy S24',
                'category' => 'android',
                'badge' => 'Bay Blue & Obsidian',
                'description' => 'Google Pixel 8 Pro in Bay Blue alongside Galaxy S-series and wireless headphones on display at the repair counter.',
                'meta' => 'Google Pixel · Galaxy S24'
            ],
            [
                'id' => 7,
                'file' => '7.jpeg',
                'title' => 'Certified Pre-Owned iPhones Display Counter',
                'category' => 'iphones',
                'badge' => 'Ultra Mobile Counter',
                'description' => 'Inspected and certified pre-owned iPhones in Alpine Green, Pink, and Polar White with 90-day warranty included.',
                'meta' => 'Certified Pre-Owned · 90-Day Warranty'
            ],
            [
                'id' => 8,
                'file' => '8.jpeg',
                'title' => 'Color Collection & Same-Day Activation',
                'category' => 'iphones',
                'badge' => 'Instant Activation',
                'description' => 'Vibrant Sierra Blue, Alpine Green, and Jet Black iPhones ready for counter pickup or immediate prepaid carrier activation.',
                'meta' => 'Prepaid & Postpaid · Same Day'
            ],
        ];

        return view('pages.gallery', compact('photos', 'categories'));
    }
}
