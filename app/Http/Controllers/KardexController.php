<?php

namespace App\Http\Controllers;

use App\Models\Kardex;
use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class KardexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $carreras = Carrera::all();
    $carreraSeleccionada = $request->input('Carrera');

    if ($carreraSeleccionada) {
        $estudiantesPorCarrera = Estudiante::whereHas('carreras', function ($query) use ($carreraSeleccionada) {
            $query->where('id', $carreraSeleccionada);
        })->get();
    } else {
        $estudiantesPorCarrera = []; // Por defecto, si no se selecciona una carrera
    }

    return view('kardex_index', compact('carreras', 'estudiantesPorCarrera'));
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
    public function show(Kardex $kardex)
    {
        return view('kardex_index', compact('kardex'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kardex $kardex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kardex $kardex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kardex $kardex)
    {
        //
    }
    
    public function pdf(Request $request)
{
    Carbon::setLocale('es');
    $estudiantes = Estudiante::all();
    $carreraSeleccionada = $request->input('Carrera');

    // composer require nesbot/carbon POR SI QUIEREN LA HORA Y FECHA ACTUAL EN UN DOCUMENTO DE FORMA DINÁMICA
    $fechaActual = Carbon::now()->formatLocalized('%d días de %B del %Y'); // Obtener la fecha actual

    $nombreAlumno = "ALEJANDRO CAMACHO VÁZQUEZ";
    $matricula = "UTOM200008TI";
    $cuatrimestres = [
        'I' => [
            'Introducción a la Programación' => 9,
            'Matemáticas' => 8,
            'Fundamentos de Sistemas' => 8,
            'Inglés Técnico' => 8,
            'Estructuras de Datos' => 9,
            'Administración de Proyectos' => 8,
            'Comunicación Oral y Escrita' => 9,
        ],
        'II' => [
            'Programación Orientada a Objetos' => 9,
            'Bases de Datos' => 8,
            'Análisis y Diseño de Sistemas' => 8,
            'Redes de Computadoras' => 8,
            'Diseño de Interfaces de Usuario' => 8,
            'Metodologías de Desarrollo de Software' => 9,
            'Ética Profesional' => 8,
        ],
        'III' => [
            'Desarrollo Web Avanzado' => 9,
            'Sistemas Operativos' => 8,
            'Ingeniería de Software' => 9,
            'Seguridad Informática' => 8,
            'Gestión de Proyectos de TI' => 9,
            'Diseño de Bases de Datos' => 8,
            'Programación Concurrente' => 8,
        ],
        'IV' => [
            'Desarrollo de Aplicaciones Móviles' => 8,
            'Calidad de Software' => 9,
            'Inteligencia Artificial' => 8,
            'Arquitectura de Software' => 9,
            'Gestión de Configuración' => 8,
            'Diseño de Pruebas de Software' => 8,
            'Prácticas Profesionales' => 9,
        ],
        'V' => [
            'Desarrollo de Software Empresarial' => 9,
            'Gestión de Requerimientos' => 8,
            'Pruebas de Rendimiento y Carga' => 8,
            'Optativas de Especialización' => 9,
            'Taller de Desarrollo Ágil' => 8,
            'Auditoría de Sistemas' => 8,
            'Seminario de Titulación' => 9,
        ],
        'VI' => [
            'Gestión de Cambios en TI' => 9,
            'Optativas de Especialización' => 8,
            'Desarrollo de Proyecto Final' => 9,
            'Innovación y Emprendimiento' => 8,
            'Optativas de Especialización' => 8,
            'Taller de Emprendimiento Tecnológico' => 9,
            'Seminario de Titulación II' => 8,
        ],
        'VII' => [
            'Gestión de Cambios en TI' => 10,
            'Optativas de Especialización' => 10,
            'Desarrollo de Proyecto Final' => 10,
            'Innovación y Emprendimiento' => 10,
            'Optativas de Especialización' => 10,
            'Taller de Emprendimiento Tecnológico' => 10,
            'Seminario de Titulación II' => 10,
        ],
        'VIII' => [
            'Gestión de Cambios en TI' => 10,
            'Optativas de Especialización' => 10,
            'Desarrollo de Proyecto Final' => 10,
            'Innovación y Emprendimiento' => 10,
            'Optativas de Especialización' => 10,
            'Taller de Emprendimiento Tecnológico' => 10,
            'Seminario de Titulación II' => 10,
        ],
        'IX' => [
            'Gestión de Cambios en TI' => 10,
            'Optativas de Especialización' => 10,
            'Desarrollo de Proyecto Final' => 10,
            'Innovación y Emprendimiento' => 10,
            'Optativas de Especialización' => 10,
            'Taller de Emprendimiento Tecnológico' => 10,
            'Seminario de Titulación II' => 10,
        ],
        // Agregar más cuatrimestres según sea necesario
    ];

    // Calcular el promedio de las calificaciones
    $totalCalificaciones = 0;
    $totalMaterias = 0;

    foreach ($cuatrimestres as $materias) {
        foreach ($materias as $calificacion) {
            $totalCalificaciones += $calificacion;
            $totalMaterias++;
        }
    }

    $promedio = number_format($totalCalificaciones / $totalMaterias, 1); // Usar un sólo decimal



    $data = [
        'nombreAlumno' => $nombreAlumno,
        'matricula' => $matricula,
        'cuatrimestres' => $cuatrimestres,
        'promedio' => $promedio,
        'fechaActual' => $fechaActual,
    ];

    $pdf = Pdf::loadView('kardex_pdf', $data);
    return $pdf->stream();
}

}