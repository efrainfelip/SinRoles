<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla docentes
            'ver-docentes',
            'crear-docentes',
            'editar-docentes',
            'borrar-docentes',
            //tabla materias
            'ver-materias',
            'crear-materias',
            'editar-materias',
            'borrar-materias',
            //tabla estudiantes
            'ver-estudiantes',
            'crear-estudiantes',
            'editar-estudiantes',
            'borrar-estudiantes',
            //tabla horarios
            'ver-horarios',
            'crear-horarios',
            'editar-horarios',
            'borrar-horarios',
            //tabla calificaciones
            'ver-calificaciones',
            'crear-calificaciones',
            'editar-calificaciones',
            'borrar-calificaciones',
            
           ];
           foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
          
           }
    }
}
