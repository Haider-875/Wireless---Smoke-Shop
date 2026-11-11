<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes - Phase 5 Backend & Database Integration
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/repairs', [RepairController::class, 'index'])->name('repairs');
Route::post('/repairs/quote', [RepairController::class, 'storeQuote'])->name('repairs.quote');

/*
|--------------------------------------------------------------------------
| Session Cart API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('api/cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
});
