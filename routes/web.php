<?php

use App\Http\Controllers\Cms\CmsProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cms\CmsDashboardController;
use App\Http\Controllers\Cms\CmsUserController;
use App\Http\Middleware\AclMiddleware;

// Homepage routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Basket Routes
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');


// All the cms routes
Route::middleware(AclMiddleware::class)->group(function() {
    Route::get('/cms', [CmsDashboardController::class, 'index'])->name('cms.dashboard.index');

    // Products routes
    Route::get('/cms/products', [CmsProductsController::class, 'index'])->name('cms.products.index');

    // User routes
    Route::get('/cms/users', [CmsUserController::class, 'index'])->name('cms.users.index');
});


// All the auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
