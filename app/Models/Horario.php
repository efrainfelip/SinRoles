<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'carrera_id', 'paralelo', 'piso', 'modulo', 'turno', 'fecha_inicio', 'fecha_fin',
        'dia_semana', 'hora_inicio', 'hora_fin', 'materia_docente_id', 'aula_id',
    ];
    


    public function detalles()
    {
        return $this->hasMany(DetalleHorario::class);
    }
    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }
    public function materiaDocente()
    {
        return $this->belongsTo(MateriaDocente::class, 'materia_docente_id');
    }
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
    public function detalleHorarios()
    {
        return $this->hasMany(DetalleHorario::class);
    }
}
