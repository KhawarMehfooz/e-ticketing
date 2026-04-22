<?php

namespace App\Filament\Resources\Tickets\Pages;

use App\Filament\Resources\Tickets\TicketResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Laravel\Cashier\Cashier;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $piId = $data['stripe_payment_intent_id'] ?? null;

        if (empty($piId)) {
            Notification::make()
                ->title('Payment required')
                ->body('Please complete the payment before submitting.')
                ->danger()
                ->send();

            $this->halt();
        }

        $intent = Cashier::stripe()->paymentIntents->retrieve($piId);

        if ($intent->status !== 'succeeded') {
            Notification::make()
                ->title('Payment not completed')
                ->body('Your payment was not successful. Please try again.')
                ->danger()
                ->send();

            $this->halt();
        }

        $data['status'] = 'paid';

        return $data;
    }
}
