<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Carrera::oldest()->paginate(6);

        return view('carrera_index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carrera_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'carrera_clave'         =>  'required',
            'carrera_descripcion'       =>  'required'
        ]);



        $carrera = new Carrera();

        $carrera->carrera_clave = $request->carrera_clave;
        $carrera->carrera_descripcion = $request->carrera_descripcion;
       

        $carrera->save();

        return redirect()->route('carreras.index')->with('success', 'La carrera  se ha añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        return view('carrera_show', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        return view('carrera_edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'carrera_clave' => 'required',
            'carrera_descripcion' => 'required'
        ]);
    
        // Actualizar los atributos de la carrera existente
        $carrera->carrera_clave = $request->carrera_clave;
        $carrera->carrera_descripcion = $request->carrera_descripcion;
    
        $carrera->save();
    
        return redirect()->route('carreras.index')->with('success', 'La carrera se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return redirect()->route('carreras.index')->with('success', 'La carrera se ha eliminado exitosamente');
    }
}
