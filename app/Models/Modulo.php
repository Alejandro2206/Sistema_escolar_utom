<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $fillable =[
        'modulo_descripcion',
        'modulo_nombre',
        'modulo_orden'
    ];


}
