<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use App\Models\Materias;
use App\Models\MateriaDocente;
use Illuminate\Http\Request;

class MateriaDocenteController extends Controller
{
    public function index()
{
    $materiaDocentes = MateriaDocente::all(); // Obtén los registros de la tabla MateriaDocente

    return view('MateriaDocente.index', compact('materiaDocentes'));
}

        
    
        
    
        public function create()
        {
            $docentes = Docentes::all();
            $materias = Materias::all();
      
            return view('MateriaDocente.crear', compact('docentes', 'materias'));
        }
        
        public function store(Request $request)
        {
            $request->validate([
                'docente_id' => 'required',
                'materia_id' => 'required|array',
            ]);
        
            $docente = Docentes::findOrFail($request->docente_id);
            $materiaIds = $request->input('materia_id', []);
            $gestion = date('Y');
        
            foreach ($materiaIds as $materiaId) {
            
                $docente->materias()->attach($materiaId);
            }
        
            $notificacion = 'Las materias se asignaron correctamente al docente.';
            return redirect()->route('MateriaDocente.index')->with(compact('notificacion'));
        }
        
        
        
        public function edit(MateriaDocente $MateriaDocente)
        {
            $docentes = Docentes::all();
            $materiasAsignadas = $MateriaDocente->materia()->get(); // Cambia a materia() y obtén las materias asignadas
            $materias = Materias::all(); 
        
            return view('MateriaDocente.editar', compact('MateriaDocente', 'docentes', 'materias', 'materiasAsignadas'));
        }
        
        
        
    public function update(Request $request, MateriaDocente $MateriaDocente)
    {
        $request->validate([
            'docente_id' => 'required',
            'materia_id' => 'required|array',
          
        ]);
    
        // Actualiza los campos necesarios, incluyendo gestion
        $MateriaDocente->update([
            'docente_id' => $request->docente_id,
            'materia_id' => $request->materia_id,
            
        ]);
    
        return redirect()->route('MateriaDocente.index')
            ->with('success', 'Materia del docente actualizada exitosamente.');
    }
    
        public function destroy(MateriaDocente $materiaDocente)
        {
            $materiaDocente->delete();
    
            return redirect()->route('MateriaDocente.index')
                ->with('success', 'Materia del docente eliminada exitosamente.');
        }
}
