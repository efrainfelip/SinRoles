<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrera_id');
            $table->string('paralelo');
            $table->string('piso');
            $table->string('modulo');
            $table->string('turno');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('dia_semana');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unsignedBigInteger('materia_docente_id');
            $table->unsignedBigInteger('aula_id');
            $table->timestamps();
    
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('materia_docente_id')->references('id')->on('materia_docentes');
            $table->foreign('aula_id')->references('id')->on('aulas');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
