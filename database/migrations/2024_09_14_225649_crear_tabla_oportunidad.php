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
        Schema::create('oportunidad', function (Blueprint $table) {
            $table->id();
            $table->text("descipcion");
            $table->enum("estado",[
                "nuevo","en proceso","en negociacion","ganada","perdida","en espera",
                "cancelada","reabierta"
            ]);
            $table->date("fecha");            
            $table->unsignedBigInteger("vendedor_id");
            $table->foreign("vendedor_id")->on("vendedor")->references("id");
            $table->unsignedBigInteger("producto_id");#opcional deberia ser el producto? 
            $table->foreign("producto_id")->on("producto")->references("id");
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oportunidad');
    }
};
