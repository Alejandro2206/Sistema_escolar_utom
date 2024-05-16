<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    public function calificaciones(){
        return $this->hasMany(Calificacion::class, 'id');
    }

    protected $fillable =[
        'asignatura_plan',
        'asignatura_descripcion',
        
        
    ];
}
