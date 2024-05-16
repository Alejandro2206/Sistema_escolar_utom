<?php

namespace App\Http\Controllers;

use App\Models\Constancia;
use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Cuatrimestre;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use DateTime;
use Carbon\Carbon;


class ConstanciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $query = Estudiante::query();

    if ($search) {
        $query->where('estudiante_matricula', 'LIKE', "%$search%");
    }

    $estudiantes = $query->latest()->paginate(5);
    $carreras = Carrera::all();
    $cuatrimestres = Cuatrimestre::all();

    return view('constancias_index', compact('estudiantes', 'carreras', 'cuatrimestres'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_constancia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_matricula'  =>  'required',
            'estudiante_carrera'    =>  'required',
            'estudiante_nombre'     =>  'required',
            'estudiante_apellido_paterno'   =>  'required',
            'estudiante_apellido_materno'   =>  'required'
        ]);

        Estudiante::create($request->all());

        return redirect()->route('constancias.index')->with('success', 'Constancia added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
{
    // No es necesario usar findOrFail aquí, ya tenemos el estudiante.

    // Verificamos si el estudiante se encontró correctamente en la base de datos
    // y si contiene los datos necesarios.
    return view('show_constancia', compact('estudiante'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiantes)
    {
        return view('edit_constancia', compact('estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiantes)
    {
        $request->validate([
            'student_name'          =>  'required',
            'student_apellidopater'     => 'required',
            'student_apellidomater'     => 'required',
            'student_email'         =>  'required|email|unique:students',
            'student_status'     => 'required',
            'student_estado_civil'     => 'required',
            'student_fecha_nacimiento'     => 'required',
            'student_localidad_nacimiento'     => 'required',
            'student_municipio_nacimiento'     => 'required',
            'student_estado_nacimiento'     => 'required',
            'student_telefo_casa'     => 'required',
            'student_celular'     => 'required',
            'student_image'     =>  'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $student_image = $request->hidden_student_image;

        return redirect()->route('constancias.index')->with('success', 'Constancia updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('constancias.index')->with('success', 'Constancia deleted successfully');
    }
    public function historialConstancias()
{
    $constancias = Constancia::all(); // Obtén todos los registros de la tabla constancias

    return view('historial_constancias', compact('constancias'));
}
public function limpiarHistorial()
{
    // Código para eliminar los registros del historial
    Constancia::truncate();

    return redirect()->route('historial-constancias')
        ->with('success', 'Se ha limpiado el historial de constancias exitosamente.');
}

    public function generarPDF(Request $request)
{
    // Obtén los datos necesarios para la constancia (en tu caso, ya los tienes)
    $estudiante = Estudiante::findOrFail($request->estudiante);

    

    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fechaInicio = Carbon::createFromFormat('Y-m-d', $estudiante->cuatrimestres->cuatrimestre_fecha_inicio);
$mesInicio = $meses[($fechaInicio->format('n')) - 1];
$diaInicio = $fechaInicio->format('d');
$anioInicio = $fechaInicio->format('Y');

$fechaTermino = Carbon::createFromFormat('Y-m-d', $estudiante->cuatrimestres->cuatrimestre_fecha_termino);
$mesTermino = $meses[($fechaTermino->format('n')) - 1];
$diaTermino = $fechaTermino->format('d');
$anioTermino = $fechaTermino->format('Y');
 
     // Ruta de las imágenes
     $imageUtyp = storage_path('app/public/images/utyp_logo.png');
     $imageGobierno = storage_path('app/public/images/gobiernomich_logo.png');
     $imageUtom = storage_path('app/public/images/utom_logo.png');
     
 

    // Renderiza la vista en HTML y pasa los datos del cuatrimestre
    $html = View::make('constancia_pdf', compact('estudiante', 'imageUtyp', 'imageGobierno', 'imageUtom', 'diaInicio', 'mesInicio', 'anioInicio', 'diaTermino', 'mesTermino', 'anioTermino'))->render();

    $options = new Options();
    $options->set('isRemoteEnabled', true);

    // Crea una instancia de Dompdf
    $dompdf = new Dompdf($options);

    // Carga el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    // Opcional: Puedes personalizar la configuración de Dompdf aquí (tamaño de página, orientación, etc.)
    // $dompdf->setPaper('A4', 'portrait');

    // Renderiza el contenido HTML en un PDF
    $dompdf->render();

    // Genera el archivo PDF y guárdalo en el almacenamiento
    $filename = $estudiante->estudiante_matricula . '_' . $estudiante->estudiante_nombre_completo . '.pdf';
    
    file_put_contents($filename, $dompdf->output());
    Constancia::create([
        'nombre' => $estudiante->estudiante_nombre,
        'apellido_paterno' => $estudiante->estudiante_apellido_paterno,
        'apellido_materno' => $estudiante->estudiante_apellido_materno,
        'cuatrimestre' => $estudiante->cuatrimestres->cuatrimestre_nombre ,
        'carrera' => $estudiante->carreras->carrera_descripcion,
    ]);

    // Descarga el archivo PDF en el navegador
    return response()->download($filename)->deleteFileAfterSend(true);
}
public function generarPDFPromedio(Request $request)
{
    // Obtén los datos necesarios para la constancia (en tu caso, ya los tienes)
    $estudiante = Estudiante::findOrFail($request->estudiante);

    

    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fechaInicio = Carbon::createFromFormat('Y-m-d', $estudiante->cuatrimestres->cuatrimestre_fecha_inicio);
$mesInicio = $meses[($fechaInicio->format('n')) - 1];
$diaInicio = $fechaInicio->format('d');
$anioInicio = $fechaInicio->format('Y');

$fechaTermino = Carbon::createFromFormat('Y-m-d', $estudiante->cuatrimestres->cuatrimestre_fecha_termino);
$mesTermino = $meses[($fechaTermino->format('n')) - 1];
$diaTermino = $fechaTermino->format('d');
$anioTermino = $fechaTermino->format('Y');
 
     // Ruta de las imágenes
     $imageUtyp = storage_path('app/public/images/utyp_logo.png');
     $imageGobierno = storage_path('app/public/images/gobiernomich_logo.png');
     $imageUtom = storage_path('app/public/images/utom_logo.png');
     
 

    // Renderiza la vista en HTML y pasa los datos del cuatrimestre
    $html = View::make('constancia_pdf_prom', compact('estudiante', 'imageUtyp', 'imageGobierno', 'imageUtom', 'diaInicio', 'mesInicio', 'anioInicio', 'diaTermino', 'mesTermino', 'anioTermino'))->render();

    $options = new Options();
    $options->set('isRemoteEnabled', true);

    // Crea una instancia de Dompdf
    $dompdf = new Dompdf($options);

    // Carga el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    // Opcional: Puedes personalizar la configuración de Dompdf aquí (tamaño de página, orientación, etc.)
    // $dompdf->setPaper('A4', 'portrait');

    // Renderiza el contenido HTML en un PDF
    $dompdf->render();

    // Genera el archivo PDF y guárdalo en el almacenamiento
    $filename = $estudiante->estudiante_matricula . '_' . $estudiante->estudiante_nombre_completo . '.pdf';
    file_put_contents($filename, $dompdf->output());

    // Crea un nuevo registro en el modelo Constancia
    Constancia::create([
        'nombre' => $estudiante->estudiante_nombre,
        'apellido_paterno' => $estudiante->estudiante_apellido_paterno,
        'apellido_materno' => $estudiante->estudiante_apellido_materno,
        'cuatrimestre' => $estudiante->cuatrimestres->cuatrimestre_nombre ,
        'carrera' => $estudiante->carreras->carrera_descripcion,
    ]);

    // Descarga el archivo PDF en el navegador
    return response()->download($filename)->deleteFileAfterSend(true);
}


}
