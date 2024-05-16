<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Digitalizacion;
use App\Models\Preinscripcion;
use App\Models\Inscripcion;
use App\Models\Reinscripcion;
use App\Models\TituloTsu;
use App\Models\TituloIngLic;
use App\Models\Estudiante;

class DigitalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $digitalizacion = digitalizacion::oldest()->paginate(5);
    $preinscripcion = Preinscripcion::first();
    $inscripcion = Inscripcion::first();
    $reinscripcion = Reinscripcion::first();
    $titulotsu = TituloTsu::first();
    $tituloinglic = TituloIngLic::first();
    $estudiantes = Estudiante::oldest()->paginate(5);
    return view('digitalizacion_index', compact( 'digitalizacion','preinscripcion','inscripcion', 'reinscripcion', 'titulotsu', 'tituloinglic', 'estudiantes'))
    ;
}

    public function inicio()
{
    return view('digitalizacion.inicio');
}
public function search(Request $request)
    {
        $search = $request->input('search');

        $estudiantes = Estudiante::query()
            ->where('estudiante_matricula', 'LIKE', "%$search%")
            ->get();

        return view('digitalizacion_index', compact('estudiantes'));
    }
public function preinscripcion()
{
    // Lógica para la ruta de ficha
}

public function inscripcion()
{
    // Lógica para la ruta de inscripción
}

public function reinscripcion()
{
    // Lógica para la ruta de reinscripción
}

public function tituloTsu()
{
    // Lógica para la ruta de titulación TSU
}

public function tituloIngLic()
{
    // Lógica para la ruta de titulación Ing/Lic
}



public function show($id)
{

}

}