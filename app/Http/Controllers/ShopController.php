<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display product catalog with search and category filtering.
     */
    public function index(Request $request): View
    {
        $categories = Category::orderBy('sort_order')->get();
        $query = Product::where('is_active', true)->with('category');

        $activeCategory = null;
        if ($request->filled('category')) {
            $activeCategory = Category::where('slug', $request->query('category'))->first();
            if ($activeCategory) {
                $query->where('category_id', $activeCategory->id);
            }
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $sort = $request->query('sort', 'featured');
        match ($sort) {
            'price-asc' => $query->orderBy('price', 'asc'),
            'price-desc' => $query->orderBy('price', 'desc'),
            'newest' => $query->orderBy('id', 'desc'),
            default => $query->orderBy('featured', 'desc')->orderBy('id', 'asc'),
        };

        $products = $query->paginate(12)->withQueryString();

        return view('pages.shop.index', compact('categories', 'products', 'activeCategory'));
    }

    /**
     * Display single product detail page.
     */
    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('pages.shop.show', compact('product', 'relatedProducts'));
    }
}
