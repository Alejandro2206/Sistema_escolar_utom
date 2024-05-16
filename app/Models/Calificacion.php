<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';
    use HasFactory;

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiantes');
    }


    public function asignaturas()
    {
        return $this->belongsTo(Asignatura::class, 'id_asignaturas');
    }

    protected $fillable = [
        'id_estudiantes',
        'id_asignaturas',
        'parcial1',
        'parcial2',
        'parcial3',
        'extraordinario',
        'ultima_asignatura',
        'final'
    ];
}
