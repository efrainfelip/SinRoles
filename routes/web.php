<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MateriaEstudianteController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CarreraController;


use App\Http\Controllers\MateriaDocenteController;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/generales', [HorarioController::class, 'indexGeneral'])->name('horarios.generales');

//Rutas para horarios
Route::get('/horarios', [HorarioController::class, 'indexGeneral'])->name('horarios.indexGeneral');
Route::delete('/horarios/delete/{horarioId}', [HorarioController::class, 'destroy'])->name('horarios.destroy');
Route::get('/horarios/edit/{horarioId}', [HorarioController::class, 'edit'])->name('horarios.edit');
Route::put('/horarios/update/{horarioId}', [HorarioController::class, 'update'])->name('horarios.update');
Route::get('/horarios/materias/{id}', [HorarioController::class, 'show'])->name('horarios.show');
Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
Route::get('/horarios/create', [HorarioController::class ,'create'])->name('horarios.create');

//Buscadores
Route::get('estudiantes/search', [EstudiantesController::class, 'search'])->name('estudiantes.search');
Route::get('materias/search', [MateriasController::class, 'search'])->name('materias.search');
Route::get('docentes/search', [DocentesController::class, 'search'])->name('docentes.search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('/MateriaEstudiante/{materiaEstudiante}', [MateriaEstudianteController::class, 'update'])->name('MateriaEstudiante.update');
Route::delete('/MateriaEstudiante/{materiaEstudiante}', [MateriaEstudianteController::class, 'destroy'])->name('MateriaEstudiante.destroy');



Route::put('/MateriaDocente/{materiaDocente}', [MateriaDocenteController::class, 'update'])->name('MateriaDocente.update');
Route::delete('/MateriaDocente/{materiaDocente}', [MateriaDocenteController::class, 'destroy'])->name('MateriaDocente.destroy');


Route::get('/notas_estudiante/{estudiante}', [CalificacionesController::class, 'index'])->name('notas_estudiante');
Route::get('/notas_estudiante/exportExcel/{estudiante}', [CalificacionesController::class, 'exportExcel'])->name('calificacion.exportExcel');


Route::get('/calificacion/export-pdf/{estudiante}', [CalificacionesController::class, 'exportPDF'])->name('calificacion.exportPDF');

Route::group(['middleware'=>['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('MateriaEstudiante', MateriaEstudianteController::class); 
    Route::resource('MateriaDocente', MateriaDocenteController::class); 
    Route::resource('estudiantes', EstudiantesController::class);
    Route::resource('docentes', DocentesController::class);
    Route::resource('calificacion', CalificacionesController::class);
    // Mostrar el formulario de calificación
    Route::get('/notas/{materia}', [CalificacionesController::class, 'verNotas'])->name('calificacion.verNotas');
    Route::delete('/materias/{materia}', [MateriasController::class, 'darDeBaja'])->name('materias.darDeBaja');
    Route::get('/calificacion/notasestudiante/{estudianteId}', [CalificacionesController::class, 'notasEstudiante'])->name('calificacion.notasestudiante');
    Route::get('/calificacion/show/{id}', [CalificacionesController::class, 'show'])->name('calificacion.show'); 
    Route::get('/calificacion/calificar/{id}', [CalificacionesController::class, 'calificar'])->name('calificacion.calificar');
    Route::post('/calificacion/store/{id}', [CalificacionesController::class, 'store'])->name('calificacion.store');

    Route::resource('materias', MateriasController::class);
    Route::resource('aulas', AulaController::class);
    Route::resource('carreras', CarreraController::class);
    
    
});

Auth::routes();
