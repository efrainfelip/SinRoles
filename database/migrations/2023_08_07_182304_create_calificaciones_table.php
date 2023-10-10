<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
{
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('materia_id');
            $table->integer('gestion');
            $table->integer('saber1');
            $table->integer('saber2');
            $table->integer('saber3');
            $table->integer('hacer1');
            $table->integer('hacer2');
            $table->integer('hacer3');
            $table->integer('decidir1');
            $table->integer('decidir2');
            $table->integer('decidir3');
            $table->integer('ser1');
            $table->integer('ser2');
            $table->integer('ser3');
            $table->decimal('promedio_saber', 5, 2);
            $table->decimal('promedio_hacer', 5, 2);
            $table->decimal('promedio_decidir', 5, 2);
            $table->decimal('promedio_ser', 5, 2);
            $table->decimal('promedio_final', 5, 2);
            $table->timestamps();
        
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->foreign('materia_id')->references('id')->on('materias');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
