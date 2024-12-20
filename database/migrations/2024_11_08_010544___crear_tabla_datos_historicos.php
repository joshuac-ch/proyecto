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
        Schema::create('ventas_historicas', function (Blueprint $table) {
            $table->id();
            $table->integer('monto_oportunidad');
            $table->integer('tiempo_oportunidad_dias');
            $table->integer('numero_interacciones');
            $table->string('sector_cliente');
            $table->integer('productos_ofrecidos'); // Guardamos los productos como JSON
            $table->string('region_cliente');
            $table->string('estado_oportunidad'); // Ganado o Perdido
            $table->string('canal_contacto');
            $table->integer('interacciones_previas');
            $table->float('presupuesto_cliente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_historicas');
    }
};
