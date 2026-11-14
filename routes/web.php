<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeployController;

/*
|--------------------------------------------------------------------------
| Web Routes — BUGS Wireless & Smoke Shop
|--------------------------------------------------------------------------
*/

// Simple 1-click route to migrate & seed all new phone cards and super admin on production
Route::get('/seed-data', function () {
    try {
        // Run database migrations
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $migrateOut = \Illuminate\Support\Facades\Artisan::output();

        // Run consolidated new data seeder
        \Illuminate\Support\Facades\Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\NewDataSeeder',
            '--force' => true,
        ]);
        $seedOut = \Illuminate\Support\Facades\Artisan::output();

        // Clear view and config caches
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');

        return response("
            <div style='font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 24px; border-radius: 12px; background: #111; color: #fff; border: 1px solid #333;'>
                <h2 style='color: #22c55e; margin-top: 0;'>✅ Success! Data Seeded</h2>
                <p>Migrations applied, all 6 smartphone cards added, and Super Admin created.</p>
                <div style='background: #000; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 12px; color: #a3e635; margin: 16px 0;'>"
                    . nl2br(e($migrateOut . $seedOut)) . "
                </div>
                <p style='margin-bottom: 0;'>
                    <a href='/' style='color: #FFB800; font-weight: bold; text-decoration: none;'>&larr; View Live Homepage</a> &bull; 
                    <a href='/shop?category=smartphones' style='color: #FFB800; font-weight: bold; text-decoration: none;'>View Phone Cards</a> &bull; 
                    <a href='/admin/login' style='color: #FFB800; font-weight: bold; text-decoration: none;'>Admin Login</a>
                </p>
            </div>
        ", 200)->header('Content-Type', 'text/html');
    } catch (\Throwable $e) {
        return response("
            <div style='font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 24px; border-radius: 12px; background: #111; color: #fff; border: 1px solid #ef4444;'>
                <h2 style='color: #ef4444; margin-top: 0;'>❌ Migration / Seeding Error</h2>
                <pre style='background: #000; padding: 12px; border-radius: 6px; color: #ef4444; font-size: 12px; white-space: pre-wrap;'>" . e($e->getMessage()) . "</pre>
            </div>
        ", 500)->header('Content-Type', 'text/html');
    }
})->name('seed-data');

// Production Web Migration & Deployment Runner (Protected by secret token)
Route::get('/deploy/migrate', [DeployController::class, 'migrate'])->middleware('throttle:10,1')->name('deploy.migrate');

// Homepage & Core Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/repairs', [RepairController::class, 'index'])->name('repairs');
Route::post('/repairs/quote', [RepairController::class, 'storeQuote'])->middleware('throttle:15,1')->name('repairs.quote');
Route::post('/inquiry', [RepairController::class, 'storeQuote'])->middleware('throttle:15,1')->name('inquiry.store');

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

    // Repair & Device Inquiries Management
    Route::get('/inquiries', [AdminController::class, 'inquiries'])->name('inquiries');
    Route::patch('/inquiries/{inquiry}/status', [AdminController::class, 'updateInquiryStatus'])->name('inquiries.status');
    Route::delete('/inquiries/{inquiry}', [AdminController::class, 'deleteInquiry'])->name('inquiries.delete');
});
