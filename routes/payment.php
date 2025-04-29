<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Payment routes
Route::post('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/exhibition-calender/{order}', [PaymentController::class, 'exhibition'])->name('payment.exhibition');
Route::get('/payment/fair-pick-up/{exhibition}/{order}', [PaymentController::class, 'fairPickUp'])->name('payment.fairPickUp');

