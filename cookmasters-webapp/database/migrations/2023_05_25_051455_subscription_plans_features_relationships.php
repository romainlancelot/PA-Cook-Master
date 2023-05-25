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
        Schema::create('features_relationships', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('subscription_plan_id')->constrained('subscription_plans')->onDelete('cascade');
            $table->foreignId('feature_id')->constrained('subscription_plans_features')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('features_relationships')->insert([
            ['subscription_plan_id' => 1, 'feature_id' => 1],
            ['subscription_plan_id' => 2, 'feature_id' => 1],
            ['subscription_plan_id' => 2, 'feature_id' => 2],
            ['subscription_plan_id' => 3, 'feature_id' => 1],
            ['subscription_plan_id' => 3, 'feature_id' => 2],
            ['subscription_plan_id' => 3, 'feature_id' => 3],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans_features_relationships');
    }
};
