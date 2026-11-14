<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the storefront homepage.
     */
    public function index(): View
    {
        $categories = Category::orderBy('sort_order')->get();
        $featuredProducts = Product::where('is_active', true)
            ->where('featured', true)
            ->with('category')
            ->take(8)
            ->get();

        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::where('is_active', true)
                ->with('category')
                ->take(8)
                ->get();
        }

        $phoneShowcase = Product::where('is_active', true)
            ->whereHas('category', function ($query) {
                $query->where('slug', 'smartphones');
            })
            ->latest()
            ->take(6)
            ->get();

        return view('pages.home', compact('categories', 'featuredProducts', 'phoneShowcase'));
    }
}
