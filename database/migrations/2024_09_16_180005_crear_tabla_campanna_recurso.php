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
        Schema::create('campanna_recursos', function (Blueprint $table) {
            $table->id();
           // $table->unsignedBigInteger("campanna_id")->nullable();
            //$table->foreign("campanna_id")->on("campañas")->references("id");
            //$table->foreignId('campaña_id')->constrained("campañas")->onDelete('cascade');
            //$table->unsignedBigInteger('recurso_id');
            //$table->string('recurso_type'); // Para distinguir entre 'email', 'publicacion', 'form'
            $table->unsignedBigInteger('campañas_id');
            $table->morphs('recursoable'); // crea los campos recursoable_id y recursoable_type
            $table->timestamps();
    
            // Clave foránea para la tabla campaña
            $table->foreign('campañas_id')->references('id')->on('campañas')->onDelete('cascade');
      
          //  $table->timestamps();
            //$table->unique(['campanna_id', 'recurso_id', 'recurso_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campanna_recursos');
    }
};
