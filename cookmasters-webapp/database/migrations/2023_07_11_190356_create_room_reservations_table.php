<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('room_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->integer('number_of_people');
            $table->decimal('total_price', 8, 2);
            $table->string('status');
            $table->string('payment_intent_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_receipt_url')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_reservations');
    }
};
