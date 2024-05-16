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
        Schema::create('titulo_tsus', function (Blueprint $table) {
            $table->id();
            $table->string('comprobante_pago')->nullable();
            $table->string('liberacion_servicio')->nullable();
            $table->string('reporte_tecnico')->nullable();
            $table->string('fotografias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulo_tsus');
    }
};

