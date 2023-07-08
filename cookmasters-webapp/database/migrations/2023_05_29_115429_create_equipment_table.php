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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('saleable')->default(true);
            $table->boolean('reservable')->default(false);
            $table->string('category');
            $table->string('marque');
            $table->json('key_features')->nullable();
            $table->json('colors')->nullable();
            $table->string('simple_description');
            $table->string('warranty_url');
            $table->string('height');
            $table->string('width');
            $table->string('depth');
            $table->string('dimensional_guide_url');
            $table->string('name_3d');
            $table->string('manual_url');
            $table->json('photos')->nullable();
            $table->string('description');
            $table->string('price');
            $table->integer('availablequantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
