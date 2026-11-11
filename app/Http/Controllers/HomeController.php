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
            ->take(4)
            ->get();

        return view('pages.home', compact('categories', 'featuredProducts'));
    }
}
