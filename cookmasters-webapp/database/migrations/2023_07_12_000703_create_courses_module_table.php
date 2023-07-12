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
        Schema::create('courses_module', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('course_id')->constrained('courses');
            $table->integer('previous_module_id')->nullable();
            $table->integer('next_module_id')->nullable();
            $table->time('duration');
            $table->string('video');
            $table->text('introduction');            
            $table->text('description');
            $table->text('conclusion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_module');
    }
};
