<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $fillable = ['nombre'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
    public function estudiantes()
{
    return $this->belongsToMany(Estudiantes::class, 'materia_estudiantes', 'materia_id', 'estudiante_id')
                ->withTimestamps(); 
}

}
