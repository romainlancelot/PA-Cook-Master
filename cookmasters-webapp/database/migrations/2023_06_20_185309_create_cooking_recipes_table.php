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
        Schema::create('cooking_recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100)->unique();
            $table->text('description');
            $table->string('image', 100)->nullable();
            $table->integer('cooking_time');
            $table->integer('difficulty');
            $table->integer('people');
            $table->boolean('deliverable')->default(false);
            $table->string('price');
            $table->integer('availablequantity');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooking_recipes');
    }
};
