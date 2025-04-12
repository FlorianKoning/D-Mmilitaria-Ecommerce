<?php
use App\Http\Controllers\Cms\CmsExtraFeaturesController;
use App\Http\Controllers\Cms\CmsOrderStatusesController;
use App\Http\Controllers\Cms\CmsProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\CmsCatagoriesController;
use App\Http\Controllers\Cms\CmsDashboardController;
use App\Http\Controllers\Cms\CmsExtraImagesController;
use App\Http\Controllers\Cms\CmsOrderController;
use App\Http\Controllers\Cms\CmsUserController;


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

// Extra Product Routes
Route::get('/cms/products/product-catagories/{product}', [CmsProductsController::class, 'productCategories'])->name('cms.products.productCategories');
Route::get('/cms/product/land-categories/{product}', [CmsProductsController::class, 'landCategories'])->name('cms.products.landCategories');
Route::post('/cms/product/categories/store/{product}/{option}', [CmsProductsController::class, 'extraCategorieStore'])->name('cms.products.extraCategorieStore');


// User routes
Route::get('/cms/users', [CmsUserController::class, 'index'])->name('cms.users.index');


// Catagory routes
Route::get('/cms/catagories', [CmsCatagoriesController::class, 'index'])->name('cms.catagories.index');
Route::get('/cms/catagories/create/{check?}', [CmsCatagoriesController::class, 'create'])->name('cms.catagories.create');
Route::get('/cms/catagories/edit/{id}/{check?}', [CmsCatagoriesController::class, 'edit'])->name('cms.catagories.edit');
Route::post('/cms/catagories/store/{check?}', [CmsCatagoriesController::class, 'store'])->name('cms.catagories.store');
Route::post('/cms/catagories/update/{id}/{check?}', [CmsCatagoriesController::class, 'update'])->name('cms.catagories.update');
Route::delete('/cms/delete/{catagorie}/{check?}', [CmsCatagoriesController::class, 'destroy'])->name('cms.catagories.delete');


// Extra images routes
Route::post('/extraImages/create/{id}', [CmsExtraImagesController::class, 'create'])->name('cms.extraImages.create');
Route::post('/extraImages/edit/{productImage}',  [CmsExtraImagesController::class, 'edit'])->name('cms.extraImages.edit');
Route::delete('/extraImage/delete/{productImage}', [CmsExtraImagesController::class, 'destroy'])->name('cms.extraImages.delete');


// Extra features routes
Route::post('/extraFeatures/create/{id}', [CmsExtraFeaturesController::class, 'create'])->name('cms.extraFeatures.create');
Route::post('/extraFeatures/edit/{productFeature}', [CmsExtraFeaturesController::class, 'edit'])->name('cms.extraFeatures.edit');
Route::delete('/extraFeature/delete/{productFeature}', [CmsExtraFeaturesController::class, 'destroy'])->name('cms.extraFeature.delete');


// Cms order routes
Route::get('/cms/orders', [CmsOrderController::class, 'index'])->name('cms.orders.index');
Route::get('/cms/orders/{order}', [CmsOrderController::class, 'edit'])->name('cms.orders.edit');
Route::get('/cms/orders/show/{order}', [CmsOrderController::class, 'show'])->name('cms.orders.show');
Route::put('/cms/orders/update/{order}', [CmsOrderController::class, 'update'])->name('cms.order.udpate');


// Cms order status routes.
Route::get('/cms/order-statuses', [CmsOrderStatusesController::class, 'index'])->name('cms.order-statuses.index');
