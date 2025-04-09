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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_appointment');
            $table->foreignId('etat_appointment_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('observation')->nullable();
            $table->boolean('controle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
