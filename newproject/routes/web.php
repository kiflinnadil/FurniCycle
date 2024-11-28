<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('products/update/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('products/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::resource('products', ProductController::class)->middleware('role:owner'); //tidak perlu menambahkan route crud 1/1 cukup pakai resource 
        Route::resource('categories', CategoryController::class)->middleware('role:owner'); //tidak perlu menambahkan route crud 1/1 cukup pakai resource 

    });
});

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/shop', function () {
    return view('shop', 
    ['judul' => 'Harry Potter'],
    ['isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium dolor aperiam voluptatibus consectetur esse obcaecati sunt laboriosam ab labore voluptatem, doloremque, similique quae, fuga et tenetur laborum veritatis laudantium omnis.
    ']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact', ['contact' => '085234917876']);
});