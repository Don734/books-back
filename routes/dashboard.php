<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProfileController;

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('dashboard');

    Route::prefix('banners')->group(function() {
        Route::get('/', [BannerController::class, 'index'])->name('banners');
        Route::get('/create', [BannerController::class, 'create'])->name('banners.create');
        Route::post('/add', [BannerController::class, 'store'])->name('banners.store');
        Route::get('/show/{banner}', [BannerController::class, 'show'])->name('banners.show');
        Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('banners.edit');
        Route::put('/update/{banner}', [BannerController::class, 'update'])->name('banners.update');
        Route::delete('/delete/{banner}', [BannerController::class, 'delete'])->name('banners.delete');
    });

    Route::prefix('products')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/add', [ProductController::class, 'store'])->name('products.store');
        Route::get('/show/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('products.delete');
        Route::post('/import', [ProductController::class, 'import'])->name('products.import');
    });

    Route::prefix('reviews')->group(function() {
        Route::get('/', [ReviewController::class, 'index'])->name('reviews');
        Route::get('/create', [ReviewController::class, 'create'])->name('reviews.create');
        Route::post('/add', [ReviewController::class, 'store'])->name('reviews.store');
        Route::get('/show/{review}', [ReviewController::class, 'show'])->name('reviews.show');
        Route::get('/edit/{review}', [ReviewController::class, 'edit'])->name('reviews.edit');
        Route::put('/update/{review}', [ReviewController::class, 'update'])->name('reviews.update');
        Route::delete('/delete/{review}', [ReviewController::class, 'delete'])->name('reviews.delete');
    });

    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/add', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('categories.delete');
    });

    Route::prefix('orders')->group(function() {
        Route::get('/', [OrderController::class, 'index'])->name('orders');
        Route::get('/show/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::delete('/delete/{order}', [OrderController::class, 'delete'])->name('orders.delete');
    });

    Route::prefix('gallery')->group(function() {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery');
    });

    Route::prefix('settings')->group(function() {
        Route::get('/', [SettingController::class, 'index'])->name('settings');
    });

    Route::prefix('profile')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
    });
});