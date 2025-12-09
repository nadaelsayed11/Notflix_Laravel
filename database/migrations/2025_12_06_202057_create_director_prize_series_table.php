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
        Schema::create('director_prize_series', function (Blueprint $table) {
            $table->unsignedBigInteger('DIRECTOR_ID');
            $table->unsignedBigInteger('SERIES_ID');
            $table->unsignedBigInteger('PRIZE_ID');
            $table->integer('YEAR')->nullable();

            $table->primary(['DIRECTOR_ID', 'SERIES_ID', 'PRIZE_ID']);

            $table->foreign('DIRECTOR_ID')->references('ID')->on('director')->onDelete('cascade');
            $table->foreign('SERIES_ID')->references('ID')->on('series')->onDelete('cascade');
            $table->foreign('PRIZE_ID')->references('ID')->on('prize')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director_prize_series');
    }
};
