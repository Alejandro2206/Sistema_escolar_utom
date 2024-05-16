<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function mostrarEncuesta()
    {
        return view('encuesta');
    }

    public function guardarEncuesta(Request $request)
    {
        $request->validate([
            'puntuacion' => 'required',
        ]);

        Encuesta::create([
            'puntuacion' => $request->puntuacion,
            'comentario' => $request->comentario,
        ]);

        return redirect('/encuesta')->with('success', 'Encuesta enviada con éxito');
    }
}
