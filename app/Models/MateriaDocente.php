<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaDocente extends Model
{
    use HasFactory;
    
    protected $fillable = ['docente_id', 'materia_id'];

    public function docente()

    {
        return $this->belongsTo(Docentes::class, 'docente_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'materia_id');
    }
    public function horarios()
    {
        return $this->hasMany(Horario::class); // Relación con los horarios
    }

}
