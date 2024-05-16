<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reinscripcion extends Model
{
    protected $table = 'preinscripcions';


    protected $fillable = [
        'constancia_estudio',
        'examen_diagnostico',
        'comprobante_pago',
        'foto',
    ];
}
