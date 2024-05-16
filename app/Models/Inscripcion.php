<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripcions';

    protected $fillable = [
        'curp_original',
        'comprobante_domicilio',
        'certificado_bachillerato',
        'acta_nacimiento',
    ];
}
