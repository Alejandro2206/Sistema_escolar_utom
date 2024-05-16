<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preinscripcion;
use App\Models\Estudiante;


class PreinscripcionController extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::oldest()->paginate(5);
        $data = Preinscripcion::paginate(5);
        return view('preinscripcion_index', compact('data', 'estudiantes'));
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $estudiantes = Estudiante::query()
            ->where('estudiante_matricula', 'LIKE', "%$search%")
            ->get();

        return view('preinscripcion_index', compact('estudiantes'));
    }

    public function create(Request $request)
    {
        $estudiante_id = $request->input('estudiante_id');
        $estudiantes = Estudiante::find($estudiante_id);

        return view('preinscripcion_create', compact('estudiantes'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'constancia_estudio' => 'required|mimes:pdf',
            'examen_diagnostico' => 'required|mimes:pdf',
            'comprobante_pago' => 'required|mimes:pdf',
            'foto' => 'required|image|max:2048',
        ]);

        // Procesar y guardar los archivos según tus necesidades
        $preinscripcion = new Preinscripcion;

        $estudiante_id = $request->estudiante_id;

        if ($request->hasFile('constancia_estudio')) {
            $constanciaEstudio = $request->file('constancia_estudio');
            $constanciaEstudioName = 'constancia_estudio' . '.' . $constanciaEstudio->getClientOriginalExtension();
            $constanciaEstudio->move(public_path('documentos/'.''.$estudiante_id), $constanciaEstudioName);
            $preinscripcion->constancia_estudio = 'documentos/'.''.$estudiante_id.'/'.$constanciaEstudioName;
        }

        if ($request->hasFile('examen_diagnostico')) {
            $examenDiagnostico = $request->file('examen_diagnostico');
            $examenDiagnosticoName = 'examen_diagnostico'. '.' . $examenDiagnostico->getClientOriginalExtension();
            $examenDiagnostico->move(public_path('documentos/'.''.$estudiante_id), $examenDiagnosticoName);
            $preinscripcion->examen_diagnostico = 'documentos/'.''.$estudiante_id.'/'.$examenDiagnosticoName;
        }

        if ($request->hasFile('comprobante_pago')) {
            $comprobantePago = $request->file('comprobante_pago');
            $comprobantePagoName = 'comprobante_pago' . '.' . $comprobantePago->getClientOriginalExtension();
            $comprobantePago->move(public_path('documentos/'.''.$estudiante_id), $comprobantePagoName);
            $preinscripcion->comprobante_pago = 'documentos/'.''.$estudiante_id.'/'.$comprobantePagoName;
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = 'foto' . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('documentos/'.''.$estudiante_id), $fotoName);
            $preinscripcion->foto = 'documentos/'.''.$estudiante_id.'/'.$fotoName;
        }

        $preinscripcion->save();

        return redirect()->route('digitalizacion.index')->with('success', 'Preinscripción creada exitosamente.');
    }

    public function edit($id)
    {
        $preinscripcion = Preinscripcion::find($id);

        if (!$preinscripcion) {
            return redirect()->route('preinscripcion_index')->with('error', 'Preinscripción no encontrada.');
        }

        return view('preinscripcion_edit', compact('preinscripcion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'constancia_estudio' => 'nullable|mimes:pdf',
            'examen_diagnostico' => 'nullable|mimes:pdf',
            'comprobante_pago' => 'nullable|mimes:pdf',
            'foto' => 'nullable|image|max:2048',
        ]);

        $preinscripcion = Preinscripcion::find($id);

        if (!$preinscripcion) {
            return redirect()->route('preinscripcion_index')->with('error', 'Preinscripción no encontrada.');
        }



        // Procesar y actualizar los archivos según tus necesidades
        if ($request->hasFile('constancia_estudio')) {
            $constanciaEstudio = $request->file('constancia_estudio');
            $constanciaEstudioName = time() . '.' . $constanciaEstudio->getClientOriginalExtension();
            $constanciaEstudio->move(public_path('documentos'), $constanciaEstudioName);
            $preinscripcion->constancia_estudio = $constanciaEstudioName;
        }

        if ($request->hasFile('examen_diagnostico')) {
            $examenDiagnostico = $request->file('examen_diagnostico');
            $examenDiagnosticoName = time() . '.' . $examenDiagnostico->getClientOriginalExtension();
            $examenDiagnostico->move(public_path('documentos'), $examenDiagnosticoName);
            $preinscripcion->examen_diagnostico = $examenDiagnosticoName;
        }

        if ($request->hasFile('comprobante_pago')) {
            $comprobantePago = $request->file('comprobante_pago');
            $comprobantePagoName = time() . '.' . $comprobantePago->getClientOriginalExtension();
            $comprobantePago->move(public_path('documentos'), $comprobantePagoName);
            $preinscripcion->comprobante_pago = $comprobantePagoName;
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('images'), $fotoName);
            $preinscripcion->foto = $fotoName;
        }

        $preinscripcion->save();

        return redirect()->route('preinscripcion.index')->with('success', 'Preinscripción actualizada exitosamente.');
    }

    public function show($id)
    {
        $preinscripcion = Preinscripcion::find($id);

        if (!$preinscripcion) {
            return redirect()->route('digitalizacion.index')->with('error', 'Preinscripción no encontrada.');
        }

        return view('preinscripcion_show', compact('preinscripcion'));
    }

    public function destroy($id)
    {
        $preinscripcion = Preinscripcion::find($id);

        if (!$preinscripcion) {
            return redirect()->route('preinscripcion.index')->with('error', 'Preinscripción no encontrada.');
        }

        // Eliminar los archivos de imagen y documentos si existen
        if ($preinscripcion->constancia_estudio) {
            $constanciaEstudioPath = public_path('documentos/' . $preinscripcion->constancia_estudio);
            if (file_exists($constanciaEstudioPath)) {
                unlink($constanciaEstudioPath);
            }
        }

        if ($preinscripcion->examen_diagnostico) {
            $examenDiagnosticoPath = public_path('documentos/' . $preinscripcion->examen_diagnostico);
            if (file_exists($examenDiagnosticoPath)) {
                unlink($examenDiagnosticoPath);
            }
        }

        if ($preinscripcion->comprobante_pago) {
            $comprobantePagoPath = public_path('documentos/' . $preinscripcion->comprobante_pago);
            if (file_exists($comprobantePagoPath)) {
                unlink($comprobantePagoPath);
            }
        }

        if ($preinscripcion->foto) {
            $fotoPath = public_path('images/' . $preinscripcion->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $preinscripcion->delete();

        return redirect()->route('preinscripcion.index')->with('success', 'Preinscripción eliminada exitosamente.');
    }
}


