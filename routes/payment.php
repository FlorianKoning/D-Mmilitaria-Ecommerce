<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Payment routes
Route::post('/payment', [PaymentController::class, 'index'])->name('payment.index');
