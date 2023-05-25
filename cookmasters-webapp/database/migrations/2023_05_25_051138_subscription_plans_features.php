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
        Schema::create('subscription_plans_features', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        DB::table('subscription_plans_features')->insert([
            ['name' => 'Feature 1', 'description' => 'Feature 1 description'],
            ['name' => 'Feature 2', 'description' => 'Feature 2 description'],
            ['name' => 'Feature 3', 'description' => 'Feature 3 description'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plans_features');
    }
};
