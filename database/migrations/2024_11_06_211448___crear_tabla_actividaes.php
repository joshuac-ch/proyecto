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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anfitrion');
            $table->foreign('anfitrion')->on('usuarios')->references('id');
            //$table->unsignedBigInteger('id_user');
            //$table->foreign('id_user')->on('usuarios')->references('id');
            $table->string('accion');
            $table->string('entidad');
            $table->unsignedBigInteger('id_entidad')->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
