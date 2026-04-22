<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Cashier\Cashier;
use Symfony\Component\HttpFoundation\Response;

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

    public function receipt(Ticket $ticket): RedirectResponse
    {
        abort_unless(filled($ticket->stripe_payment_intent_id), Response::HTTP_NOT_FOUND);

        $intent = Cashier::stripe()->paymentIntents->retrieve(
            $ticket->stripe_payment_intent_id,
            ['expand' => ['latest_charge']]
        );

        $receiptUrl = $intent->latest_charge->receipt_url ?? null;

        abort_unless(filled($receiptUrl), Response::HTTP_NOT_FOUND);

        return redirect()->away($receiptUrl);
    }
}
