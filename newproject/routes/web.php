<?php

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
    });
//
    Route::middleware(['role:buyer'])->group(function () {
        // Route::get('product_transaction', [ProductTransactionController::class, 'index'])->name('transactions.index');
        // Route::get('product_transaction/create', [ProductTransactionController::class, 'create'])->name('transactions.create');
        // Route::post('product_transaction/store', [ProductTransactionController::class, 'store'])->name('transactions.store');
        // Route::get('product_transaction/{transaction}', [ProductTransactionController::class, 'show'])->name('transactions.show');
        Route::get('/checkout/{productId}', [ProductTransactionController::class, 'checkout'])->name('transactions.checkout');
        Route::post('/checkout', [ProductTransactionController::class, 'store'])->name('transactions.store');
    });
//    
    // Route::prefix('admin')->name('admin.')->group(function(){
    //     Route::resource('products', ProductController::class)->middleware('role:owner'); //tidak perlu menambahkan route crud 1/1 cukup pakai resource 
    //     Route::resource('categories', CategoryController::class)->middleware('role:owner'); //tidak perlu menambahkan route crud 1/1 cukup pakai resource 

    // });
});

require __DIR__.'/auth.php';

Route::get('/shop', [ProductController::class, 'userIndex'])->name('shop');
Route::get('/shop/detail/{id}', [ProductController::class, 'show'])->name('shop_details');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact', ['contact' => '085234917876']);
});