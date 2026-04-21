<?php

namespace App\Filament\Resources\Tickets\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TicketInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('reference_number'),
                TextEntry::make('permanent_address'),
                TextEntry::make('country_of_residence'),
                TextEntry::make('city'),
                TextEntry::make('state')
                    ->placeholder('-'),
                TextEntry::make('postal_code')
                    ->placeholder('-'),
                TextEntry::make('travel_type'),
                TextEntry::make('first_name'),
                TextEntry::make('last_name'),
                TextEntry::make('date_of_birth')
                    ->date(),
                TextEntry::make('gender'),
                TextEntry::make('place_of_birth'),
                TextEntry::make('passport_number'),
                TextEntry::make('civil_status'),
                TextEntry::make('occupation'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone_number'),
                TextEntry::make('embarkation_port'),
                TextEntry::make('disembarkation_port'),
                TextEntry::make('airline_name'),
                TextEntry::make('flight_date')
                    ->date(),
                TextEntry::make('flight_number'),
                IconEntry::make('have_currency')
                    ->boolean(),
                IconEntry::make('have_animals')
                    ->boolean(),
                IconEntry::make('have_goods')
                    ->boolean(),
                TextEntry::make('status'),
                TextEntry::make('stripe_payment_intent_id')
                    ->placeholder('-'),
                TextEntry::make('pdf_path')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
