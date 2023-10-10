<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $table = 'calificaciones';
    protected $fillable = ['saber1', 'saber2', 'saber3', 'hacer1', 'hacer2', 'hacer3', 'decidir1', 'decidir2', 'decidir3', 'ser1', 'ser2', 'ser3'];
    
    public function estudiante()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiante_id');
    }
    
    public function materia()
    {
        return $this->belongsTo(Materias::class, 'materia_id');
    }


    

    public function promedioSaber()
    {
        return ($this->saber1 + $this->saber2 + $this->saber3) / 3;
    }

    public function promedioHacer()
    {
        return ($this->hacer1 + $this->hacer2 + $this->hacer3) / 3;
    }

    public function promedioDecidir()
    {
        return ($this->decidir1 + $this->decidir2 + $this->decidir3) / 3;
    }

    public function promedioSer()
    {
        return ($this->ser1 + $this->ser2 + $this->ser3) / 3;
    }

    public function notaFinal()
    {
        return ($this->promedioSaber() + $this->promedioHacer() + $this->promedioDecidir() + $this->promedioSer()) / 4;
    }
}
