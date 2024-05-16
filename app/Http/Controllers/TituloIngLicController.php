<?php

namespace App\Http\Controllers;

use App\Models\TituloIngLic;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class TituloIngLicController extends Controller
{

    public function index()
    {
        $data = TituloIngLic::paginate(5);
        $estudiantes = Estudiante::oldest()->paginate(5);
        return view('tituloinglic_index', compact('data','estudiantes'));
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

        return view('tituloinglic_create', compact('estudiantes'));
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
        $tituloinglic = new TituloIngLic;


        if ($request->hasFile('comprobante_pago')) {
            $comprobantePago = $request->file('comprobante_pago');
            $comprobantePagoName = time() . '.' . $comprobantePago->getClientOriginalExtension();
            $comprobantePago->move(public_path('docutituloinglic'), $comprobantePagoName);
            $tituloinglic->comprobante_pago = $comprobantePagoName;
        }

        if ($request->hasFile('liberacion_servicio')) {
            $liberacionServicio = $request->file('liberacion_servicio');
            $liberacionServicioName = time() . '.' . $liberacionServicio->getClientOriginalExtension();
            $liberacionServicio->move(public_path('docutituloinglic'), $liberacionServicioName);
            $tituloinglic->liberacion_servicio = $liberacionServicioName;

        }

        if ($request->hasFile('reporte_tecnico')) {
            $certificadoBachillerato = $request->file('reporte_tecnico');
            $certificadoBachilleratoName = time() . '.' . $certificadoBachillerato->getClientOriginalExtension();
            $certificadoBachillerato->move(public_path('docutituloinglic'), $certificadoBachilleratoName);
            $tituloinglic->reporte_tecnico = $certificadoBachilleratoName;

        }

        if ($request->hasFile('fotografias')) {
            $fotografias = $request->file('fotografias');
            $fotografiasName = time() . '.' . $fotografias->getClientOriginalExtension();
            $fotografias->move(public_path('images'), $fotografiasName);
            $tituloinglic->fotografias = $fotografiasName;
        }

        $tituloinglic->save();

        return redirect()->route('tituloinglic.index')->with('success', 'Titulo Ing Lic creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tituloinglic = TituloTsu::find($id);

        if (!$tituloinglic) {
            return redirect()->route('tituloinglic_index')->with('error', 'Titulo Ing Lic no encontrada.');
        }

        return view('tituloinglic_edit', compact('tituloinglic'));
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


        $tituloinglic = TituloIngLic::find($id);

        if (!$tituloinglic) {
            return redirect()->route('tituloinglic.index')->with('error', 'Titulo Ing Lic no encontrada.');
        }


        if ($request->hasFile('comprobante_pago')) {
            $comprobantePago = $request->file('comprobante_pago');
            $comprobantePagoName = time() . '.' . $comprobantePago->getClientOriginalExtension();
            $comprobantePago->move(public_path('docutituloinglic'), $comprobantePagoName);
            $tituloinglic->comprobante_pago = $omprobantePagoName;
        }

        if ($request->hasFile('liberacion_servicio')) {
            $liberacionServicio = $request->file('liberacion_servicio');
            $liberacionServicioName = time() . '.' . $liberacionServicio->getClientOriginalExtension();
            $liberacionServicio->move(public_path('docutituloinglic'), $liberacionServicioName);
            $tituloinglic->liberacion_servicio = $liberacionServicioName;

        }

        if ($request->hasFile('reporte_tecnico')) {
            $certificadoBachillerato = $request->file('reporte_tecnico');
            $certificadoBachilleratoName = time() . '.' . $certificadoBachillerato->getClientOriginalExtension();
            $certificadoBachillerato->move(public_path('docutituloinglic'), $certificadoBachilleratoName);
            $tituloinglic->reporte_tecnico = $certificadoBachilleratoName;

        }

        if ($request->hasFile('fotografias')) {
            $fotografias = $request->file('fotografias');
            $fotografiasName = time() . '.' . $fotografias->getClientOriginalExtension();
            $fotografias->move(public_path('images'), $fotografiasName);
            $tituloinglic->fotografias = $fotografiasName;
        }

        $tituloinglic->save();

        return redirect()->route('tituloinglic.index')->with('success', 'Titulo Ing Lic creada exitosamente.');

    }

    public function show($id)
    {
        $tituloinglic = TituloIngLic::find($id);

        if (!$tituloinglic) {
            return redirect()->route('digitalizacion.index')->with('error', 'Titulo Ing Lic no encontrada.');
        }

        return view('tituloinglic_show', compact('tituloinglic'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tituloinglic = TituloIngLic::find($id);

        $tituloinglic->delete();

        return redirect()->route('tituloinglic.index')->with('success', 'Titulo Ing Lic eliminada exitosamente.');

    }
}
