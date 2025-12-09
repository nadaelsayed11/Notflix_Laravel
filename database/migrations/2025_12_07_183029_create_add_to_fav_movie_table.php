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
        Schema::create('add_to_fav_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('MOVIE_ID');
            $table->foreign('MOVIE_ID')->references('ID')->on('movie')->onDelete('cascade');
            $table->timestamps();

            // Unique constraint to prevent duplicate favorites
            $table->unique(['user_id', 'MOVIE_ID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_to_fav_movie');
    }
};
