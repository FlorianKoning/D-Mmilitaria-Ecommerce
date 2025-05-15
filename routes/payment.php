<?php

use App\Http\Controllers\Payment\FairPickUpController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Payment routes
Route::controller(PaymentController::class)->group(function () {
    Route::post('/payment', 'index')->name('payment.index');
});


// Fair Pick Up Routes
Route::controller(FairPickUpController::class)->group(function () {
    Route::get('/payment/exhibition-calender/{order}','exhibition')->name('payment.exhibition');
    Route::get('/payment/fair-pick-up/choice-payment/{exhibition}/{order}', 'choicePayment')->name('fairPickUp.choicePayment');
    Route::post('/payment/fair-pick-up/payment/{exhibition}/{order}/{paymentOption}', 'payment')->name('fairPickUp.payment');
    Route::get('/payment/fair-pick-up/{exhibition}/{order}','fairPickUp')->name('payment.fairPickUp');
});
