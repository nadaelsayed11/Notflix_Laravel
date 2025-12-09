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
        Schema::create('rate_series', function (Blueprint $table) {
            $table->string('USER_NAME_WHO_RATED', 100);
            $table->unsignedBigInteger('SERIES_ID');
            $table->integer('RATE')->nullable();

            // Composite primary key
            $table->primary(['USER_NAME_WHO_RATED', 'SERIES_ID']);

            // Foreign key to series
            $table->foreign('SERIES_ID')->references('ID')->on('series')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate_series');
    }
};
