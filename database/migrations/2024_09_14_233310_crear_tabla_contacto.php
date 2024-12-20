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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable();
            $table->string("nombre");
            $table->string("apellido");
            $table->string("correo");
            #quien debe ser el propietario que tenga el contacto vendedor,usuario o administrador
            $table->unsignedBigInteger("propietario_id");
            $table->foreign("propietario_id")->on("usuarios")->references("id");
            #------------------------------------------------------------
            $table->string("telefono");
            $table->enum("estado_lead", [
                "nuevo",
                "calificado",
                "en contacto",
                "interesado",
                "no interesado",
                "en espera",
                "cliente",
                "archivado"
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto');
    }
};
