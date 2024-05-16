<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RolController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\ConstanciasController;
use App\Http\Controllers\CuatrimestresController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\DigitalizacionController;
use App\Http\Controllers\CiclosController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\KardexController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EstudianteSearchController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PlanController;

use App\Http\Controllers\PreinscripcionController;

use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ReinscripcionController;
use App\Http\Controllers\TituloIngLicController;
use App\Http\Controllers\TituloTsuController;
use App\Http\Controllers\CredencialController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
Route::resource('students', StudentController::class);
Route::resource('constancias', ConstanciasController::class);


Route::resource('rols', RolController::class);
Route::resource('modulos', ModuloController::class);
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('estadisticas/pdf', [EstadisticasController::class, 'pdf'])->name('estadisticas.pdf');
        Route::get('kardex/pdf', [KardexController::class, 'pdf'])->name('kardex.pdf'); 

        Route::resource('rols', RolController::class);
        Route::resource('modulos', ModuloController::class);
        Route::resource('constancias', ConstanciasController::class);
        Route::get('constancias/{estudiante}/generar-pdf', 'ConstanciasController@generarPDF')
            ->name('constancias.generarPDF');
        Route::get('constancias/{estudiante}/generar-pdf-promedio', 'ConstanciasController@generarPDFPromedio')
            ->name('constancias.generarPDFPromedio');
        Route::get('historial-constancias', 'ConstanciasController@historialConstancias')->name('historial-constancias');
        Route::get('limpiar-historial-constancias', 'ConstanciasController@limpiarHistorial')
            ->name('limpiar-historial-constancias');


        
        Route::resource('estudiantes', EstudianteController::class);
        Route::resource('estadisticas', EstadisticasController::class);
        Route::resource('cuatrimestres', CuatrimestresController::class);
        Route::resource('digitalizacion', DigitalizacionController::class);
        Route::resource('ciclos', CiclosController::class);
        Route::resource('calificaciones', CalificacionController::class);
        Route::resource('calificacionesp1', CalificacionP2Controller::class);
        Route::resource('calificacionesp3', CalificacionP3Controller::class);
        Route::resource('kardex', KardexController::class);
        Route::resource('asignaturas', AsignaturaController::class);
        Route::resource('planes', PlanController::class);
        Route::resource('carreras', CarreraController::class);
        Route::resource('periodos', PeriodoController::class);
        Route::resource('preinscripcion', PreinscripcionController::class);
        Route::resource('inscripcion', InscripcionController::class);
        Route::resource('reinscripcion', ReinscripcionController::class);
        Route::resource('titulotsu', TituloTsuController::class);
        Route::resource('tituloinglic', TituloIngLicController::class);
        Route::resource('credencial', OtrosController::class);
        
        // web.php







       

        Route::post('calificaciones/actualizar', 'CalificacionController@updateCalificacion')->name('calificaciones.actualizar');
        Route::post('calificaciones/actualizar3', 'CalificacionController@updateCalificacionp3')->name('calificaciones.actualizarp3');
        Route::get('calificaciones/obtenerparcial2', 'CalificacionController@obtenerParcial2')->name('calificaciones.obtenerparcial2');

        
        Route::get('/encuesta', [EncuestaController::class, 'mostrarEncuesta']);
        Route::post('/encuesta', [EncuestaController::class, 'guardarEncuesta']);
        Route::get('/estudiantes', [EstudianteSearchController::class, 'index'])->name('estudiantes.index');
        Route::get('/calificaciones/create', 'CalificacionController@create')->name('calificaciones.create');
        Route::get('/calificaciones/{calificacion}/edit', 'CalificacionController@edit')->name('calificaciones.edit');
        Route::post('/calificaciones', [CalificacionController::class, 'store'])->name('calificaciones.store');
        Route::get('/calificaciones/buscar', 'CalificacionController@buscar')->name('calificaciones.buscar');
        

        // En routes/web.php

        // ...
        // web.php

        // web.php
Route::get('/calificaciones/{id}', 'CalificacionController@show')->name('calificaciones.show');


    });
});
