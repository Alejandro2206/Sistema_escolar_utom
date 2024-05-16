<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Asignatura;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class CalificacionController extends Controller
{
    
    public function index()
    {
        $calificaciones = Calificacion::oldest()->paginate(5);
        $asignaturas = Asignatura::all();
        $estudiantes = Estudiante::oldest()->paginate(5);

        return view('calificacion_index', compact('calificaciones', 'asignaturas', 'estudiantes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }

    public function create(Request $request)
    {
        $asignaturas = Asignatura::all();
        $selectedEstudianteId = $request->input('estudiante_id'); // Obtener el ID del estudiante de la URL

        // Obtener todos los estudiantes para mostrar en el formulario
        $estudiantes = Estudiante::all();

        // Obtener el estudiante seleccionado si se proporciona el parámetro en la URL
        $estudiante = null;
        if ($selectedEstudianteId) {
            $estudiante = Estudiante::findOrFail($selectedEstudianteId);
        }

        return view('calificacion_create', compact('estudiantes', 'asignaturas', 'estudiante'));
    }


    public function store(Request $request)
    {
        $calificacion = new Calificacion([
            'id_estudiantes_' => $request->input('id_estudiantes'),
            'id_asignaturas_' => $request->input('id_asignaturas'),
            'parcial1' => $request->input('parcial1'),
            'parcial2' => $request->input('parcial2'),
            'parcial3' => $request->input('parcial3'),
            'extraordinario' => $request->input('extraordinario'),
            'ultima_asignatura' => $request->input('ultima_asignatura'),
            'final' => $request->input('final')
        ]);

        $calificacion = new Calificacion([
            'id_estudiantes' => $request->input('id_estudiantes'),
            'ciclos_id' => $request->input('ciclos_id'),
            'id_asignaturas' => $request->input('id_asignaturas'),
            'parcial1' => $request->input('parcial1'),
            'parcial2' => $request->input('parcial2'),
            'parcial3' => $request->input('parcial3'),
            'extraordinario' => $request->input('extraordinario', 0), // Valor por defecto de 0 si no se proporciona
            'ultima_asignatura' => $request->input('ultima_asignatura'),
            'final' => $request->input('final', 0)
        ]);



        $calificacion->save();

        return redirect()->route('calificaciones.index')->with('success', 'Calificación creada exitosamente.');
    }

    public function edit($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->load('estudiante'); // Cargar la relación con el estudiante
        return view('calificacion_edit', compact('calificacion'));
    }


    public function update(Request $request, $id)
    {
        $calificacion = Calificacion::findOrFail($id);

        $request->validate([
            'parcial1' => 'required|numeric',
            'parcial2' => 'required|numeric',
            'parcial3' => 'required|numeric',
            'extraordinario' => 'required|numeric',
            'ultima_asignatura' => 'required|numeric',
            'final' => 'required|numeric',
        ]);

        $calificacion->parcial1 = $request->input('parcial1');
        $calificacion->parcial2 = $request->input('parcial2');
        $calificacion->parcial3 = $request->input('parcial3');
        $calificacion->extraordinario = $request->input('extraordinario');
        $calificacion->ultima_asignatura = $request->input('ultima_asignatura');
        $calificacion->final = $request->input('final');

        $calificacion->save();

        return redirect()->route('calificacion.show', $calificacion->id);
    }

    public function show($id)
    {
        $calificacion = Calificacion::findOrFail($id);

        return view('calificacion_show', compact('calificacion'));
    }


    public function updateCalificacion(Request $request)
    {
        $id_estudiantes = $request->input('id_estudiantes');
        $id_asignaturas = $request->input('id_asignaturas');
        $parcial2 = $request->input('parcial2');

        // Buscar la calificación existente
        $calificacion = Calificacion::where('id_estudiantes', $id_estudiantes)
                                    ->where('id_asignaturas', $id_asignaturas)
                                    ->first();

        if ($calificacion) {
            // Actualizar la calificación
            $calificacion->parcial2 = $parcial2;
            $calificacion->save();

            // Redirigir con mensaje de éxito
            return redirect()->route('calificaciones.index')->with('success', 'Calificación guardada exitosamente.');
        } else {
            // Manejar el caso en que no se encuentre la calificación
            return redirect()->back()->with('error', 'No se encontró una calificación para el estudiante y asignatura seleccionados.');
        }
    }
    public function updateCalificacionp3(Request $request)
    {
        $id_estudiantes = $request->input('id_estudiantes');
        $id_asignaturas = $request->input('id_asignaturas');
        $parcial3 = $request->input('parcial3');

        // Buscar la calificación existente
        $calificacion = Calificacion::where('id_estudiantes', $id_estudiantes)
                                    ->where('id_asignaturas', $id_asignaturas)
                                    ->first();

        if ($calificacion) {
            // Actualizar la calificación del parcial 3
            $calificacion->parcial3 = $parcial3;
            $calificacion->save();

            // Recalcular y actualizar la calificación final
            $promedio = ($calificacion->parcial1 + $calificacion->parcial2 + $parcial3) / 3;
            $calificacion->final = $promedio;
            $calificacion->save();

            // Redirigir con mensaje de éxito
            return redirect()->route('calificaciones.index')->with('success', 'Calificación guardada exitosamente.');
        } else {
            // Manejar el caso en que no se encuentre la calificación
            return redirect()->back()->with('error', 'No se encontró una calificación para el estudiante y asignatura seleccionados.');
        }
    }
}
