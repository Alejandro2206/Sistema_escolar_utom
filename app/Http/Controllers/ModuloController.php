<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Modulo::latest()->paginate(5);

        return view('modulo_index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modulo_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modulo_descripcion'          =>  'required',
            'modulo_nombre'         =>  'required|unique:modulos',
            'modulo_orden'         =>  'required|'
        ]);



        $modulo = new Modulo;

        $modulo->modulo_descripcion = $request->modulo_descripcion;
        $modulo->modulo_nombre = $request->modulo_nombre;
        $modulo->modulo_orden = $request->modulo_orden;

        $modulo->save();

        return redirect()->route('modulos.index')->with('success', 'Modulo Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modulo $modulo)
    {
        return view('show', compact('modulo'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modulo $modulo)
    {
        return view('modulo_edit', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modulo $modulo)
    {
        $request->validate([
            'modulo_descripcion'          =>  'required',
            'modulo_nombre'         =>  'required|unique:modulos',
            'modulo_orden'         =>  'required'
        ]);



        $modulo = Modulo::find($request->hidden_id);

        $modulo->modulo_descripcion = $request->modulo_descripcion;

        $modulo->modulo_nombre = $request->modulo_nombre;

        $modulo->modulo_orden = $request->modulo_orden;

        $modulo->save();

        return redirect()->route('modulos.index')->with('success', 'Se ha actualizado el modulo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modulo $modulo)
    {
        $modulo->delete();

        return redirect()->route('modulo.index')->with('success', 'Modulo Data deleted successfully');
    }
}
