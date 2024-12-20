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
        Schema::create('contacto_reunion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reuniones_id')->constrained('reuniones')->onDelete('cascade');
            $table->foreignId('contacto_id')->constrained('contactos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto_reunion');
    }
};
