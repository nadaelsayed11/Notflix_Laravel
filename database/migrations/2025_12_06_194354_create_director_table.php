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
        Schema::create('director', function (Blueprint $table) {
            $table->id('ID');
            $table->string('FNAME', 100);
            $table->string('LNAME', 100)->nullable();
            $table->date('BIRTH_DATE')->nullable();
            $table->char('GENDER', 1)->nullable();
            $table->string('IMAGE', 1000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director');
    }
};
