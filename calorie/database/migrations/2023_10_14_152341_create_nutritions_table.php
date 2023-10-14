<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nutritions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ingredients_id')->constrained('ingredients')->cascadeOnDelete();
            $table->float('protein');
            $table->float('fat');
            $table->float('carbohydrate');
            $table->float('vitamin');
            $table->float('minerals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritons');
    }
};