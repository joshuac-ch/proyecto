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
        Schema::create('campañas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->date("fechainicio");
            $table->date("fechafin");
           $table->enum("estado",["borrador","pendiente","en curso","finalizada","suspendida","cancelada","archivada","en revision","otro"]);
           #administrador deberia ser el propietario o usuarios?
            #porque usuarios porque es la tabla que tendra todos los usuarios 
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->references("id")->on("admin");
            #como se deberia realizar el recurso
            #$table->unsignedBigInteger("recurso");
            #$table->foreign("recurso");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campañas');
    }
};
