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
        Schema::create('genre_relation_series', function (Blueprint $table) {
            $table->unsignedBigInteger('SERIES_ID');
            $table->unsignedBigInteger('GENRE_ID');

            $table->foreign('SERIES_ID')->references('ID')->on('series')->onDelete('cascade');
            $table->foreign('GENRE_ID')->references('ID')->on('genre')->onDelete('cascade');

            $table->primary(['SERIES_ID', 'GENRE_ID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_relation_series');
    }
};
