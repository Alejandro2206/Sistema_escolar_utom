<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rol::latest()->paginate(5);

        return view('rol_index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rol_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rol_descripcion'          =>  'required',
        ]);

        $rol = new Rol;

        $rol-> rol_descripcion = $request->rol_descripcion;
        $rol->save();

        return redirect()->route('rols.index')->with('success', 'Rol agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        return view('rol_show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        return view('rol_edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'rol_descripcion'      =>  'required',
        ]);

        $rol = Rol::find($request->hidden_id);


        $rol->rol_descripcion = $request->rol_descripcion;

        $rol->save();

        return redirect()->route('rols.index')->with('success', 'El rol han sido actualizados correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();

        return redirect()->route('rols.index')->with('success', 'Rol eliminado de manera correcta.');
    }
}
