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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_photo');
            $table->string('property_name');
            $table->string('address_street');
            $table->string('address_number');
            $table->string('address_complement')->nullable();
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_zip_code');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
