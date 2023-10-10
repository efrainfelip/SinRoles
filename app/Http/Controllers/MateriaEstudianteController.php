<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriaEstudiante;
use App\Models\Estudiantes;
use App\Models\Materias;

class MateriaEstudianteController extends Controller
{
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

    return view('MateriaEstudiante.index', compact('materiaEstudiantes', 'materias', 'mensaje'));
}

    

    

    public function create()
    {
        $estudiantes = Estudiantes::all();
        $materias = Materias::all();
  
        return view('MateriaEstudiante.crear', compact('estudiantes', 'materias'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required',
            'materia_id' => 'required|array',
        ]);
    
        $estudiante = Estudiantes::findOrFail($request->estudiante_id);
        $materiaIds = $request->input('materia_id', []);
        $gestion = date('Y');
    
        foreach ($materiaIds as $materiaId) {
        
            $estudiante->materias()->attach($materiaId, ['gestion' => $gestion]);
        }
    
        $notificacion = 'Las materias se asignaron correctamente al estudiante.';
        return redirect()->route('MateriaEstudiante.index')->with(compact('notificacion'));
    }
    
    
    
    public function edit(MateriaEstudiante $MateriaEstudiante)
    {
        $estudiantes = Estudiantes::all();
        $materiasAsignadas = $MateriaEstudiante->materia()->get(); // Cambia a materia() y obtén las materias asignadas
        $materias = Materias::all(); 
    
        return view('MateriaEstudiante.editar', compact('MateriaEstudiante', 'estudiantes', 'materias', 'materiasAsignadas'));
    }
    
    
    
public function update(Request $request, MateriaEstudiante $MateriaEstudiante)
{
    $request->validate([
        'estudiante_id' => 'required',
        'materia_id' => 'required|array',
      
    ]);

    // Actualiza los campos necesarios, incluyendo gestion
    $MateriaEstudiante->update([
        'estudiante_id' => $request->estudiante_id,
        'materia_id' => $request->materia_id,
        
    ]);

    return redirect()->route('MateriaEstudiante.index')
        ->with('success', 'Materia de estudiante actualizada exitosamente.');
}

    public function destroy(MateriaEstudiante $materiaEstudiante)
    {
        $materiaEstudiante->delete();

        return redirect()->route('MateriaEstudiante.index')
            ->with('success', 'Materia de estudiante eliminada exitosamente.');
    }
}
