<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Carrera;
use App\Models\Cuatrimestre;
use Carbon\Carbon;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $carreras = Carrera::all();
    $cuatrimestres = Cuatrimestre::all();
    $estadisticas = $this->getEstadisticas($request);
    $carreraSeleccionada = $request->input('Carrera');
    $cuatrimestreSeleccionado = $request->input('Cuatrimestre');

    return view('estadistica_index', compact('estadisticas', 'carreras', 'carreraSeleccionada', 'cuatrimestres', 'cuatrimestreSeleccionado'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('estadistica_index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pdf(Request $request)
{
    $estadisticas = $this->getEstadisticas($request);

    $pdf = PDF::loadView('estadistica_pdf', compact('estadisticas'));

    return $pdf->stream();
}

private function getEstadisticas(Request $request){

    $estudiantes = Estudiante::all();
    $carreraSeleccionada = $request->input('Carrera');
    $cuatrimestreSeleccionado = $request->input('Cuatrimestre');

    $carreras = Carrera::where('id', $carreraSeleccionada)->first();
    $cuatrimestres = Cuatrimestre::where('id', $cuatrimestreSeleccionado)->first();

    $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

    if ($carreras && $cuatrimestres) {

    $nuevoIngresoMujeres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {
    $query->where('id_carreras', $carreraSeleccionada);
    })
    ->where('estudiante_genero', 'Femenino')
    ->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {
    $query->where('id_cuatrimestres', $cuatrimestreSeleccionado)->where('cuatrimestre_nombre', '1er Cuatrimestre');
    })
    ->count();

    $nuevoIngresoHombres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {
        $query->where('id_carreras', $carreraSeleccionada);
        })
        ->where('estudiante_genero', 'Masculino')
        ->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {
        $query->where('id_cuatrimestres', $cuatrimestreSeleccionado)->where('cuatrimestre_nombre', '1er Cuatrimestre');
        })
        ->count();

    $numeroMujeres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $numeroHombres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();

    $LindigenaM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_lengua_indigena', 'Si')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $LindigenaH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_lengua_indigena', 'Si')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    
    $NIEMmenos18 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', '<', 18)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEHmenos18 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', '<', 18)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM18 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 18)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH18 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 18)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM19 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 19)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH19 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 19)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM20 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 20)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH20 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 20)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM21 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 21)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH21 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 21)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM22 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 22)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH22 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 22)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM23 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 23)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH23 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 23)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM24 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 24)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH24 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 24)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM25 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 25)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH25 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 25)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM26 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 26)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH26 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 26)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM27 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 27)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH27 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 27)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM28 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 28)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH28 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 28)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEM29 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', 29)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEH29 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', 29)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEHmenos34 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->whereBetween('estudiante_edad', [30, 34] )->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEMmenos34 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->whereBetween('estudiante_edad', [30, 34] )->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEHmenos39 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->whereBetween('estudiante_edad', [35, 39] )->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEMmenos39 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->whereBetween('estudiante_edad', [35, 39] )->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEMmas40 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_edad', '>=', 40)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();
    $NIEHmas40 = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_edad', '>=', 40)->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->count();

    $NIDMM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->where('estudiante_discapacidades', 'Motriz')->count();
    $NIDMH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->where('estudiante_discapacidades', 'Motriz')->count();
    $NIDAM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->where('estudiante_discapacidades', 'Auditiva')->count();
    $NIDAH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->where('estudiante_discapacidades', 'Auditiva')->count();
    $NIDVM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->where('estudiante_discapacidades', 'Visual')->count();
    $NIDVH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre');})->where('estudiante_discapacidades', 'Visual')->count();
    
    $NISM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_estado_civil', 'Soltero/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NISH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_estado_civil', 'Soltero/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NICM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_estado_civil', 'Casado/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NICH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_estado_civil', 'Casado/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NISeM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_estado_civil', 'Separado/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NISeH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_estado_civil', 'Separado/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NIDM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_estado_civil', 'Divorciado/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NIDH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_estado_civil', 'Divorciado/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NIVM = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_estado_civil', 'Viudo/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $NIVH = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_estado_civil', 'Viudo/a')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('cuatrimestre_nombre', '1er Cuatrimestre')->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();

    $BTMujeres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_status', 'Baja Temporal')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $BTHombres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_status', 'Baja Temporal')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $BDMujeres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Femenino')->where('estudiante_status', 'Baja Definitiva')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();
    $BDHombres = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {$query->where('id_carreras', $carreraSeleccionada);})->where('estudiante_genero', 'Masculino')->where('estudiante_status', 'Baja Definitiva')->whereHas('cuatrimestres', function ($query) use ($cuatrimestreSeleccionado) {$query->where('id_cuatrimestres', $cuatrimestreSeleccionado);})->count();

    if ($cuatrimestres) {
        $nombreCuatrimestre = $cuatrimestres->cuatrimestre_nombre;
        $fechaInicio = Carbon::createFromFormat('Y-m-d', $cuatrimestres->cuatrimestre_fecha_inicio);
        $mesInicio = $meses[($fechaInicio->format('n')) - 1];

        $fechaTermino = Carbon::createFromFormat('Y-m-d', $cuatrimestres->cuatrimestre_fecha_termino);
        $mesTermino = $meses[($fechaTermino->format('n')) - 1];

        $anio = $fechaInicio->format('Y');
        $cuatrimestreFormato = "$nombreCuatrimestre $mesInicio-$mesTermino $anio";
    }

    $estadisticas = [
        'carreraSeleccionada' => $carreras ? $carreras->carrera_descripcion : '(Presione generar estadisticas)',
        'cuatrimestreSeleccionado' => $cuatrimestreFormato,
        'carreras' => $carreras,
        'cuatrimestres' => $cuatrimestres,
        'estudiantes' => $estudiantes,

        'nuevoIngresoMujeres' => $nuevoIngresoMujeres,
        'nuevoIngresoHombres' => $nuevoIngresoHombres,

        'NIEMmenos18' => $NIEMmenos18,
        'NIEHmenos18' => $NIEHmenos18,
        'NIEM18' => $NIEM18,
        'NIEH18' => $NIEH18,
        'NIEM19' => $NIEM19,
        'NIEH19' => $NIEH19,
        'NIEM20' => $NIEM20,
        'NIEH20' => $NIEH20,
        'NIEM21' => $NIEM21,
        'NIEH21' => $NIEH21,
        'NIEM22' => $NIEM22,
        'NIEH22' => $NIEH22,
        'NIEM23' => $NIEM23,
        'NIEH23' => $NIEH23,
        'NIEM24' => $NIEM24,
        'NIEH24' => $NIEH24,
        'NIEM25' => $NIEM25,
        'NIEH25' => $NIEH25,
        'NIEM26' => $NIEM26,
        'NIEH26' => $NIEH26,
        'NIEM27' => $NIEM27,
        'NIEH27' => $NIEH27,
        'NIEM28' => $NIEM28,
        'NIEH28' => $NIEH28,
        'NIEM29' => $NIEM29,
        'NIEH29' => $NIEH29,
        'NIEMmenos34' => $NIEMmenos34,
        'NIEHmenos34' => $NIEHmenos34,
        'NIEMmenos39' => $NIEMmenos39,
        'NIEHmenos39' => $NIEHmenos39,
        'NIEMmas40' => $NIEMmas40,
        'NIEHmas40' => $NIEHmas40,

        'NIDMM' => $NIDMM,
        'NIDMH' => $NIDMH,
        'NIDAM' => $NIDAM,
        'NIDAH' => $NIDAH,
        'NIDVM' => $NIDVM,
        'NIDVH' => $NIDVH,

        'NISM' => $NISM,
        'NISH' => $NISH,
        'NICM' => $NICM,
        'NICH' => $NICH,
        'NISeM' => $NISeM,
        'NISeH' => $NISeH,
        'NIDM' => $NIDM,
        'NIDH' => $NIDH,
        'NIVM' => $NIVM,
        'NIVH' => $NIVH,

        'numeroMujeres' => $numeroMujeres,
        'numeroHombres' => $numeroHombres,
        'LindigenaM' => $LindigenaM,
        'LindigenaH' => $LindigenaH,
        'BTMujeres' => $BTMujeres,
        'BTHombres' => $BTHombres,
        'BDMujeres' => $BDMujeres,
        'BDHombres' => $BDHombres,
    ];

    }else{
        $estadisticas = [
            'carreraSeleccionada' => $carreras ? $carreras->carrera_descripcion : '(Presione generar estadisticas)',
            'cuatrimestreSeleccionado' => $cuatrimestres ? $cuatrimestres->cuatrimestre_nombre . ' ' . $cuatrimestres->cuatrimestre_fecha_inicio . ' ' . $cuatrimestres->cuatrimestre_fecha_termino : '(Presione generar estadisticas)',
        ];
    
    }
    
    return $estadisticas;
    
}

}
