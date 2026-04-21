<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'reference_number',
    'status',
    'stripe_payment_intent_id',
    'pdf_path',

    'permanent_address',
    'country_of_residence',
    'city',
    'state',
    'postal_code',
    'travel_type',

    'first_name',
    'last_name',
    'date_of_birth',
    'gender',
    'place_of_birth',
    'passport_number',
    'civil_status',
    'occupation',
    'email',
    'phone_number',
    'embarkation_port',
    'disembarkation_port',
    'airline_name',
    'flight_date',
    'flight_number',

    'have_currency',
    'have_animals',
    'have_goods',
])]
class Ticket extends Model
{
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'flight_date' => 'date',
            'have_currency' => 'boolean',
            'have_animals' => 'boolean',
            'have_goods' => 'boolean',
        ];
    }
}
