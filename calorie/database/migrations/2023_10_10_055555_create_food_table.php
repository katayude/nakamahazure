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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('ingredient1_id')->constrained('ingredients')->cascadeOnDelete();
            $table->foreignId('ingredient2_id')->constrained('ingredients')->cascadeOnDelete();
            $table->foreignId('ingredient3_id')->constrained('ingredients')->cascadeOnDelete();
            $table->foreignId('ingredient4_id')->constrained('ingredients')->cascadeOnDelete();
            $table->foreignId('ingredient5_id')->constrained('ingredients')->cascadeOnDelete();
            $table->integer('calorie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
