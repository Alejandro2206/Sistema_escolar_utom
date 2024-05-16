<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Cuatrimestre;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::oldest()->paginate(5);
        $carreras = Carrera::all();
        $cuatrimestres = Cuatrimestre::all();
        return view('estudiante_index', compact('estudiantes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $carreras = Carrera::all(); // Obtener todas las carreras de la tabla "carreras"
        $cuatrimestres = Cuatrimestre::all(); // Obtener todas las carreras de la tabla "carreras"
        return view('estudiante_create', compact('cuatrimestres','carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_matricula'  =>  'required',
            //'id_carreras' =>  'required',
            //'id_cuatrimestres' => 'required',
            'estudiante_status' =>  'required',
            'estudiante_nombre'     =>  'required',
            'estudiante_apellido_paterno'   =>  'required',
            'estudiante_apellido_materno'   =>  'required',
            'estudiante_nombre_completo'  =>  'required',
            'estudiante_edad'  =>  'required',
            'estudiante_estado_nacimiento'  =>  'required',
            'estudiante_municipio_nacimiento'   =>  'required',
            'estudiante_localidad_nacimiento'   =>  'required',
            'estudiante_fecha_nacimiento'   =>  'required',
            'estudiante_genero' =>  'required',
            'estudiante_estado_civil'   =>  'required',
            'estudiante_personas_depende_de_ti' =>  'required',
            'estudiante_quienes' => 'required',
            'estudiante_tipo_sanguineo' =>  'required',
            'estudiante_numero_social'  =>  'required',
            'estudiante_enfermedad_cronica' =>  'required',
            'estudiante_cual_enfermedad' => 'required',
            'estudiante_discapacidades' =>  'required',
            'estudiante_instancia_medica' => 'required',
            //'estudiante_lengua_indigena'    =>  'required',
            'estudiante_trabajas_actualmente'   =>  'required',
            'estudiante_donde_trabajas' => 'required',
            'estudiante_tutor'  =>  'required',
            'estudiante_telefono_tutor' =>  'required',
            'estudiante_calle'  =>  'required',
            'estudiante_numero' =>  'required',
            'estudiante_codigo_postal'  =>  'required',
            'estudiante_colonia_actual' =>  'required',
            'estudiante_localidad_actual' =>  'required',
            'estudiante_municipio_actual' =>  'required',
            'estudiante_estado_actual' =>  'required',
            'estudiante_telefono' =>  'required',
            'estudiante_celular' =>  'required',
            'estudiante_email'  =>  'required|email|unique:estudiantes',
            'estudiante_escuela_egreso' =>  'required',
            'estudiante_estado' =>  'required',
            'estudiante_municipio' =>  'required',
            'estudiante_localidad' =>  'required',
            'estudiante_año_inicio_bachillerato' =>  'required',
            'estudiante_año_final_bachillerato' =>  'required',
            'estudiante_perfil_egreso' =>  'required',
            'estudiante_especialidad_bachillerato' =>  'required',
            'estudiante_promedio_bachillerato' =>  'required',
            'estudiante_curp' =>  'required',
           
        ]);

       

        $estudiante = new Estudiante();
       
        $estudiante->estudiante_matricula = $request->estudiante_matricula;
        $estudiante->id_carreras = $request->carrera_descripcion;
        $estudiante->id_cuatrimestres =$request->cuatrimestre_nombre;
        $estudiante->estudiante_status = $request->estudiante_status;
        $estudiante->estudiante_nombre = $request->estudiante_nombre;
        $estudiante->estudiante_apellido_paterno = $request->estudiante_apellido_paterno;
        $estudiante->estudiante_apellido_materno = $request->estudiante_apellido_materno;
        $estudiante->estudiante_nombre_completo =  $request->estudiante_nombre_completo;
        $estudiante->estudiante_edad = $request->estudiante_edad;
        $estudiante->estudiante_estado_nacimiento = $request->estudiante_estado_nacimiento;
        $estudiante->estudiante_municipio_nacimiento = $request->estudiante_municipio_nacimiento;
        $estudiante->estudiante_localidad_nacimiento = $request->estudiante_localidad_nacimiento;
        $estudiante->estudiante_fecha_nacimiento = $request->estudiante_fecha_nacimiento;
        $estudiante->estudiante_genero = $request->estudiante_genero;
        $estudiante->estudiante_estado_civil = $request->estudiante_estado_civil;
        $estudiante->estudiante_personas_depende_de_ti = $request->estudiante_personas_depende_de_ti;
        $estudiante->estudiante_quienes = $request->estudiante_quienes;
        $estudiante->estudiante_tipo_sanguineo = $request->estudiante_tipo_sanguineo;
        $estudiante->estudiante_numero_social = $request->estudiante_numero_social;
        $estudiante->estudiante_enfermedad_cronica = $request->estudiante_enfermedad_cronica;
        $estudiante->estudiante_cual_enfermedad = $request->estudiante_cual_enfermedad;
        $estudiante->estudiante_discapacidades = $request->estudiante_discapacidades;
        $estudiante->estudiante_instancia_medica = $request->estudiante_instancia_medica;
        //$estudiante->estudiante_lengua_indigena= $request->estudiante_lengua_indigena;
        $estudiante->estudiante_trabajas_actualmente = $request->estudiante_trabajas_actualmente;
        $estudiante->estudiante_donde_trabajas = $request->estudiante_donde_trabajas;
        $estudiante->estudiante_tutor = $request->estudiante_tutor;
        $estudiante->estudiante_telefono_tutor = $request->estudiante_telefono_tutor;
        $estudiante->estudiante_calle = $request->estudiante_calle;
        $estudiante->estudiante_codigo_postal = $request->estudiante_codigo_postal;
        $estudiante->estudiante_colonia_actual = $request->estudiante_colonia_actual;
        $estudiante->estudiante_localidad_actual = $request->estudiante_localidad_actual;
        $estudiante->estudiante_municipio_actual = $request->estudiante_municipio_actual;
        $estudiante->estudiante_estado_actual = $request->estudiante_estado_actual;
        $estudiante->estudiante_telefono = $request->estudiante_telefono;
        $estudiante->estudiante_celular = $request->estudiante_celular;
        $estudiante->estudiante_email = $request->estudiante_email;
        $estudiante->estudiante_escuela_egreso = $request->estudiante_escuela_egreso;
        $estudiante->estudiante_estado = $request->estudiante_estado;
        $estudiante->estudiante_municipio = $request->estudiante_municipio;
        $estudiante->estudiante_localidad = $request->estudiante_localidad;
        $estudiante->estudiante_año_inicio_bachillerato = $request->estudiante_año_inicio_bachillerato;
        $estudiante->estudiante_año_final_bachillerato = $request->estudiante_año_final_bachillerato;
        $estudiante->estudiante_perfil_egreso = $request->estudiante_perfil_egreso;
        $estudiante->estudiante_especialidad_bachillerato = $request->estudiante_especialidad_bachillerato;
        $estudiante->estudiante_promedio_bachillerato = $request->estudiante_promedio_bachillerato;
        $estudiante->estudiante_curp = $request->estudiante_curp;
        



        $estudiante->save();

        return redirect()->route('estudiantes.index')->with('success', 'El estudiante se ha agregado correctamente');
    }

    public function show(Estudiante $estudiante)
    {
        return view('estudiante_show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::all();
        $cuatrimestres = Cuatrimestre::all();
    
        return view('estudiante_edit', compact('estudiante', 'carreras', 'cuatrimestres'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'estudiante_matricula' => 'required',
            'id_carreras' => 'required', // Descomenta esta línea si es requerido
            'id_cuatrimestres' => 'required', // Descomenta esta línea si es requerido
            'estudiante_status' =>  'required',
            'estudiante_nombre' => 'required',
            'estudiante_apellido_paterno' => 'required',
            'estudiante_apellido_materno' => 'required',
            'estudiante_nombre_completo' => 'required',
            'estudiante_edad' => 'required',
            'estudiante_estado_nacimiento' => 'required',
            'estudiante_municipio_nacimiento' => 'required',
            'estudiante_localidad_nacimiento' => 'required',
            'estudiante_fecha_nacimiento' => 'required',
            'estudiante_genero' => 'required',
            'estudiante_estado_civil' => 'required',
            'estudiante_personas_depende_de_ti' => 'required',
            'estudiante_quienes' => 'required',
            'estudiante_tipo_sanguineo' => 'required',
            'estudiante_numero_social' => 'required',
            'estudiante_enfermedad_cronica' => 'required',
            'estudiante_cual_enfermedad' => 'required',
            'estudiante_discapacidades' => 'required',
            'estudiante_instancia_medica' => 'required',
            'estudiante_lengua_indigena' => 'required',
            'estudiante_trabajas_actualmente' => 'required',
            'estudiante_donde_trabajas' => 'required',
            'estudiante_tutor' => 'required',
            'estudiante_telefono_tutor' => 'required',
            'estudiante_calle' => 'required',
            'estudiante_numero' => 'required',
            'estudiante_codigo_postal' => 'required',
            'estudiante_colonia_actual' => 'required',
            'estudiante_localidad_actual' => 'required',
            'estudiante_municipio_actual' => 'required',
            'estudiante_estado_actual' => 'required',
            'estudiante_telefono' => 'required',
            'estudiante_celular' => 'required',
            'estudiante_email' => 'required|email|unique:estudiantes,estudiante_email,' . $estudiante->id,
            'estudiante_escuela_egreso' => 'required',
            'estudiante_estado' => 'required',
            'estudiante_municipio' => 'required',
            'estudiante_año_inicio_bachillerato' => 'required',
            'estudiante_año_final_bachillerato' => 'required',
            'estudiante_perfil_egreso' => 'required',
            'estudiante_especialidad_bachillerato' => 'required',
            'estudiante_promedio_bachillerato' => 'required',
            'estudiante_curp' => 'required',
        ]);
    
        // Utiliza el método fill() para asignación masiva
        $estudiante->fill($request->all());
        $estudiante->save();
    
        return redirect()->route('estudiantes.index')->with('success', 'El estudiante se ha actualizado correctamente');
    }
    

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'El estudiante se ha borrado exitosamente.');
    }
}
