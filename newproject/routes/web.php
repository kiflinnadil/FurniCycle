<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\ProductTransactionController;

Route::get('/', function () {
    return view('home');
})->name('home'); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware(['role:owner'])->group(function () {
        // Products
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/update/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Categories
        Route::resource('categories', CategoryController::class);
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Payments
        Route::resource('payments', PaymentController::class);
        Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
        Route::get('payments/create', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('payments/store', [PaymentController::class, 'store'])->name('payments.store');
        Route::get('payments/edit/{payment}', [PaymentController::class, 'edit'])->name('payments.edit');
        Route::put('payments/update/{payment}', [PaymentController::class, 'update'])->name('payments.update');
        Route::delete('payments/destroy/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');    

        // Promo Codes
        Route::get('promo_codes', [PromoCodeController::class, 'index'])->name('promo_codes.index');
        Route::get('promo_codes/create', [PromoCodeController::class, 'create'])->name('promo_codes.create');
        Route::post('promo_codes/store', [PromoCodeController::class, 'store'])->name('promo_codes.store');
        Route::get('promo_codes/edit/{promoCode}', [PromoCodeController::class, 'edit'])->name('promo_codes.edit');
        Route::put('promo_codes/update/{promoCode}', [PromoCodeController::class, 'update'])->name('promo_codes.update');
        Route::delete('promo_codes/destroy/{promoCode}', [PromoCodeController::class, 'destroy'])->name('promo_codes.destroy');

        // Transaction
        Route::get('/product-transactions', [ProductTransactionController::class, 'index'])->name('product_transactions.index');
        Route::post('/transaction/{id}/confirm', [ProductTransactionController::class, 'confirm'])->name('transaction.confirm');

    });
//
    Route::middleware(['auth', 'role:buyer'])->group(function () {
        Route::get('/checkout/{productId}', [ProductTransactionController::class, 'checkout'])->name('transactions.checkout');
        Route::post('/transactions', [ProductTransactionController::class, 'store'])->name('transactions.store');
        Route::get('/transactions', [ProductTransactionController::class, 'index'])->name('transactions.index');

});

});

require __DIR__.'/auth.php';

Route::get('/shop', [ProductController::class, 'userIndex'])->name('shop');
Route::get('/shop/detail/{id}', [ProductController::class, 'show'])->name('shop_details');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});