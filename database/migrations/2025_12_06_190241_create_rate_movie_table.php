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
        Schema::create('rate_movie', function (Blueprint $table) {
            $table->string('USER_NAME_WHO_RATED', 100);
            $table->unsignedBigInteger('MOVIE_ID');
            $table->integer('RATE')->nullable();

            // Composite primary key
            $table->primary(['USER_NAME_WHO_RATED', 'MOVIE_ID']);

            // Foreign key to movie
            $table->foreign('MOVIE_ID')->references('ID')->on('movie')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate_movie');
    }
};
