<?php

use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::post('/stripe/payment-intent', [StripeController::class, 'createPaymentIntent'])->name('stripe.payment-intent');
});

require __DIR__.'/settings.php';
