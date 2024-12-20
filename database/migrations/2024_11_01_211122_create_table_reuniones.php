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
        Schema::create('reuniones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anfitrion');
            $table->foreign('anfitrion')->on('usuarios')->references('id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('star_time');
            $table->dateTime('end_time');
            $table->enum('ubicacion', ['presencial', 'llamada', 'virtual']);
            // $table->unsignedBigInteger('lista_contactos');
            // $table->foreign('lista_contactos')->on('contactos')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reuniones');
    }
};
