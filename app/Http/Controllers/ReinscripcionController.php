<?php

namespace App\Http\Controllers;

use App\Models\Reinscripcion;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class ReinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::oldest()->paginate(5);
        $data = Reinscripcion::paginate(5);
        return view('reinscripcion_index', compact('data', 'estudiantes'));
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');

        $estudiantes = Estudiante::query()
            ->where('estudiante_matricula', 'LIKE', "%$search%")
            ->get();

        return view('reinscripcion_index', compact('estudiantes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $estudiante_id = $request->input('estudiante_id');
        $estudiantes = Estudiante::find($estudiante_id);

        return view('reincripcion_create', compact('estudiantes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reinscripcion $reinscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reinscripcion $reinscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reinscripcion $reinscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reinscripcion $reinscripcion)
    {
        //
    }
}
