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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string('imagen');
            $table->string("precio");
            $table->text("descripcion");
            $table->string("stock");
            $table->unsignedBigInteger("vendedor_id");
            $table->foreign("vendedor_id")->on("vendedors")->references("id");
            #NO ESTA EN EL DIGRAMA 
            $table->timestamps();                       #SE AGREGO PORQUE ALGUIEN LOS DEBE GESTIONAR
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
