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
        Schema::create('actor_prize_movie', function (Blueprint $table) {
            $table->unsignedBigInteger('ACTOR_ID');
            $table->unsignedBigInteger('MOVIE_ID');
            $table->unsignedBigInteger('PRIZE_ID');
            $table->integer('YEAR')->nullable();

            $table->primary(['ACTOR_ID', 'MOVIE_ID', 'PRIZE_ID']);

            $table->foreign('ACTOR_ID')->references('ID')->on('actor')->onDelete('cascade');
            $table->foreign('MOVIE_ID')->references('ID')->on('movie')->onDelete('cascade');
            $table->foreign('PRIZE_ID')->references('ID')->on('prize')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_prize_movie');
    }
};
