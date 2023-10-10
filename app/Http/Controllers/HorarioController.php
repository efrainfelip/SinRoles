<?php
namespace App\Http\Controllers;

use App\Models\Docentes;
use App\Models\Aula;
use App\Models\MateriaDocente;
use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Materias;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = DB::table('horarios')
            ->join('carreras', 'horarios.carrera_id', '=', 'carreras.id')
            ->join('materia_docentes', 'horarios.materia_docente_id', '=', 'materia_docentes.id')
            ->join('docentes', 'materia_docentes.docente_id', '=', 'docentes.id')
            ->join('aulas', 'horarios.aula_id', '=', 'aulas.id') 
            ->join('materias', 'materia_docentes.materia_id', '=', 'materias.id')
            ->select(
                'carreras.nombre as carrera',
                'horarios.modulo',
                'horarios.turno',
                'horarios.hora_inicio',
                'horarios.hora_fin',
                'horarios.dia_semana',
                'aulas.nombre as nombre_aula', // Cambiado a nombre del aula
                'docentes.nombre as nombre_docente',
                'materias.nombre as nombre_materia',
                'horarios.paralelo', // Agregado: Paralelo
                'horarios.fecha_inicio', // Agregado: Fecha de inicio
                'horarios.fecha_fin',
                'horarios.piso' // Agregado: Fecha de inicio
            )
            ->orderBy('carrera')
            ->orderBy('turno')
            ->orderBy('modulo')
            ->orderBy('dia_semana')
            ->get();
    
        $carreras = Carrera::all();
    
        return view('horarios.index', compact('carreras', 'horarios'));
    }
    
    public function create()
    {
        $aulas = Aula::all();
        $docentes = Docentes::all();
        $materias = Materias::all();
        $carreras = Carrera::all();
        $materiaDocentes = MateriaDocente::all();
        $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

        return view('horarios.create', compact('aulas', 'diasSemana', 'docentes', 'carreras', 'materias', 'materiaDocentes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'carrera_id' => 'required',
            'paralelo' => 'required',
            'piso' => 'required',
            'modulo' => 'required',
            'turno' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'detalles.*.dia_semana' => 'required', // Ajusta la validación
            'detalles.*.hora_inicio' => 'required',
            'detalles.*.hora_fin' => 'required',
            'detalles.*.materia_docente_id' => 'required',
            'detalles.*.aula_id' => 'required',
        ]);
    
        foreach ($data['detalles'] as $detalle) {
            Horario::create([
                'carrera_id' => $data['carrera_id'],
                'paralelo' => $data['paralelo'],
                'piso' => $data['piso'],
                'modulo' => $data['modulo'],
                'turno' => $data['turno'],
                'fecha_inicio' => $data['fecha_inicio'],
                'fecha_fin' => $data['fecha_fin'],
                'dia_semana' => $detalle['dia_semana'], // Accede al valor dentro de 'detalles'
                'hora_inicio' => $detalle['hora_inicio'],
                'hora_fin' => $detalle['hora_fin'],
                'materia_docente_id' => $detalle['materia_docente_id'],
                'aula_id' => $detalle['aula_id'],
            ]);
        }
    
        return redirect()->route('horarios.create')->with('success', 'Horario(s) creado(s) exitosamente.');
    }
    
}
