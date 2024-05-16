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
        Schema::create('cuatrimestres', function (Blueprint $table) {
            $table->id();
            $table->string('cuatrimestre_nombre');
            $table->date('cuatrimestre_fecha_inicio');
            $table->date('cuatrimestre_fecha_termino');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuatrimestres');
    }
};
