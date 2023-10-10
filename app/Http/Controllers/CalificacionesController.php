<?php

namespace App\Http\Controllers;
use App\Models\MateriaEstudiante;
use App\Models\Calificacion;
use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Estudiantes;

use PDF;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MateriaEstudiante::with('estudiante', 'materia');
    
        if ($request->has('carnet')) {
            $query->whereHas('estudiante', function ($q) use ($request) {
                $q->where('CI', $request->carnet);
            });
        }
    
        if ($request->has('materia_id')) {
            $query->where('materia_id', $request->materia_id);
        }
    
        if ($request->has('gestion')) {
            $query->where('gestion', $request->gestion);
        }
    
        $materiaEstudiantes = $query->get();
        $materias = Materias::all();
    
    
        $mensaje = ($materiaEstudiantes->isEmpty()) ? 'No se encontraron estudiantes' : null;
        
        return view('calificacion.index', compact('materiaEstudiantes', 'materias', 'mensaje'));
    }
    public function calificar($id)
    {
        // Obtener la materia estudiante por ID
        $materiaEstudiante = MateriaEstudiante::with('estudiante', 'materia')->findOrFail($id);
    
        // Mostrar el formulario de calificación y pasar el objeto $materiaEstudiante a la vista
        return view('calificacion.calificar', compact('materiaEstudiante'));
    }
    
 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
   
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $materiaEstudiante = MateriaEstudiante::with('estudiante', 'materia')->findOrFail($id);

    // Verificar si ya existe una calificación para este estudiante en esta materia
    $existingCalificacion = Calificacion::where('estudiante_id', $materiaEstudiante->estudiante->id)
                                        ->where('materia_id', $materiaEstudiante->materia->id)
                                        ->where('gestion', $materiaEstudiante->gestion)
                                        ->first();

    if ($existingCalificacion) {
        // Ya existe una calificación, mostrar un mensaje de error o tomar alguna otra acción
        // Por ejemplo:
        return redirect()->back()->with('error', 'Ya se ha registrado una calificación para este estudiante en esta materia y gestión.');
    }
        // Validar y procesar los datos del formulario
        $request->validate([
            'saber1' => 'required|numeric|min:0|max:100',
            'saber2' => 'required|numeric|min:0|max:100',
            'saber3' => 'required|numeric|min:0|max:100',
            'hacer1' => 'required|numeric|min:0|max:100',
            'hacer2' => 'required|numeric|min:0|max:100',
            'hacer3' => 'required|numeric|min:0|max:100',
            'decidir1' => 'required|numeric|min:0|max:100',
            'decidir2' => 'required|numeric|min:0|max:100',
            'decidir3' => 'required|numeric|min:0|max:100',
            'ser1' => 'required|numeric|min:0|max:100',
            'ser2' => 'required|numeric|min:0|max:100',
            'ser3' => 'required|numeric|min:0|max:100',
        ]);
    
        // Calcular promedios
        $promedioSaber = ($request->saber1 + $request->saber2 + $request->saber3) / 3;
        $promedioHacer = ($request->hacer1 + $request->hacer2 + $request->hacer3) / 3;
        $promedioDecidir = ($request->decidir1 + $request->decidir2 + $request->decidir3) / 3;
        $promedioSer = ($request->ser1 + $request->ser2 + $request->ser3) / 3;
        $promedioFinal = ($promedioSaber + $promedioHacer + $promedioDecidir + $promedioSer) / 4;
    
        // Crear una nueva instancia de Calificacion
        $calificacion = new Calificacion();
        $calificacion->estudiante_id = $materiaEstudiante->estudiante->id;
        $calificacion->materia_id = $materiaEstudiante->materia->id;
        $calificacion->gestion = $materiaEstudiante->gestion;
        $calificacion->saber1 = $request->saber1;
        $calificacion->saber2 = $request->saber2;
        $calificacion->saber3 = $request->saber3;
        $calificacion->hacer1 = $request->hacer1;
        $calificacion->hacer2 = $request->hacer2;
        $calificacion->hacer3 = $request->hacer3;
        $calificacion->decidir1 = $request->decidir1;
        $calificacion->decidir2 = $request->decidir2;
        $calificacion->decidir3 = $request->decidir3;
        $calificacion->ser1 = $request->ser1;
        $calificacion->ser2 = $request->ser2;
        $calificacion->ser3 = $request->ser3;
        $calificacion->promedio_saber = $promedioSaber;
        $calificacion->promedio_hacer = $promedioHacer;
        $calificacion->promedio_decidir = $promedioDecidir;
        $calificacion->promedio_ser = $promedioSer;
        $calificacion->promedio_final = $promedioFinal;
        $calificacion->save();
    
        // Redirigir a la vista de detalles de la calificación recién creada
        return redirect()->route('calificacion.show', $calificacion->id);
    }


    public function verNotas(Materias $materia)
    {
        // Obtén las calificaciones para la materia específica
        $calificaciones = Calificacion::where('materia_id', $materia->id)->with('estudiante')->get();
        
        return view('calificacion.notas', compact('materia', 'calificaciones'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener la calificación por ID
        $calificacion = Calificacion::with('estudiante', 'materia')->findOrFail($id);
    
        return view('calificacion.show', compact('calificacion'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function notasEstudiante($estudianteId)
{
    $estudiante = Estudiantes::findOrFail($estudianteId);
    $calificaciones = Calificacion::where('estudiante_id', $estudianteId)->get();

    // Agrupar calificaciones por materia
    $calificacionesPorMateria = $calificaciones->groupBy('materia_id');

    return view('calificacion.notasestudiante', compact('estudiante', 'calificacionesPorMateria'));
}

public function exportPDF($estudianteId)
{
    $estudiante = Estudiantes::findOrFail($estudianteId);
    $calificaciones = Calificacion::where('estudiante_id', $estudianteId)->get();

    $pdf = PDF::loadView('pdf_template', compact('estudiante', 'calificaciones'));
    return $pdf->download('calificaciones.pdf');
}


}
