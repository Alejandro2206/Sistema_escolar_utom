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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('estudiante_matricula');
           
           
           $table->foreignId('id_carreras')
           ->nullable()
           ->default(null)
           ->constrained('carreras')
           ->cascadeOnUpdate();

           

           $table->foreignId('id_cuatrimestres')
           ->nullable()
           ->default(null)
           ->constrained('cuatrimestres')
           ->cascadeOnUpdate();

           $table->string('estudiante_status');
            $table->string('estudiante_nombre');
            $table->string('estudiante_apellido_paterno');
            $table->string('estudiante_apellido_materno');
            $table->string('estudiante_nombre_completo');
            $table->string('estudiante_edad');
            $table->string('estudiante_estado_nacimiento');
            $table->string('estudiante_municipio_nacimiento');
            $table->string('estudiante_localidad_nacimiento');
            $table->string('estudiante_fecha_nacimiento');
            $table->enum('estudiante_genero', ['Masculino', 'Femenino']);
            $table->enum('estudiante_estado_civil',['Soltero/a', 'Casado/a', 'Separado/a', 'Divorciado/a', 'Viudo/a']);
            $table->enum('estudiante_personas_depende_de_ti',['Hijos', 'Padres', 'Otro']);
            $table->string('estudiante_quienes');
            $table->string('estudiante_tipo_sanguineo');
            $table->string('estudiante_numero_social');
            $table->enum('estudiante_enfermedad_cronica',['Si', 'No']);
            $table->string('estudiante_cual_enfermedad');
            $table->enum('estudiante_discapacidades',['Motriz', 'Visual', 'Auditiva']);
            $table->string('estudiante_instancia_medica');
            $table->enum('estudiante_lengua_indigena', ['Si', 'No']);
            $table->enum('estudiante_trabajas_actualmente', ['Si', 'No']);
            $table->string('estudiante_donde_trabajas');
            $table->string('estudiante_tutor');
            $table->string('estudiante_telefono_tutor');
            $table->string('estudiante_calle')->nullable();
            $table->string('estudiante_numero')->nullable();
            $table->string('estudiante_codigo_postal');
            $table->string('estudiante_colonia_actual');
            $table->string('estudiante_localidad_actual');
            $table->string('estudiante_municipio_actual');
            $table->string('estudiante_estado_actual');
            $table->string('estudiante_telefono');
            $table->string('estudiante_celular');
            $table->string('estudiante_email');
            $table->string('estudiante_escuela_egreso');
            $table->string('estudiante_estado');
            $table->string('estudiante_municipio');
            $table->string('estudiante_localidad');
            $table->string('estudiante_año_inicio_bachillerato');
            $table->string('estudiante_año_final_bachillerato');
            $table->string('estudiante_perfil_egreso');
            $table->string('estudiante_especialidad_bachillerato');
            $table->string('estudiante_promedio_bachillerato');
            $table->string('estudiante_curp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};