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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->enum("prioridad", ["baja", "media", "alta"]);
            $table->unsignedBigInteger('asociado_contacto');
            $table->unsignedBigInteger("asociado_propietario");
            $table->date("fecha_vencimiento");
            $table->foreign("asociado_propietario")->on('usuarios')->references('id');
            $table->foreign('asociado_contacto')->on('contactos')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
