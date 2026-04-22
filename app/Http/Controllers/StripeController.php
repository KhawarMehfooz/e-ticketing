<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Cashier\Cashier;

class StripeController extends Controller
{
    public function createPaymentIntent(): JsonResponse
    {
        $intent = Cashier::stripe()->paymentIntents->create([
            'amount' => config('ticket.price', 5000),
            'currency' => config('cashier.currency', 'usd'),
            'payment_method_types' => ['card'],
        ]);

        return response()->json(['client_secret' => $intent->client_secret]);
    }
}
