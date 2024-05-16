<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'id_estudiantes');
    }

    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'cuatrimestre', 'carrera'];
}
