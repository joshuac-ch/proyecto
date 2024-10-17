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
        Schema::create('socialmedia', function (Blueprint $table) {
            $table->id();
            $table->string("cuenta");
            $table->enum("tipo",["x","facebook","instagram"]);
            $table->unsignedBigInteger("publi_id");
            $table->foreign("publi_id")->on("publicacion")->references("id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialmedia');
    }
};
