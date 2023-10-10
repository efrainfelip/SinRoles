<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $fillable =['CI','nombre','apellidoP','apellidoM','tel','direccion'];
    public function materias()
    {
        return $this->belongsToMany(Materias::class, 'materia_estudiantes', 'estudiante_id', 'materia_id')
                    ->withTimestamps();
                    
    }
 

public function calificaciones()
{
    return $this->hasMany(Calificacion::class);

    
}
}

