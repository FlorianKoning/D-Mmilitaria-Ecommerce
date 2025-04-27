<?php

use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AclMiddleware;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;


// guest/public routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about-us', [PublicController::class,'aboutUs'])->name('public.index');
Route::get('/terms-of-services', [PublicController::class,'termsOfService'])->name('public.termsOfService');
Route::get('/privacy', [PublicController::class,'privacy'])->name('public.privacy');



// All the auth routes
Route::middleware(AclMiddleware::class)->group(function() {
    // Contact Routes
    Route::controller(ContactController::class)->group(function() {
        Route::get('/contact', 'index')->name('contact.index');
        Route::get('/return-policy', 'returnPolicy')->name('contact.return');
        Route::post('/contact/message', 'message')->name('contact.message');
    });

    // Cart controller
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/update/{product}/{amount}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Product Controller
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Ajax routes
    Route::get('/ajax/liveSearch/{input}/{table}', [AjaxController::class, 'livesearch'])->name('ajax.liveSearch');
    Route::get('/ajax/options/{id}/{table}', [AjaxController::class, 'getOptions'])->name('ajax.getOptions');
    Route::get('/ajax/payment-id', [AjaxController::class, 'paymentId'])->name('ajax.paymentId');

    // Checkout routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    // All public download routes
    Route::get('/donwload/invoice/{order}', [DownloadController::class, 'invoices'])->name('download.invoice');

    // Loads the admin routes.
    require __DIR__.'/admin.php';

    // Loads the payment routes
    require __DIR__.'/payment.php';
});


// All the auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/shipping', [ProfileController::class, 'shipping'])->name('profile.shipping');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::post('/profile/shipping/store', [ProfileController::class, 'shippingStore'])->name('profile.shipping.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/business', [ProfileController::class, 'business'])->name('profile.update.business');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/order/download/{order}', [ProfileController::class, 'downloadInvoice'])->name('profile.donwload.invoice');
});


// Auth routes
require __DIR__.'/auth.php';
