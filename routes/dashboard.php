<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('dashboard');

    Route::prefix('products')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/add', [ProductController::class, 'store'])->name('products.store');
        Route::get('/show/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('products.delete');
    });

    Route::prefix('gallery')->group(function() {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery');
    });
});