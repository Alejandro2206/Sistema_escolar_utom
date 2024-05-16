<?php

namespace App\Http\Controllers;

use App\Models\Cuatrimestre;
use App\Models\Cuatrimestres;
use COM;
use Illuminate\Http\Request;

class CuatrimestresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    public function index()
    {
        $data = Cuatrimestre::oldest()->paginate(6);

        return view('cuatrimestre_index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('cuatrimestre_create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cuatrimestre_nombre'          =>  'required',
            'cuatrimestre_fecha_inicio'          =>  'required',
            'cuatrimestre_fecha_termino'          =>  'required'
        ]);



        $cuatrimestre = new Cuatrimestre();

        $cuatrimestre->cuatrimestre_nombre = $request->cuatrimestre_nombre;
        $cuatrimestre->cuatrimestre_fecha_inicio = $request->cuatrimestre_fecha_inicio;
        $cuatrimestre->cuatrimestre_fecha_termino = $request->cuatrimestre_fecha_termino;

        $cuatrimestre->save();

        return redirect()->route('cuatrimestres.index')->with('success', 'El Cuatrimestre se agrego exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuatrimestre $cuatrimestre)
    {
        return view('cuatrimestre_show', compact('cuatrimestre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuatrimestre $cuatrimestre)
    {
        return view('cuatrimestre_edit', compact('cuatrimestre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuatrimestre $cuatrimestre)
    {
        $request->validate([
            'cuatrimestre_nombre' => 'required',
            'cuatrimestre_fecha_inicio' => 'required',
            'cuatrimestre_fecha_termino' => 'required'
        ]);

        // Actualizar los atributos del cuatrimestre existente
        $cuatrimestre->cuatrimestre_nombre = $request->cuatrimestre_nombre;
        $cuatrimestre->cuatrimestre_fecha_inicio = $request->cuatrimestre_fecha_inicio;
        $cuatrimestre->cuatrimestre_fecha_termino = $request->cuatrimestre_fecha_termino;

        $cuatrimestre->save();

        return redirect()->route('cuatrimestres.index')->with('success', 'El cuatrimestre se actualizó correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuatrimestre $cuatrimestre)
    {
        $cuatrimestre->delete();

        return redirect()->route('cuatrimestres.index')->with('success', 'El cuatrimestre se ha borrado exitosamente.');
    }
}
