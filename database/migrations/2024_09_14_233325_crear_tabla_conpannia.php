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
        Schema::create('compannia', function (Blueprint $table) {
            $table->id();
            $table->string("nombre empresa");
            $table->string("dominio empresa");
            #------------------------------------
            $table->unsignedBigInteger("propietario_id");
            $table->foreign("propietario_id")->on("usuarios")->references("id"); 
            #-------------------------------
            $table->enum("tipo",["tecnologia","medicina","negocios","otro"]);
            $table->string("ingresos anuales")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compannia');
    }
};
