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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->default(false);
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->json('photos')->nullable();
            $table->string('description');
            $table->integer('capacity');
            $table->integer('price');
            $table->string('type');
            $table->json('payment_type')->nullable();
            $table->integer('surface')->nullable();
            $table->json('facilities')->nullable();
            $table->json('availability_days')->nullable();
            $table->integer('minimum_reservation_hours')->nullable();
            $table->json('reservation_hours')->nullable();  
            $table->boolean('allow_more_people')->nullable();
            $table->integer('max_people')->nullable();
            $table->integer('caution')->nullable();
            $table->json('activities')->nullable();
            $table->json('rules')->nullable();
            $table->json('options')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
