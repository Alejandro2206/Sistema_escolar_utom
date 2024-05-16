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
        Schema::create('digitalizacions', function (Blueprint $table) {
            $table->string('preinscripcion');
            $table->string('inscripcion');
            $table->string('reinscripcion');
            $table->string('titulo_tsu');
            $table->string('titulo_ing_lic');
            $table->timestamps();

        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('digitalizacions');
    }
};
