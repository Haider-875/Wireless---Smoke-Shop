<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes — BUGS Wireless & Smoke Shop
|--------------------------------------------------------------------------
*/

// Homepage & Core Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/repairs', [RepairController::class, 'index'])->name('repairs');
Route::post('/repairs/quote', [RepairController::class, 'storeQuote'])->middleware('throttle:15,1')->name('repairs.quote');

// Dynamic XML Sitemap
Route::get('/sitemap.xml', function () {
    $products = \App\Models\Product::where('is_active', true)->get();
    $categories = \App\Models\Category::all();

    $content = view('sitemap', compact('products', 'categories'));
    return response($content, 200)->header('Content-Type', 'text/xml');
})->name('sitemap');

// Shop Catalog & Product Detail
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');

// Checkout Flow
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('throttle:15,1')->name('checkout.store');

// Order Confirmation & Lookup
Route::get('/orders/lookup', [OrderController::class, 'lookup'])->name('orders.lookup');
Route::get('/orders/{order_number}', [OrderController::class, 'show'])->name('orders.show');

// Legal Policies & Compliance (SKILL.md B10)
Route::view('/privacy', 'pages.legal.privacy')->name('privacy');
Route::view('/terms', 'pages.legal.terms')->name('terms');

/*
|--------------------------------------------------------------------------
| Session Cart API Routes (Authoritative Server-Side Prices)
|--------------------------------------------------------------------------
*/
Route::prefix('api/cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
});

/*
|--------------------------------------------------------------------------
| Admin Portal Authentication & Management Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Products Management
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'deleteProduct'])->name('products.delete');

    // Customer Orders Management
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::patch('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.status');

    // Repair Inquiries Management
    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('inquiries');
    Route::patch('/inquiries/{inquiry}/status', [AdminController::class, 'updateInquiryStatus'])->name('inquiries.status');
});
