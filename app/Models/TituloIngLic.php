<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TituloIngLic extends Model
{
    protected $table = 'titulo_ing_lics';
    
    protected $fillable = [
        'comprobante_pago',
        'liberacion_servicio',
        'reporte_tecnico',
        'fotografias',
    ];
}
