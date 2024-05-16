<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Estudiante;

class InscripcionController extends Controller
{
    
    public function index()
    {

        $estudiantes = Estudiante::oldest()->paginate(5);
        $data = Inscripcion::paginate(5);
        return view('inscripcion_index', compact('data', 'estudiantes'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $estudiantes = Estudiante::query()
            ->where('estudiante_matricula', 'LIKE', "%$search%")
            ->get();

        return view('inscripcion_index', compact('estudiantes'));
    }

    public function create(Request $request)
    {
        $estudiante_id = $request->input('estudiante_id');
        $estudiantes = Estudiante::find($estudiante_id);
        
        return view('inscripcion_create', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([ 
            'curp_original' => 'required|mimes:pdf',
            'comprobante_domicilio' => 'required|mimes:pdf',
            'certificado_bachillerato' => 'required|mimes:pdf',
            'acta_nacimiento' => 'required|mimes:pdf',
        ]);

        // Procesar y guardar los archivos según tus necesidades
        $inscripcion = new Inscripcion;

        if ($request->hasFile('curp_original')) {
            $curpOriginal = $request->file('curp_original');
            $curpOriginalName = time() . '.' . $curpOriginal->getClientOriginalExtension();
            $curpOriginal->move(public_path('docuinscripcion'), $curpOriginalName);
            $inscripcion->curp_original = $curpOriginalName;
        }

        if ($request->hasFile('comprobante_domicilio')) {
            $comprobanteDomicilio = $request->file('comprobante_domicilio');
            $comprobanteDomicilioName = time() . '.' . $comprobanteDomicilio->getClientOriginalExtension();
            $comprobanteDomicilio->move(public_path('docuinscripcion'), $comprobanteDomicilioName);
            $inscripcion->comprobante_domicilio = $comprobanteDomicilioName;

        }

        if ($request->hasFile('certificado_bachillerato')) {
            $certificadoBachillerato = $request->file('certificado_bachillerato');
            $certificadoBachilleratoName = time() . '.' . $certificadoBachillerato->getClientOriginalExtension();
            $certificadoBachillerato->move(public_path('docuinscripcion'), $certificadoBachilleratoName);
            $inscripcion->certificado_bachillerato = $certificadoBachilleratoName;

        }

        if ($request->hasFile('acta_nacimiento')) {
            $actaNacimiento = $request->file('acta_nacimiento');
            $actaNacimientoName = time() . '.' . $actaNacimiento->getClientOriginalExtension();
            $actaNacimiento->move(public_path('docuinscripcion'), $actaNacimientoName);
            $inscripcion->acta_nacimiento = $actaNacimientoName;

        }

        $inscripcion->save();

        return redirect()->route('inscripcion.index')->with('success', 'Inscripción creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inscripcion = Inscripcion::find($id);

        if (!$inscripcion) {
            return redirect()->route('inscripcion_index')->with('error', 'Inscripcion no encontrada.');
        }

        return view('inscripcion_edit', compact('inscripcion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'curp_original' => 'nullable|mimes:pdf',
            'comprobante_domicilio' => 'nullable|mimes:pdf',
            'certificado_bachillerato' => 'nullable|mimes:pdf',
            'acta_nacimiento' => 'nullable|mimes:pdf',
        ]);

        
        $inscripcion = Inscripcion::find($id);

        if (!$inscripcion) {
            return redirect()->route('inscripcion.index')->with('error', 'Inscripcion no encontrada.');
        }

        $inscripcion->matricula = $request->input('matricula');
        $inscripcion->nombre = $request->input('nombre'); 

        if ($request->hasFile('curp_original')) {
            $curpOriginal = $request->file('curp_original');
            $curpOriginalName = time() . '.' . $curpOriginal->getClientOriginalExtension();
            $curpOriginal->move(public_path('docuinscripcion'), $curpOriginalName);
            $inscripcion->curp_original = $curpOriginalName;

        }

        if ($request->hasFile('comprobante_domicilio')) {
            $comprobanteDomicilio = $request->file('comprobante_domicilio');
            $comprobanteDomicilioName = time() . '.' . $comprobanteDomicilio->getClientOriginalExtension();
            $comprobanteDomicilio->move(public_path('docuinscripcion'), $comprobanteDomicilioName);
            $inscripcion->comprobante_domicilio = $comprobanteDomicilioName;

        }

        if ($request->hasFile('certificado_bachillerato')) {
            $certificadoBachillerato = $request->file('certificado_bachillerato');
            $certificadoBachilleratoName = time() . '.' . $certificadoBachillerato->getClientOriginalExtension();
            $certificadoBachillerato->move(public_path('docuinscripcion'), $certificadoBachilleratoName);
            $inscripcion->certificado_bachillerato = $certificadoBachilleratoName;

        }

        if ($request->hasFile('acta_nacimiento')) {
            $actaNacimiento = $request->file('acta_nacimiento');
            $actaNacimientoName = time() . '.' . $actaNacimiento->getClientOriginalExtension();
            $actaNacimiento->move(public_path('docuinscripcion'), $actaNacimientoName);
            $inscripcion->acta_nacimiento = $actaNacimientoName;

        }

        $inscripcion->save();

        return redirect()->route('inscripcion.index')->with('success', 'Inscripción creada exitosamente.');
   
    }

    public function show($id)
    {
        $inscripcion = Inscripcion::find($id);

        if (!$inscripcion) {
            return redirect()->route('inscripcion_index'->with('error', 'Inscripcion no encontrada.'));
        }

        return view('inscripcion_show', compact('inscripcion'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inscripcion = Inscripcion::find($id);

        if (!$inscripcion) {
            return redirect()->route('inscripcion.index')->with('error', 'Inscripcion no encontrada.');
        }

        // Eliminar los archivos de imagen y documentos si existen
        if ($inscripcion->curp_original) {
            $curpOriginalPath = public_path('docuinscripcion/' . $inscripcion->curp_original);
            if (file_exists($curpOriginalPath)) {
                unlink($curpOriginalPath);
            }
        }
        

        if ($inscripcion->comprobante_domicilio) {
            $comprobanteDomicilioPath = public_path('docuinscripcion/' . $inscripcion->comprobante_domicilio);
            if (file_exists($comprobanteDomicilioPath)) {
                unlink($comprobanteDomicilioPath);
            }
        }
        

        if ($inscripcion->certificado_bachillerato) {
            $certificadoBachilleratoPath = public_path('docuinscripcion/' . $inscripcion->certificado_bachillerato);
            if (file_exists($certificadoBachilleratoPath)) {
                unlink($certificadoBachilleratoPath);
            }
        }
        

        if ($inscripcion->acta_nacimiento) {
            $actaNacimientoPath = public_path('docuinscripcion/' . $inscripcion->acta_nacimiento);
            if (file_exists($actaNacimientoPath)) {
                unlink($actaNacimientoPath);
            }
        }
        $inscripcion->delete();

        return redirect()->route('inscripcion.index')->with('success', 'Inscripcion eliminada exitosamente.');
    
    }
}


