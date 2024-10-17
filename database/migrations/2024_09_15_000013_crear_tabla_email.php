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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string("tipo_correo");
            $table->string("nombre_remitente");
            $table->string("correo_remitente");
            $table->text("asunto");
            $table->string("nombre_interno_correo")->nullable();
            $table->string("ubicacion")->nullable();
            #campaña es opcional como implementarla;
            //$table->unsignedBigInteger("campanna_id")->nullable();
            //$table->foreign("campanna_id")->on("campañas")->references("id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
