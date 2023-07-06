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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('equipment_id')->nullable()->constrained('equipment')->onDelete('cascade');
            $table->foreignId('cooking_recipe_id')->nullable()->constrained('cooking_recipes')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('price');
            $table->string('stripe_payment_intent_id')->nullable();
            $table->dateTime('returned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
