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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();


            $table->foreignId('id_estudiantes')
            ->nullable()
            ->default(null)
            ->constrained('estudiantes')
            ->cascadeOnUpdate();

            $table->foreignId('id_asignaturas')
            ->nullable()
            ->default(null)
            ->constrained('asignaturas')
            ->cascadeOnUpdate();

            $table->float('parcial1');
            $table->float('parcial2');
            $table->float('parcial3');
            $table->float('extraordinario');
            $table->float('ultima_asignatura');
            $table->float('final');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
