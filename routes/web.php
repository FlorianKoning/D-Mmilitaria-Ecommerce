<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Cms\CmsExtraFeaturesController;
use App\Http\Controllers\Cms\CmsProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Cms\CmsCatagoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cms\CmsDashboardController;
use App\Http\Controllers\Cms\CmsExtraImagesController;
use App\Http\Controllers\Cms\CmsUserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AclMiddleware;
use App\Services\CartService;

// Homepage routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// All the cms routes
Route::middleware(AclMiddleware::class)->group(function() {
    // Contact Routes
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


    // Cart controller
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/update/{product}/{amount}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{product}', [CartController::class, 'destroy'])->name('cart.destroy');


    // Product Controller
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


    // CMS dashboard route
    Route::get('/cms', [CmsDashboardController::class, 'index'])->name('cms.dashboard.index');


    // Cms products routes
    Route::get('/cms/products', [CmsProductsController::class, 'index'])->name('cms.products.index');
    Route::get('/cms/products/create', [CmsProductsController::class, 'create'])->name('cms.products.create');
    Route::get('/cms/products/edit/{product}', [CmsProductsController::class, 'edit'])->name('cms.products.edit');
    Route::get('/cms/product/extra/{product}', [CmsProductsController::class, 'extra'])->name('cms.products.extra');
    Route::post('/cms/product/store', [CmsProductsController::class, 'store'])->name('cms.products.store');
    Route::post('/cms/product/update/{product}', [CmsProductsController::class, 'update'])->name('cms.products.update');
    Route::delete('/cms/products/delete/{product}', [CmsProductsController::class, 'destroy'])->name('cms.products.delete');


    // User routes
    Route::get('/cms/users', [CmsUserController::class, 'index'])->name('cms.users.index');


    // Catagory routes
    Route::get('/cms/catagories', [CmsCatagoriesController::class, 'index'])->name('cms.catagories.index');
    Route::get('/cms/catagories/create', [CmsCatagoriesController::class, 'create'])->name('cms.catagories.create');
    Route::get('/cms/catagories/edit/{catagorie}', [CmsCatagoriesController::class, 'edit'])->name('cms.catagories.edit');
    Route::post('/cms/catagories/store', [CmsCatagoriesController::class, 'store'])->name('cms.catagories.store');
    Route::post('/cms/catagories/update/{catagorie}', [CmsCatagoriesController::class, 'update'])->name('cms.catagories.update');
    Route::delete('/cms/delete/{catagorie}', [CmsCatagoriesController::class, 'destroy'])->name('cms.catagories.delete');


    // Extra images routes
    Route::post('/extraImages/create/{id}', [CmsExtraImagesController::class, 'create'])->name('cms.extraImages.create');
    Route::post('/extraImages/edit/{productImage}',  [CmsExtraImagesController::class, 'edit'])->name('cms.extraImages.edit');
    Route::delete('/extraImage/delete/{productImage}', [CmsExtraImagesController::class, 'destroy'])->name('cms.extraImages.delete');


    // Extra features routes
    Route::post('/extraFeatures/create/{id}', [CmsExtraFeaturesController::class, 'create'])->name('cms.extraFeatures.create');
    Route::post('/extraFeatures/edit/{productFeature}', [CmsExtraFeaturesController::class, 'edit'])->name('cms.extraFeatures.edit');
    Route::delete('/extraFeature/delete/{productFeature}', [CmsExtraFeaturesController::class, 'destroy'])->name('cms.extraFeature.delete');


    // Ajax routes
    Route::get('/ajax/liveSearch/{input}/{table}', [AjaxController::class, 'livesearch'])->name('ajax.liveSearch');
    Route::get('/ajax/options/{id}/{table}', [AjaxController::class, 'getOptions'])->name('ajax.getOptions');
});


// All the auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
