<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digitalizacion extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'preinscripcion',
        'inscripcion',
        'reinscripcion',
        'titulo_tsu',
        'titulo_ing_lic',
        ];
}