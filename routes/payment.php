<?php

use App\Http\Controllers\PaymentController;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Route;

// Payment routes
Route::post('/payment', [PaymentController::class, 'index'])->name('payment.index');
