<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->unique();

            $table->string('permanent_address');
            $table->string('country_of_residence');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->enum('travel_type', ['arrival', 'departure']);

            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->string('place_of_birth');
            $table->string('passport_number');
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowed']);
            $table->enum('occupation', ['employed', 'self_employed', 'student', 'retired', 'unemployed', 'freelancer', 'other']);
            $table->string('email');
            $table->string('phone_number');
            $table->string('embarkation_port');
            $table->string('disembarkation_port');
            $table->string('airline_name');
            $table->date('flight_date');
            $table->string('flight_number');

            $table->boolean('have_currency')->default(false);
            $table->boolean('have_animals')->default(false);
            $table->boolean('have_goods')->default(false);

            $table->enum('status', ['pending', 'paid', 'completed'])->default('pending');
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('pdf_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
