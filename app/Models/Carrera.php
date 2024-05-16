<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    public function estudiantes(){
        return $this->hasMany(Estudiante::class, 'id');
    }
    protected $fillable =[
        'carrera_clave',
        'carrera_descripcion',
    ];
}

