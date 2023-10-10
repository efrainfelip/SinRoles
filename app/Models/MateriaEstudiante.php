<?php
 namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class MateriaEstudiante extends Model
    {
        use HasFactory;

        protected $fillable = ['estudiante_id', 'materia_id', 'gestion'];




        public function estudiante()
        {
            return $this->belongsTo(Estudiantes::class, 'estudiante_id');
        }

        public function materia()
        {
            return $this->belongsTo(Materias::class, 'materia_id');
        }

        public function calificacion()
        {
            return $this->hasOne(Calificacion::class);
        }
        
        

    }
