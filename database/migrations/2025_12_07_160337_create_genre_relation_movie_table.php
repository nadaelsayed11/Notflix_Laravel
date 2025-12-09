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
        Schema::create('genre_relation_movie', function (Blueprint $table) {
            $table->unsignedBigInteger('MOVIE_ID');
            $table->unsignedBigInteger('GENRE_ID');

            $table->foreign('MOVIE_ID')->references('ID')->on('movie')->onDelete('cascade');
            $table->foreign('GENRE_ID')->references('ID')->on('genre')->onDelete('cascade');

            $table->primary(['MOVIE_ID', 'GENRE_ID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_relation_movie');
    }
};
