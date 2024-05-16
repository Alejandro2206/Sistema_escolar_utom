<?php
namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Asignatura;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class CalificacionP3Controller extends Controller

{
    

    public function index()
    {
        $calificaciones = Calificacion::oldest()->paginate(5);
        $ciclos = Ciclo::all();
        $asignaturas = Asignatura::all();
        $estudiantes = Estudiante::oldest()->paginate(5);
        return view('calificacion_index', compact('calificaciones', 'ciclos', 'asignaturas', 'estudiantes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $estudiantes = Estudiante::query()
            ->where('estudiante_matricula', 'LIKE', "%$search%")
            ->get();

        return view('calificacion_index', compact('estudiantes'));
    }

    public function create(Request $request)
    {
        $ciclos = Ciclo::all();
        $asignaturas = Asignatura::all();
        $estudiantes = Estudiante::all();

        // Obtén el estudiante seleccionado si se proporciona el parámetro en la URL
        $estudiante = null;
        $estudianteId = $request->input('estudiante_id');
        if ($estudianteId) {
            $estudiante = Estudiante::findOrFail($estudianteId);
        }

        // Obtén el ID del ciclo que quieras auto-rellenar
        $idCiclo = 1; // Reemplaza esto con el ID correcto

        // Obtén el ciclo correspondiente
        $cicloSeleccionado = Ciclo::findOrFail($idCiclo);

        // Obtén el ID de la asignatura que quieras auto-rellenar
        $idAsignatura = 1; // Reemplaza esto con el ID correcto

        // Obtén la asignatura correspondiente
        $asignaturaSeleccionada = Asignatura::findOrFail($idAsignatura);

        return view('calificacion_create_parcial3', compact('ciclos', 'asignaturas', 'estudiantes', 'estudiante', 'idCiclo', 'idAsignatura', 'cicloSeleccionado', 'asignaturaSeleccionada'));
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
    



    public function show(Calificacion $calificacion)
    {
        $calificacion->load('estudiante.ciclo', 'estudiante.asignatura');

        return view('calificacion_show', compact('calificacion'));
    }

    public function edit(Calificacion $calificacion)
    {
        $ciclos = Ciclo::all();
        $asignaturas = Asignatura::all();
        $estudiantes = Estudiante::all();

        return view('calificacion_edit', compact('calificacion', 'asignaturas', 'estudiantes'));
  
    }

    public function update(Request $request, Calificacion $calificacion)
    {
        $calificacion->update([
            
       
            'parcial2' => $request->input('parcial2'),
           
        ]);

        return redirect()->route('calificaciones.index')->with('success', 'Calificación actualizada exitosamente.');
    }
    public function destroy(Calificacion $calificacion)
    {
        $calificacion->delete();
        return redirect()->route('calificaciones.index')->with('success', 'Calificación eliminada exitosamente.');
    }

    public function updateCalificacionp3(Request $request)
    {
        $id_estudiantes = $request->input('id_estudiantes');
        $id_asignaturas= $request->input('id_asignaturas');
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

   
}