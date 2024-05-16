<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Periodo::oldest()->paginate(5);

        return view('periodo_index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periodo_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'periodo_ciclo'         =>  'required',
            'periodo_asignatura'       =>  'required',
            'periodo_cerrado'       =>  'required'
        ]);



        $periodo = new Periodo();

        $periodo->periodo_ciclo = $request->periodo_ciclo;
        $periodo->periodo_asignatura = $request->periodo_asignatura;
        $periodo->periodo_cerrado = $request->periodo_cerrado;
       

        $periodo->save();

        return redirect()->route('periodos.index')->with('success', 'El periodo  se ha añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
    {
        return view('periodo_show', compact('periodo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {
        return view('periodo_edit', compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periodo $periodo)
{
    $request->validate([
        'periodo_ciclo' => 'required',
        'periodo_asignatura' => 'required',
        'periodo_cerrado' => 'required'
    ]);

    // Actualizar los atributos del periodo existente
    $periodo->periodo_ciclo = $request->periodo_ciclo;
    $periodo->periodo_asignatura = $request->periodo_asignatura;
    $periodo->periodo_cerrado = $request->periodo_cerrado;

    $periodo->save();

    return redirect()->route('periodos.index')->with('success', 'El periodo se ha actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        $periodo->delete();

        return redirect()->route('periodos.index')->with('success', 'El periodo se ha eliminado exitosamente');
    }
}
