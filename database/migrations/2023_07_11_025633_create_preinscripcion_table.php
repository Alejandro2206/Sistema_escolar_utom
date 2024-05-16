<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('preinscripcions', function (Blueprint $table) {
            $table->id();
            $table->string('constancia_estudio')->nullable();
            $table->string('examen_diagnostico')->nullable();
            $table->string('comprobante_pago')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preinscripcions');
    }
};
