<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteSearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $estudiantes = Estudiante::query()
            ->where('estudiante_matricula', 'LIKE', "%$search%")
            ->get();
            
        return view('estudiante_index', compact('estudiantes'));
    }
}
