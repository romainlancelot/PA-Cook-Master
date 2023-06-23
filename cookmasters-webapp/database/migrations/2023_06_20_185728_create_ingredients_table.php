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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100)->unique();
            $table->string('image', 100)->nullable();
            $table->integer('calories')->nullable();
            $table->integer('carbohydrates')->nullable();
            $table->integer('proteins')->nullable();
            $table->integer('fats')->nullable();
            $table->integer('sugars')->nullable();
            $table->integer('fiber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
