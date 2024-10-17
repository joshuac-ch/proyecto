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
        Schema::create('publicacion', function (Blueprint $table) {
            $table->id();
            $table->text("descripcion");
            $table->string("medios")->nullable();
            $table->date("fecha");
            $table->date("hora");
            #campaña opcional
            //$table->unsignedBigInteger("campanna_id")->nullable();
            //$table->foreign("campanna_id")->on("campañas")->references("id");
            
            #----------------------------------------
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion');
    }
};
