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
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("oportunidad_id");
            $table->foreign("oportunidad_id")->on("oportunidads")->references("id");
            $table->text("descripcion");
            $table->date("fecha");
            #EL ID RESPONSABLE DEBERIA SER DE OPORTUNIDAD O DE USUARIOS PUEDE QUE NO SIEMPRE
            #SEAN EL MISMO QUE HACE LA OPORTUNIDAD COMO EL QUE HACE EL SEGUIMIENTO  
            $table->unsignedBigInteger("id_responsable");
            $table->foreign("id_responsable")->on("usuarios")->references("id");
            #----------------------------------------
            #cliente_id PUEDE SER EMPRESA O CONTACTO COMO JALAR LOS DOS
            $table->unsignedBigInteger("cliente_id");
            //$table->foreign("cliente_id")->on("contacto")->references("id");
            $table->string("cliente_type");
            $table->enum("tipo_seguimiento", [
                "llamada",
                "correo",
                "reunion",
                "mensaje de texto",
                "visita de persona",
                "encuestas",
                "publicaicon"
            ]);
            $table->enum("estado_seguimiento", [
                "pendiente",
                "en progreso",
                "completado",
                "cancelado",
                "reprogramado",
                "no contactado"
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento');
    }
};
