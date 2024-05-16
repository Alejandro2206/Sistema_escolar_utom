<?php

namespace App\Http\Controllers;

use App\Models\TituloTsu;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class TituloTsuController extends Controller
{

    public function index()
    {
        $data = TituloTsu::paginate(5);
        $estudiantes = Estudiante::oldest()->paginate(5);
        return view('titulotsu_index', compact('data','estudiantes'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $estudiantes = Estudiante::query()
            ->where('estudiante_matricula', 'LIKE', "%$search%")
            ->get();

        return view('titulotsu_index', compact('estudiantes'));
    }

    public function create(Request $request)
    {
        $estudiante_id = $request->input('estudiante_id');
        $estudiantes = Estudiante::find($estudiante_id);

        return view('titulotsu_create', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comprobante_pago' => 'required|mimes:pdf',
            'liberacion_servicio' => 'required|mimes:pdf',
            'reporte_tecnico' => 'required|mimes:pdf',
            'fotografias' => 'required|image|max:2048',
        ]);

        // Procesar y guardar los archivos según tus necesidades
        $titulotsu = new TituloTsu;


        if ($request->hasFile('comprobante_pago')) {
            $comprobantePago = $request->file('comprobante_pago');
            $comprobantePagoName = time() . '.' . $comprobantePago->getClientOriginalExtension();
            $comprobantePago->move(public_path('docutitulotsu'), $comprobantePagoName);
            $titulotsu->comprobante_pago = $comprobantePagoName;
        }

        if ($request->hasFile('liberacion_servicio')) {
            $liberacionServicio = $request->file('liberacion_servicio');
            $liberacionServicioName = time() . '.' . $liberacionServicio->getClientOriginalExtension();
            $liberacionServicio->move(public_path('docutitulotsu'), $liberacionServicioName);
            $titulotsu->liberacion_servicio = $liberacionServicioName;

        }

        if ($request->hasFile('reporte_tecnico')) {
            $certificadoBachillerato = $request->file('reporte_tecnico');
            $certificadoBachilleratoName = time() . '.' . $certificadoBachillerato->getClientOriginalExtension();
            $certificadoBachillerato->move(public_path('docutitulotsu'), $certificadoBachilleratoName);
            $titulotsu->reporte_tecnico = $certificadoBachilleratoName;

        }

        if ($request->hasFile('fotografias')) {
            $fotografias = $request->file('fotografias');
            $fotografiasName = time() . '.' . $fotografias->getClientOriginalExtension();
            $fotografias->move(public_path('images'), $fotografiasName);
            $titulotsu->fotografias = $fotografiasName;
        }

        $titulotsu->save();

        return redirect()->route('titulotsu.index')->with('success', 'Titulo Tsu creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $titulotsu = TituloTsu::find($id);

        if (!$titulotsu) {
            return redirect()->route('titulotsu_index')->with('error', 'Titulo Tsu no encontrada.');
        }

        return view('titulotsu_edit', compact('titulotsu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'comprobante_pago' => 'nullable|mimes:pdf',
            'liberacion_servicio' => 'nullable|mimes:pdf',
            'reporte_tecnico' => 'nullable|mimes:pdf',
            'fotografias' => 'nullable|image|max:2048',
        ]);


        $titulotsu = TituloTsu::find($id);

        if (!$titulotsu) {
            return redirect()->route('titulotsu.index')->with('error', 'Titulo Tsu no encontrada.');
        }


        if ($request->hasFile('comprobante_pago')) {
            $comprobantePago = $request->file('comprobante_pago');
            $comprobantePagoName = time() . '.' . $comprobantePago->getClientOriginalExtension();
            $comprobantePago->move(public_path('docutitulotsu'), $comprobantePagoName);
            $titulotsu->comprobante_pago = $omprobantePagoName;
        }

        if ($request->hasFile('liberacion_servicio')) {
            $liberacionServicio = $request->file('liberacion_servicio');
            $liberacionServicioName = time() . '.' . $liberacionServicio->getClientOriginalExtension();
            $liberacionServicio->move(public_path('docutitulotsu'), $liberacionServicioName);
            $titulotsu->liberacion_servicio = $liberacionServicioName;

        }

        if ($request->hasFile('reporte_tecnico')) {
            $certificadoBachillerato = $request->file('reporte_tecnico');
            $certificadoBachilleratoName = time() . '.' . $certificadoBachillerato->getClientOriginalExtension();
            $certificadoBachillerato->move(public_path('docutitulotsu'), $certificadoBachilleratoName);
            $titulotsu->reporte_tecnico = $certificadoBachilleratoName;

        }

        if ($request->hasFile('fotografias')) {
            $fotografias = $request->file('fotografias');
            $fotografiasName = time() . '.' . $fotografias->getClientOriginalExtension();
            $fotografias->move(public_path('images'), $fotografiasName);
            $titulotsu->fotografias = $fotografiasName;
        }

        $titulotsu->save();

        return redirect()->route('titulotsu.index')->with('success', 'Titulo Tsu creada exitosamente.');

    }

    public function show($id)
    {
        $titulotsu = TituloTsu::find($id);

        if (!$titulotsu) {
            return redirect()->route('digitalizacion.index')->with('error', 'Titulo Tsu no encontrada.');
        }

        return view('titulotsu_show', compact('titulotsu'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $titulotsu = TituloTsu::find($id);

        $titulotsu->delete();

        return redirect()->route('titulotsu.index')->with('success', 'Titulo Tsu eliminada exitosamente.');

    }
}
