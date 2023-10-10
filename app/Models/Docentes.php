<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $fillable =['CI','nombre','apellidoP','apellidoM','tel','direccion'];
    use HasFactory;
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
    public function materias()
    {
        return $this->belongsToMany(Materias::class, 'materia_docentes', 'docente_id', 'materia_id')
                    ->withTimestamps();
                    
    }
}
