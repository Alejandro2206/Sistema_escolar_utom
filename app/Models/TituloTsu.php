<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TituloTsu extends Model
{
    protected $table = 'titulo_tsus';

    protected $fillable = [
        'comprobante_pago',
        'liberacion_servicio',
        'reporte_tecnico',
        'fotografias',
    ];
}
