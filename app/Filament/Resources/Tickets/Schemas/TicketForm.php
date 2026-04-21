<?php

namespace App\Filament\Resources\Tickets\Schemas;

use CodeWithDennis\FilamentAdvancedChoice\Filament\Forms\Components\RadioCards;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('General Information')
                        ->icon(Heroicon::InformationCircle)
                        ->description('Reference number, address and travel type')
                        ->schema([
                            TextInput::make('reference_number')
                                ->label('Reference Number')
                                ->prefixIcon(Heroicon::DocumentText)
                                ->required()
                                ->columnSpanFull(),

                            Section::make('Address')
                                ->description('Your current residential address')
                                ->icon(Heroicon::Home)
                                ->columns(2)
                                ->schema([
                                    TextInput::make('permanent_address')
                                        ->label('Permanent Address')
                                        ->prefixIcon(Heroicon::Home)
                                        ->required()
                                        ->columnSpanFull(),

                                    TextInput::make('country_of_residence')
                                        ->label('Country of Residence')
                                        ->prefixIcon(Heroicon::GlobeAlt)
                                        ->required(),

                                    TextInput::make('city')
                                        ->prefixIcon(Heroicon::MapPin)
                                        ->required(),

                                    TextInput::make('state')
                                        ->prefixIcon(Heroicon::Map)
                                        ->required(),

                                    TextInput::make('postal_code')
                                        ->label('Postal Code')
                                        ->prefixIcon(Heroicon::Hashtag),
                                ]),

                            Section::make('Travel Type')
                                ->description('Select the direction of your travel')
                                ->icon(Heroicon::PaperAirplane)
                                ->schema([
                                    RadioCards::make('travel_type')
                                        ->label('Travel Type')
                                        ->required()
                                        ->options([
                                            'arrival' => 'Arrival',
                                            'departure' => 'Departure',
                                        ])->columnSpanFull(),
                                ]),
                        ])->columnSpanFull(),

                    Step::make('Personal & Travel Information')
                        ->icon(Heroicon::Identification)
                        ->description('Personal details and flight information')
                        ->schema([
                            Section::make('Personal Details')
                                ->description('Your identity and biographical information')
                                ->icon(Heroicon::User)
                                ->columns(2)
                                ->schema([
                                    TextInput::make('first_name')
                                        ->prefixIcon(Heroicon::User)
                                        ->required(),

                                    TextInput::make('last_name')
                                        ->prefixIcon(Heroicon::User)
                                        ->required(),

                                    DatePicker::make('date_of_birth')
                                        ->label('Date of Birth')
                                        ->prefixIcon(Heroicon::Calendar)
                                        ->required(),

                                    TextInput::make('gender')
                                        ->prefixIcon(Heroicon::UserGroup)
                                        ->required(),

                                    TextInput::make('place_of_birth')
                                        ->label('Place of Birth')
                                        ->prefixIcon(Heroicon::MapPin)
                                        ->required(),

                                    TextInput::make('passport_number')
                                        ->label('Passport Number')
                                        ->prefixIcon(Heroicon::Identification)
                                        ->required(),

                                    TextInput::make('civil_status')
                                        ->label('Civil Status')
                                        ->prefixIcon(Heroicon::Heart)
                                        ->required(),

                                    TextInput::make('occupation')
                                        ->prefixIcon(Heroicon::Briefcase)
                                        ->required(),
                                ]),

                            Section::make('Contact Information')
                                ->description('How we can reach you')
                                ->icon(Heroicon::Phone)
                                ->columns(2)
                                ->schema([
                                    TextInput::make('email')
                                        ->label('Email Address')
                                        ->prefixIcon(Heroicon::Envelope)
                                        ->email()
                                        ->required(),

                                    TextInput::make('phone_number')
                                        ->label('Phone Number')
                                        ->prefixIcon(Heroicon::Phone)
                                        ->tel()
                                        ->required(),
                                ]),

                            Section::make('Flight Details')
                                ->description('Your flight and port information')
                                ->icon(Heroicon::PaperAirplane)
                                ->columns(2)
                                ->schema([
                                    TextInput::make('embarkation_port')
                                        ->label('Port of Embarkation')
                                        ->prefixIcon(Heroicon::ArrowRightCircle)
                                        ->required(),

                                    TextInput::make('disembarkation_port')
                                        ->label('Port of Disembarkation')
                                        ->prefixIcon(Heroicon::ArrowLeftCircle)
                                        ->required(),

                                    TextInput::make('airline_name')
                                        ->label('Airline Name')
                                        ->prefixIcon(Heroicon::PaperAirplane)
                                        ->required(),

                                    TextInput::make('flight_number')
                                        ->label('Flight Number')
                                        ->prefixIcon(Heroicon::Hashtag)
                                        ->required(),

                                    DatePicker::make('flight_date')
                                        ->label('Flight Date')
                                        ->prefixIcon(Heroicon::CalendarDays)
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                        ])->columnSpanFull(),

                    Step::make('Customs Declaration')
                        ->icon(Heroicon::ShoppingBag)
                        ->description('Declare any goods, animals, or currency')
                        ->schema([
                            Section::make('Customs')
                                ->description('Please answer honestly. False declarations may result in penalties.')
                                ->icon(Heroicon::ShoppingBag)
                                ->schema([
                                    Toggle::make('have_currency')
                                        ->label('Are you carrying currency above the permitted limit?')
                                        ->required(),

                                    Toggle::make('have_animals')
                                        ->label('Are you carrying any animals or animal products?')
                                        ->required(),

                                    Toggle::make('have_goods')
                                        ->label('Are you carrying goods for commercial use?')
                                        ->required(),
                                ]),
                        ])->columnSpanFull(),

                    Step::make('Payment')
                        ->icon(Heroicon::CreditCard)
                        ->description('Complete your payment to submit')
                        ->schema([
                            View::make('filament.schemas.components.stripe-payment'),
                        ])->columnSpanFull(),
                ])->columnSpanFull()->skippable(),
            ]);
    }
}
