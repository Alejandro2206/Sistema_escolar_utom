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
        Schema::create('kardexs', function (Blueprint $table) {
            $table->id();
            $table->string('kardex_name');
            $table->string('kardex_matricula');
            $table->json('kardex_plans'); //Este será el el array de planes o carreras de la UTOM
            $table->json('kardex_quadmesters'); //Array cuatrimestres
            $table->json('kardex_subjects'); //Array asignaturas
            $table->string('kardex_ratings'); //Calificaciones
            $table->string('kardex_average'); //Promedio
            $table->foreignId('id_estudiantes')
            ->nullable()
            ->default(null)
            ->constrained('estudiantes')
            ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kadexs');
    }
};
