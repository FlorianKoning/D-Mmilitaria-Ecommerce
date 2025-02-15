<?php
use App\Mail\UserSignedUp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AclMiddleware;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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


    // Ajax routes
    Route::get('/ajax/liveSearch/{input}/{table}', [AjaxController::class, 'livesearch'])->name('ajax.liveSearch');
    Route::get('/ajax/options/{id}/{table}', [AjaxController::class, 'getOptions'])->name('ajax.getOptions');


    // Loads the admin routes.
    require __DIR__.'/admin.php';

    // Loads the payment routes
    require __DIR__.'/payment.php';
});


// All the auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/shipping', [ProfileController::class, 'shipping'])->name('profile.shipping');
    Route::post('/profile/shipping/store', [ProfileController::class, 'shippingStore'])->name('profile.shipping.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
