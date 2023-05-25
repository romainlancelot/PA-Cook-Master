<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('duration');
            $table->text('description')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_plan')->nullable();
            $table->timestamps();
        });

        DB::table('subscription_plans')->insert([
            ['name' => 'Free', 'price' => 0, 'duration' => 0, 'description' => 'Free subscription plan'],
            ['name' => 'Basic', 'price' => 8, 'duration' => 30, 'description' => 'Basic subscription plan'],
            ['name' => 'Premium', 'price' => 15, 'duration' => 30, 'description' => 'Premium subscription plan'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
