<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHorario extends Model
{
    protected $fillable = [
   

        'dia_semana',
           'hora_inicio',
           'hora_fin',
       ];
   
       public function horario()
       {
           return $this->belongsTo(Horario::class);
       }
    use HasFactory;
}
