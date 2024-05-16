<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            $table->string('curp_original')->nullable();
            $table->string('comprobante_domicilio')->nullable();
            $table->string('certificado_bachillerato')->nullable();
            $table->string('acta_nacimiento')->nullable();
            $table->timestamps();
        });
        
    }

    public function down():void
    {
        Schema::dropIfExists('inscripcions');
    }
};
