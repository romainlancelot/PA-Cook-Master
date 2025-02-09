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
        Schema::create('courses_registrations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('courses_id')->constrained('courses');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('courses_module_id')->nullable()->constrained('courses_module');
            $table->unique(['courses_id', 'user_id']);
            $table->boolean('completed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_registrations');
    }
};
