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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('photos')->nullable();
            $table->string('description');
            $table->string('availabilities');
            $table->string('duration');
            $table->string('capacity');
            $table->string('price');
            $table->unsignedBigInteger('room_equipment_id')->nullable();

            $table->foreign('room_equipment_id')->references('id')->on('room_equipment')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
