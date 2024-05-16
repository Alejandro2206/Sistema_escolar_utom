<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuatrimestre extends Model
{
    use HasFactory;

    protected $fillable =[
        'cuatrimestre_nombre',
        'cuatrimestre_fecha_inicio',
        'cuatrimestre_fecha_termino',
        
    ];
        
}
