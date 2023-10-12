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
        Schema::table('food', function (Blueprint $table) {
            $table->foreignId('ingredient1_id')->nullable()->change();
            $table->foreignId('ingredient2_id')->nullable()->change();
            $table->foreignId('ingredient3_id')->nullable()->change();
            $table->foreignId('ingredient4_id')->nullable()->change();
            $table->foreignId('ingredient5_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food', function (Blueprint $table) {
            //
        });
    }
};
