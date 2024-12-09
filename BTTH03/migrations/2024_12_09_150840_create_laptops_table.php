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
        Schema::create('laptops', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('brand');
            $table->string('model');
            $table->text('specifications');
            $table->boolean('rental_status');
            $table->integer('renter_id');
            $table->foreign('renter_id')->references('id')->on('renters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
