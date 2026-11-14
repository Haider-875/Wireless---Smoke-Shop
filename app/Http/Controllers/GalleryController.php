<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display the inventory and device showcase gallery.
     */
    public function index(): View
    {
        $categories = [
            'all' => 'All Photos',
            'iphones' => 'Unlocked iPhones',
            'android' => 'Samsung & Google Pixel',
        ];

        $photos = [
            [
                'id' => 1,
                'file' => '1.jpeg',
                'title' => 'Apple iPhone Pro & Pro Max Display Shelf',
                'category' => 'iphones',
                'description' => 'Glass display cases loaded with unlocked iPhone 14 Pro and 15 Pro Max devices in Natural Titanium, Deep Purple, Gold, and Sierra Blue.',
                'meta' => 'Apple Pro Series · Pristine Grade'
            ],
            [
                'id' => 2,
                'file' => '2.jpeg',
                'title' => 'High-Capacity 1TB Unlocked iPhones',
                'category' => 'iphones',
                'description' => 'Top-tier storage configurations up to 1TB, tested and sanitized for instant activation across all major US carriers.',
                'meta' => 'Carrier Unlocked · 1TB Models'
            ],
            [
                'id' => 3,
                'file' => '3.jpeg',
                'title' => 'Samsung Galaxy S24 Ultra & Google Pixel Showcase',
                'category' => 'android',
                'description' => 'Samsung Galaxy S23 Ultra, S24 Ultra, and Google Pixel flagships ready with Simple Mobile activation options.',
                'meta' => 'Samsung Ultra · Simple Mobile'
            ],
            [
                'id' => 4,
                'file' => '4.jpeg',
                'title' => 'Google Pixel 8 Pro Bay Blue & Galaxy S24',
                'category' => 'android',
                'description' => 'Google Pixel 8 Pro in Bay Blue alongside Galaxy S-series and wireless headphones on display at the repair counter.',
                'meta' => 'Google Pixel · Galaxy S24'
            ],
            [
                'id' => 5,
                'file' => '7.jpeg',
                'title' => 'Certified Pre-Owned iPhones Display Counter',
                'category' => 'iphones',
                'description' => 'Inspected and certified pre-owned iPhones in Alpine Green, Pink, and Polar White with 90-day warranty included.',
                'meta' => 'Certified Pre-Owned · 90-Day Warranty'
            ],
            [
                'id' => 6,
                'file' => '8.jpeg',
                'title' => 'Color Collection & Same-Day Activation',
                'category' => 'iphones',
                'description' => 'Vibrant Sierra Blue, Alpine Green, and Jet Black iPhones ready for counter pickup or immediate prepaid carrier activation.',
                'meta' => 'Prepaid & Postpaid · Same Day'
            ],
        ];

        return view('pages.gallery', compact('photos', 'categories'));
    }
}
