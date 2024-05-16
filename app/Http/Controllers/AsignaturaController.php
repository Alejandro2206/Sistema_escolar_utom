<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Asignatura::oldest()->paginate(5);

        return view('asignatura_index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asignatura_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asignatura_plan'          =>  'required',
            'asignatura_descripcion'          =>  'required'
        ]);



        $asignatura = new Asignatura();

        $asignatura->asignatura_plan = $request->asignatura_plan;
        $asignatura->asignatura_descripcion = $request->asignatura_descripcion;
       

        $asignatura->save();

        return redirect()->route('asignaturas.index')->with('success', 'La asignatura se ha añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignatura_show', compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura $asignatura)
    {
        return view('asignatura_edit', compact('asignatura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignatura $asignatura)
{
    $request->validate([
        'asignatura_plan' => 'required',
        'asignatura_descripcion' => 'required'
    ]);

    // Actualizar los atributos de la asignatura existente
    $asignatura->asignatura_plan = $request->asignatura_plan;
    $asignatura->asignatura_descripcion = $request->asignatura_descripcion;

    $asignatura->save();

    return redirect()->route('asignaturas.index')->with('success', 'La asignatura se ha actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();

        return redirect()->route('asignaturas.index')->with('success', 'La asignatura se ha eliminado exitosamente');
    }
}
