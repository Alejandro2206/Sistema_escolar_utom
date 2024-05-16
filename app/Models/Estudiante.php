<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public function carreras(){
        return $this->belongsTo(Carrera::class, 'id_carreras');
    }

    

    public function cuatrimestres(){
        return $this->belongsTo(Cuatrimestre::class, 'id_cuatrimestres');
    }

    protected $fillable = [
    'estudiante_matricula',
    'id_carreras',
    'id_cuatrimestres',
    'estudiante_status',
    'estudiante_nombre',
    'estudiante_apellido_paterno',
    'estudiante_apellido_materno',
    'estudiante_nombre_completo',
    'estudiante_edad',
    'estudiante_estado_nacimiento',
    'estudiante_municipio_nacimiento',
    'estudiante_localidad_nacimiento',
    'estudiante_fecha_nacimiento',
    'estudiante_genero',
    'estudiante_estado_civil',
    'estudiante_personas_depende_de_ti',
    'estudiante_quienes',
    'estudiante_tipo_sanguineo',
    'estudiante_numero_social',
    'estudiante_enfermedad_cronica',
    'estudiante_cual_enfermedad',
    'estudiante_discapacidades',
    'estudiante_instancia_medica',
    'estudiante_lengua_indigena',
    'estudiante_trabajas_actualmente',
    'estudiante_donde_trabajas',
    'estudiante_tutor',
    'estudiante_telefono_tutor',
    'estudiante_calle',
    'estudiante_numero',
    'estudiante_codigo_postal',
    'estudiante_colonia_actual',
    'estudiante_localidad_actual',
    'estudiante_municipio_actual',
    'estudiante_estado_actual',
    'estudiante_telefono',
    'estudiante_celular',
    'estudiante_email',
    'estudiante_escuela_egreso',
    'estudiante_estado',
    'estudiante_municipio',
    'estudiante_localidad',
    'estudiante_año_inicio_bachillerato',
    'estudiante_año_final_bachillerato',
    'estudiante_perfil_egreso',
    'estudiante_especialidad_bachillerato',
    'estudiante_promedio_bachillerato',
    'estudiante_curp'];
}

