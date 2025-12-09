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
        Schema::table('movie', function (Blueprint $table) {
            $table->integer('YEAR')->nullable();
            $table->integer('DURATION_MIN')->nullable();
            $table->string('LANGUAGE_MOBIE', 50)->nullable();
            $table->integer('REVENUE')->nullable();
            $table->integer('BUDGET')->nullable();
            $table->string('HOME_PAGE_LINK', 1000)->nullable();
            $table->string('ADMIN_INSERTED_MOVIE', 100)->nullable();
            $table->integer('IMDB_RATE')->nullable();
            $table->integer('IMDB_RATE_COUNT')->nullable();
            $table->unsignedBigInteger('DIRECTOR_ID')->nullable();
            $table->unsignedBigInteger('PRIZE_WON_ID')->nullable();
            $table->unsignedBigInteger('STORY_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movie', function (Blueprint $table) {
            $table->dropColumn([
                'YEAR', 'DURATION_MIN', 'LANGUAGE_MOBIE', 'REVENUE', 'BUDGET',
                'HOME_PAGE_LINK', 'ADMIN_INSERTED_MOVIE', 'IMDB_RATE', 'IMDB_RATE_COUNT',
                'DIRECTOR_ID', 'PRIZE_WON_ID', 'STORY_ID'
            ]);
        });
    }
};
