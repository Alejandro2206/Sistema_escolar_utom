<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use COM;
use Illuminate\Http\Request;

class CiclosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ciclo::oldest()->paginate(5);

        return view('ciclo_index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('ciclo_create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ciclo_descripcion'          =>  'required'
        ]);



        $ciclo = new Ciclo();

        $ciclo->ciclo_descripcion = $request->ciclo_descripcion;


        $ciclo->save();

        return redirect()->route('ciclos.index')->with('success', 'El ciclo se ha añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciclo $ciclo)
    {
        return view('ciclo_show', compact('ciclo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ciclo $ciclo)
    {
        return view('ciclo_edit', compact('ciclo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        $request->validate([
            'ciclo_descripcion' => 'required'
        ]);

        // Actualizar el atributo del ciclo existente
        $ciclo->ciclo_descripcion = $request->ciclo_descripcion;

        $ciclo->save();

        return redirect()->route('ciclos.index')->with('success', 'El ciclo se ha actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ciclo $ciclo)
    {
        $ciclo->delete();

        return redirect()->route('ciclos.index')->with('success', 'El ciclo se ha eliminado exitosamente');
    }
}
