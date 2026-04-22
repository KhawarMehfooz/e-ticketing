<?php

use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/stripe/payment-intent', [StripeController::class, 'createPaymentIntent'])->name('stripe.payment-intent');
    Route::get('/stripe/receipt/{ticket}', [StripeController::class, 'receipt'])->name('stripe.receipt');
});