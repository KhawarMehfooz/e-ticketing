<?php

namespace App\Filament\Resources\Tickets\Tables;

use App\Models\Ticket;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference_number')
                    ->label('Reference')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('first_name')
                    ->label('Passenger')
                    ->formatStateUsing(fn (string $state, Ticket $record): string => $state.' '.$record->last_name)
                    ->searchable(['first_name', 'last_name']),

                TextColumn::make('travel_type')
                    ->label('Direction')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'arrival' => 'success',
                        'departure' => 'info',
                        default => 'gray',
                    }),

                TextColumn::make('airline_name')
                    ->label('Airline')
                    ->searchable(),

                TextColumn::make('flight_number')
                    ->label('Flight')
                    ->searchable(),

                TextColumn::make('flight_date')
                    ->label('Flight Date')
                    ->date()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'completed' => 'info',
                        'pending' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('receipt')
                    ->label('Receipt')
                    ->icon(Heroicon::OutlinedReceiptRefund)
                    ->url(fn (Ticket $record): string => route('stripe.receipt', $record))
                    ->openUrlInNewTab()
                    ->visible(fn (Ticket $record): bool => filled($record->stripe_payment_intent_id)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
