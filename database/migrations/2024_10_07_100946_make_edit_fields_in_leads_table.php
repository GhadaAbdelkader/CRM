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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_status'); // Required, no default. Must be selected manually.
            $table->string('lead_owner');  // Required
            $table->string('salutation');  // Required (if not, set `nullable()` if needed)
            $table->string('first_name');  // Required
            $table->string('last_name');   // Required
            $table->string('title')->nullable(); // Optional
            $table->string('email');       // Required
            $table->string('phone')->nullable();  // Optional
            $table->string('company')->nullable(); // Optional
            $table->string('rate');        // Required, cold/warm/hot
            $table->string('industry')->nullable(); // Optional
            $table->integer('no_of_employees')->nullable(); // Optional
            $table->string('lead_source')->nullable(); // Optional
            $table->text('address')->nullable(); // Optional
            $table->string('street')->nullable();  // Optional
            $table->string('city')->nullable();    // Optional
            $table->string('state_province')->nullable(); // Optional
            $table->string('zip_postal_code')->nullable(); // Optional
            $table->string('country')->nullable();   // Optional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            //
        });
    }
};
