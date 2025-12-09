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
        Schema::table('prize', function (Blueprint $table) {
            $table->renameColumn('TYPE_OF_PRTIZE', 'TYPE_OF_PRIZE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prize', function (Blueprint $table) {
            $table->renameColumn('TYPE_OF_PRIZE', 'TYPE_OF_PRTIZE');
        });
    }
};
