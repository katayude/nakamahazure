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
            $table->integer('ingredient1_weight')->after('ingredient1_id')->default('0')->change();
            $table->integer('ingredient2_weight')->after('ingredient2_id')->default('0')->change();
            $table->integer('ingredient3_weight')->after('ingredient3_id')->default('0')->change();
            $table->integer('ingredient4_weight')->after('ingredient4_id')->default('0')->change();
            $table->integer('ingredient5_weight')->after('ingredient5_id')->default('0')->change();
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
