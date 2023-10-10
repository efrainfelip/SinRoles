<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materias::paginate(5);
        return view('materias.index',compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            
            'nombre'=>'required',
           
        ]);
        Materias::create($request->all());
        $notificacion='La materia se agrego correctamente.';
        return redirect()->route('materias.index')->with(compact('notificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materias $materia)
    {
        return view('materias.editar',compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchQuery = $request->input('query');
        
        $materias = Materias::where('nombre', 'LIKE', "%{$searchQuery}%") ->
        paginate(5);
        
        return view('materias.index', compact('materias'));
    }
    public function update(Request $request, Materias $materia)
    {
        request()->validate([
       
            'nombre'=>'required',
            

        ]);
        $materia->update($request->all());
        $notificacion='La materia se actualizo correctamente';
        return redirect()->route('materias.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materias $materia)
    {
        // Obtén las calificaciones asociadas a la materia
        $calificaciones = $materia->calificaciones;
    
        if ($calificaciones) {
            // Elimina las calificaciones asociadas a la materia
            foreach ($calificaciones as $calificacion) {
                $calificacion->delete();
            }
        }
    
        // Ahora puedes eliminar la materia
        $materia->delete();
    
        $notificacion = 'La materia ' . $materia->nombre . ' se eliminó correctamente junto con sus calificaciones.';
        return redirect()->route('materias.index')->with(compact('notificacion'));
    }
    public function darDeBaja(Materias $materia)
{
    // Cambiar el estado de activo a inactivo
    $materia->update(['activo' => false]);

    $notificacion = 'La materia ' . $materia->nombre . ' ha sido dada de baja correctamente.';
    return redirect()->route('materias.index')->with(compact('notificacion'));
}

}
