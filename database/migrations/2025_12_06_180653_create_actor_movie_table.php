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
        Schema::create('actor_movie', function (Blueprint $table) {
            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('movie_id');

            // Foreign keys
            $table->foreign('actor_id')->references('ID')->on('actor')->onDelete('cascade');
            $table->foreign('movie_id')->references('ID')->on('movie')->onDelete('cascade');

            // Composite primary key
            $table->primary(['actor_id', 'movie_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actor_movie');
    }
};
