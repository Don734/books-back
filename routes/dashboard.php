<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OrderController;

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
    });

    Route::prefix('orders')->group(function() {
        Route::get('/', [OrderController::class, 'index'])->name('orders');
        Route::get('/show/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::delete('/delete/{order}', [OrderController::class, 'delete'])->name('orders.delete');
    });

    Route::prefix('gallery')->group(function() {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery');
    });
});