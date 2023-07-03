<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('workshop_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_id')->constrained()->onDelete('cascade');
            $table->datetime('session_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workshop_sessions');
    }
}
