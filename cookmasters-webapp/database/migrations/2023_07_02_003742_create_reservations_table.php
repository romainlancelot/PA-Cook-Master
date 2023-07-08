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
         Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('number_of_people'); // Nombre de personnes pour la réservation
            $table->integer('total_price');
            $table->string('status');
            $table->integer('discount')->nullable();
            $table->string('payment_intent_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_receipt_url')->nullable();
            $table->timestamp('payment_date')->nullable(); // Date à laquelle le paiement a été effectué
            $table->timestamp('cancelled_at')->nullable(); // Date à laquelle la réservation a été annulée
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
        Schema::dropIfExists('reservations');
    }
};
