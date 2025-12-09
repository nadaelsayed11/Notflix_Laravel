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
        Schema::table('series', function (Blueprint $table) {
            $table->integer('YEAR')->nullable();
            $table->integer('DURATION_MIN')->nullable();
            $table->string('LANGUAGE', 50)->nullable();
            $table->integer('REVENUE')->nullable();
            $table->integer('BUDGET')->nullable();
            $table->string('HOME_PAGE_LINK', 1000)->nullable();
            $table->string('ADMIN_INSERTED_SERIES', 100)->nullable();
            $table->integer('IMDB_RATE')->nullable();
            $table->integer('IMDB_RATE_COUNT')->nullable();
            $table->integer('NUMBER_OF_EPISODES_IN_SEASON')->nullable();
            $table->unsignedBigInteger('DIRECTOR_ID')->nullable();
            $table->unsignedBigInteger('PRIZE_WON_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('series', function (Blueprint $table) {
            $table->dropColumn([
                'YEAR', 'DURATION_MIN', 'LANGUAGE', 'REVENUE', 'BUDGET',
                'HOME_PAGE_LINK', 'ADMIN_INSERTED_SERIES', 'IMDB_RATE', 'IMDB_RATE_COUNT',
                'NUMBER_OF_EPISODES_IN_SEASON', 'DIRECTOR_ID', 'PRIZE_WON_ID'
            ]);
        });
    }
};
