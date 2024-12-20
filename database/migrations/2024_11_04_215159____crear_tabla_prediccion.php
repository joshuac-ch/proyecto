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
        Schema::create('prediccions', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto_oportunidad', 15, 2);
            $table->integer('tiempo_oportunidad_dias');
            $table->integer('numero_interacciones');
            $table->string('sector_cliente');
            $table->integer('productos_ofrecidos');
            $table->string('region_cliente');
            $table->string('canal_contacto');
            $table->integer('interacciones_previas');
            $table->decimal('presupuesto_cliente', 15, 2);
            $table->boolean('estado_predicho')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediccions');
    }
};
