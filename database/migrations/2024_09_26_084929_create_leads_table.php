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
            $table->string('lead_status')->default('none'); // new, working, nurturing, qualified, unqualified, none
            $table->string('lead_owner');
            $table->string('salutation')->nullable(); // Mr., Mrs., etc.
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('company');
            $table->string('rate')->default('cold'); // hot, warm, cold
            $table->string('industry')->nullable();
            $table->integer('no_of_employees')->nullable();
            $table->string('lead_source')->default('other'); // website, employee referral, customer, etc.
            $table->text('address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('zip_postal_code')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
