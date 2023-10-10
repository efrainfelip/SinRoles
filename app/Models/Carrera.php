<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = ['nombre'];
    use HasFactory;
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
