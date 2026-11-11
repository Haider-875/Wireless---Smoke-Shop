<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\RepairInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Show admin login form.
     */
    public function login(): View|RedirectResponse
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return view('pages.admin.login');
    }

    /**
     * Handle admin authentication.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (!Auth::user()->is_admin) {
                Auth::logout();
                return back()->with('error', 'Unauthorized access.');
            }

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    /**
     * Display admin overview metrics.
     */
    public function dashboard(): View
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalRevenue = Order::sum('total');
        $totalInquiries = RepairInquiry::count();
        $pendingInquiries = RepairInquiry::where('status', 'pending')->count();

        $recentOrders = Order::with('items')->latest()->take(5)->get();
        $recentInquiries = RepairInquiry::latest()->take(5)->get();

        return view('pages.admin.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'totalOrders',
            'pendingOrders',
            'totalRevenue',
            'totalInquiries',
            'pendingInquiries',
            'recentOrders',
            'recentInquiries'
        ));
    }

    /**
     * List all products.
     */
    public function products(): View
    {
        $products = Product::with('category')->latest()->paginate(15);
        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show create product form.
     */
    public function createProduct(): View
    {
        $categories = Category::orderBy('name')->get();
        return view('pages.admin.products.create', compact('categories'));
    }

    /**
     * Store a new product.
     */
    public function storeProduct(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'compare_at_price' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'badge' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['featured'] = $request->boolean('featured');

        Product::create($validated);

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    /**
     * Show edit product form.
     */
    public function editProduct(Product $product): View
    {
        $categories = Category::orderBy('name')->get();
        return view('pages.admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update product.
     */
    public function updateProduct(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'compare_at_price' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'badge' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'featured' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['featured'] = $request->boolean('featured');

        $product->update($validated);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    /**
     * Delete product.
     */
    public function deleteProduct(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted.');
    }

    /**
     * List all customer orders.
     */
    public function orders(): View
    {
        $orders = Order::with('items')->latest()->paginate(15);
        return view('pages.admin.orders.index', compact('orders'));
    }

    /**
     * Update order status.
     */
    public function updateOrderStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,confirmed,ready_for_pickup,completed,cancelled'],
        ]);

        $order->update(['status' => $validated['status']]);

        return back()->with('success', "Order #{$order->order_number} status updated to {$validated['status']}.");
    }

    /**
     * List all repair inquiries.
     */
    public function inquiries(): View
    {
        $inquiries = RepairInquiry::latest()->paginate(15);
        return view('pages.admin.inquiries.index', compact('inquiries'));
    }

    /**
     * Update repair inquiry status.
     */
    public function updateInquiryStatus(Request $request, RepairInquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,contacted,in_progress,completed,cancelled'],
        ]);

        $inquiry->update(['status' => $validated['status']]);

        return back()->with('success', "Inquiry status updated to {$validated['status']}.");
    }
}
