<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AclMiddleware;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\PurchaseController;

// All the auth routes
Route::middleware(AclMiddleware::class)->group(function() {
    // Home Route
    Route::controller(HomeController::class)->group(function() {
        Route::get('/', 'index')->name('home.index');
        Route::get('/product-archive', 'archive')->name('home.archive');
    });


    // public routes
    Route::controller(PublicController::class)->group(function() {
        Route::get('/about-us', 'aboutUs')->name('public.index');
        Route::get('/terms-of-services', 'termsOfService')->name('public.termsOfService');
        Route::get('/privacy', 'privacy')->name('public.privacy');
        Route::get('/order/confirmation/{order}/{shipping}', 'confirmation')->name('public.confirmation');
    });

    // Contact Routes
    Route::controller(ContactController::class)->group(function() {
        Route::get('/contact', 'index')->name('contact.index');
        Route::get('/return-policy', 'returnPolicy')->name('contact.return');
        Route::post('/contact/message', 'message')->name('contact.message');
    });

    // Purchases Routes
    Route::controller(PurchaseController::class)->group(function() {
        Route::get('/purchases', 'index')->name('contact.purchases.index');
        Route::get('/purchases/message', 'message')->name('contact.purchases.message');
    });

    // Cart controller
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/update/{product}/{amount}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{product}', [CartController::class, 'destroy'])->name('cart.destroy');


    // Product Controller
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


    // Ajax routes
    Route::controller(AjaxController::class)->group(function() {
        Route::get('/ajax/liveSearch/{input}/{table}', 'livesearch')->name('ajax.liveSearch');
        Route::get('/ajax/options/{id}/{table}', 'getOptions')->name('ajax.getOptions');
        Route::get('/ajax/payment-id', 'paymentId')->name('ajax.paymentId');
        Route::get('/ajax/shipping-country/{shippingCountry}', 'shippingCountry')->name('ajax.shippingCountry');
        Route::get('/ajax/get-images/{product}', 'getImageArray')->name('ajax.getImageArray');
    });



    // Checkout routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');


    // All public download routes
    Route::get('/donwload/invoice/{order}', [DownloadController::class, 'invoices'])->name('download.invoice');


    // Exhibition Calender Routes
    Route::get('/exhibition-calender', [ExhibitionController::class, 'index'])->name('exhibition.index');


    // All the public shipping routes.
    Route::get('/shipping/edit/{order}', [ShippingController::class, 'edit'])->name('shipping.edit');
    Route::patch('/shipping/udpate/{order}/{shipping}', [ShippingController::class, 'update'])->name('shipping.update');


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
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/order/download/{order}', [ProfileController::class, 'downloadInvoice'])->name('profile.donwload.invoice');
});


// Auth routes
require __DIR__.'/auth.php';
