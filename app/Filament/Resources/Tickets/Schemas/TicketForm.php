<?php

namespace App\Filament\Resources\Tickets\Schemas;

use CodeWithDennis\FilamentAdvancedChoice\Filament\Forms\Components\RadioCards;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
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

                                    Select::make('country_of_residence')
                                        ->label('Country of Residence')
                                        ->prefixIcon(Heroicon::GlobeAlt)
                                        ->searchable()
                                        ->options([
                                            'afghanistan' => 'Afghanistan',
                                            'albania' => 'Albania',
                                            'algeria' => 'Algeria',
                                            'andorra' => 'Andorra',
                                            'angola' => 'Angola',
                                            'argentina' => 'Argentina',
                                            'armenia' => 'Armenia',
                                            'australia' => 'Australia',
                                            'austria' => 'Austria',
                                            'azerbaijan' => 'Azerbaijan',
                                            'bahrain' => 'Bahrain',
                                            'bangladesh' => 'Bangladesh',
                                            'belarus' => 'Belarus',
                                            'belgium' => 'Belgium',
                                            'belize' => 'Belize',
                                            'bolivia' => 'Bolivia',
                                            'bosnia_and_herzegovina' => 'Bosnia and Herzegovina',
                                            'brazil' => 'Brazil',
                                            'brunei' => 'Brunei',
                                            'bulgaria' => 'Bulgaria',
                                            'cambodia' => 'Cambodia',
                                            'cameroon' => 'Cameroon',
                                            'canada' => 'Canada',
                                            'chile' => 'Chile',
                                            'china' => 'China',
                                            'colombia' => 'Colombia',
                                            'croatia' => 'Croatia',
                                            'cuba' => 'Cuba',
                                            'cyprus' => 'Cyprus',
                                            'czech_republic' => 'Czech Republic',
                                            'denmark' => 'Denmark',
                                            'ecuador' => 'Ecuador',
                                            'egypt' => 'Egypt',
                                            'ethiopia' => 'Ethiopia',
                                            'finland' => 'Finland',
                                            'france' => 'France',
                                            'georgia' => 'Georgia',
                                            'germany' => 'Germany',
                                            'ghana' => 'Ghana',
                                            'greece' => 'Greece',
                                            'hong_kong' => 'Hong Kong',
                                            'hungary' => 'Hungary',
                                            'iceland' => 'Iceland',
                                            'india' => 'India',
                                            'indonesia' => 'Indonesia',
                                            'iran' => 'Iran',
                                            'iraq' => 'Iraq',
                                            'ireland' => 'Ireland',
                                            'israel' => 'Israel',
                                            'italy' => 'Italy',
                                            'jamaica' => 'Jamaica',
                                            'japan' => 'Japan',
                                            'jordan' => 'Jordan',
                                            'kazakhstan' => 'Kazakhstan',
                                            'kenya' => 'Kenya',
                                            'kuwait' => 'Kuwait',
                                            'kyrgyzstan' => 'Kyrgyzstan',
                                            'laos' => 'Laos',
                                            'latvia' => 'Latvia',
                                            'lebanon' => 'Lebanon',
                                            'libya' => 'Libya',
                                            'liechtenstein' => 'Liechtenstein',
                                            'lithuania' => 'Lithuania',
                                            'luxembourg' => 'Luxembourg',
                                            'macau' => 'Macau',
                                            'malaysia' => 'Malaysia',
                                            'maldives' => 'Maldives',
                                            'malta' => 'Malta',
                                            'mauritius' => 'Mauritius',
                                            'mexico' => 'Mexico',
                                            'moldova' => 'Moldova',
                                            'monaco' => 'Monaco',
                                            'mongolia' => 'Mongolia',
                                            'morocco' => 'Morocco',
                                            'myanmar' => 'Myanmar',
                                            'nepal' => 'Nepal',
                                            'netherlands' => 'Netherlands',
                                            'new_zealand' => 'New Zealand',
                                            'nigeria' => 'Nigeria',
                                            'north_korea' => 'North Korea',
                                            'norway' => 'Norway',
                                            'oman' => 'Oman',
                                            'pakistan' => 'Pakistan',
                                            'palestine' => 'Palestine',
                                            'panama' => 'Panama',
                                            'peru' => 'Peru',
                                            'philippines' => 'Philippines',
                                            'poland' => 'Poland',
                                            'portugal' => 'Portugal',
                                            'qatar' => 'Qatar',
                                            'romania' => 'Romania',
                                            'russia' => 'Russia',
                                            'saudi_arabia' => 'Saudi Arabia',
                                            'serbia' => 'Serbia',
                                            'singapore' => 'Singapore',
                                            'slovakia' => 'Slovakia',
                                            'slovenia' => 'Slovenia',
                                            'somalia' => 'Somalia',
                                            'south_africa' => 'South Africa',
                                            'south_korea' => 'South Korea',
                                            'spain' => 'Spain',
                                            'sri_lanka' => 'Sri Lanka',
                                            'sweden' => 'Sweden',
                                            'switzerland' => 'Switzerland',
                                            'syria' => 'Syria',
                                            'taiwan' => 'Taiwan',
                                            'tajikistan' => 'Tajikistan',
                                            'tanzania' => 'Tanzania',
                                            'thailand' => 'Thailand',
                                            'tunisia' => 'Tunisia',
                                            'turkey' => 'Turkey',
                                            'turkmenistan' => 'Turkmenistan',
                                            'ukraine' => 'Ukraine',
                                            'united_arab_emirates' => 'United Arab Emirates',
                                            'united_kingdom' => 'United Kingdom',
                                            'united_states' => 'United States',
                                            'uruguay' => 'Uruguay',
                                            'uzbekistan' => 'Uzbekistan',
                                            'venezuela' => 'Venezuela',
                                            'vietnam' => 'Vietnam',
                                            'yemen' => 'Yemen',
                                            'zimbabwe' => 'Zimbabwe',
                                        ])
                                        ->required(),

                                    TextInput::make('city')
                                        ->prefixIcon(Heroicon::MapPin)
                                        ->required(),

                                    TextInput::make('state')
                                        ->prefixIcon(Heroicon::Map),

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
                                        ->native(false)
                                        ->maxDate(now())
                                        ->minDate(now()->subYears(120))
                                        ->required(),

                                    Select::make('gender')
                                        ->prefixIcon(Heroicon::UserCircle)
                                        ->options([
                                            'male' => 'Male',
                                            'female' => 'Female',
                                        ])
                                        ->required(),

                                    TextInput::make('place_of_birth')
                                        ->label('Place of Birth')
                                        ->prefixIcon(Heroicon::MapPin)
                                        ->required(),

                                    TextInput::make('passport_number')
                                        ->label('Passport Number')
                                        ->prefixIcon(Heroicon::Identification)
                                        ->alphaNum()
                                        ->required(),

                                    Select::make('civil_status')
                                        ->label('Civil Status')
                                        ->prefixIcon(Heroicon::Heart)
                                        ->options([
                                            'single' => 'Single',
                                            'married' => 'Married',
                                            'divorced' => 'Divorced',
                                            'widowed' => 'Widowed',
                                        ])
                                        ->required(),

                                    Select::make('occupation')
                                        ->prefixIcon(Heroicon::Briefcase)
                                        ->options([
                                            'employed' => 'Employed',
                                            'self_employed' => 'Self-Employed',
                                            'student' => 'Student',
                                            'retired' => 'Retired',
                                            'unemployed' => 'Unemployed',
                                            'freelancer' => 'Freelancer',
                                            'other' => 'Other',
                                        ])
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
                                        ->native(false)
                                        ->minDate(today())
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
                                        ->label('Are you carrying currency above the permitted limit?'),

                                    Toggle::make('have_animals')
                                        ->label('Are you carrying any animals or animal products?'),

                                    Toggle::make('have_goods')
                                        ->label('Are you carrying goods for commercial use?'),
                                ]),
                        ])->columnSpanFull(),

                    Step::make('Payment')
                        ->icon(Heroicon::CreditCard)
                        ->description('Complete your payment to submit')
                        ->schema([
                            View::make('filament.schemas.components.stripe-payment'),
                            Hidden::make('stripe_payment_intent_id'),
                        ])->columnSpanFull(),
                ])->columnSpanFull()->skippable(),
            ]);
    }
}
