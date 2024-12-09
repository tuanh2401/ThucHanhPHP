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
        Schema::create('movies', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('title');
            $table->string('director');
            $table->dateTime('release_date');
            $table->integer('duration');
            $table->integer('cinema_id');
            $table->foreign('cinema_id')->references('id')->on('cinemas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
