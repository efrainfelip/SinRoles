<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use App\Models\Estudiantes;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiantes::paginate(5);
        return view('estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.crear');
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
            'CI'=>'required',
            'nombre'=>'required',
            'apellidoP'=>'required',
            'apellidoM'=>'required',
            'tel'=>'required',
            'direccion'=>'required',
            'fechaIns'=>'required',
            
        ]);
        Estudiantes::create($request->all());
        $notificacion='El estudiante se agrego correctamente.';
        return redirect()->route('estudiantes.index')->with(compact('notificacion'));
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
    public function edit(Estudiantes $estudiante)
    {
        return view('estudiantes.editar',compact('estudiante'));
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
        
        $estudiantes = Estudiantes::where('CI', 'LIKE', "%{$searchQuery}%")
        ->orWhere('nombre', 'LIKE', "%{$searchQuery}%")->
        paginate(5);
        
        return view('estudiantes.index', compact('estudiantes'));
    }
    public function update(Request $request, Estudiantes $estudiante)
    {
        request()->validate([
            'CI'=>'required',
            'nombre'=>'required',
            'apellidoP'=>'required',
            'apellidoM'=>'required',
            'tel'=>'required',
            'direccion'=>'required',
            'fechaIns'=>'required',

        ]);
        $estudiante->update($request->all());
        $notificacion='El estudiante se actualizo correctamente';
        return redirect()->route('estudiantes.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiantes $estudiante)
    {
        $deleteName=$estudiante->nombre;
        $estudiante->delete();
        $notificacion='El estudiante  '. $deleteName.' se elimino correctamente';
        return redirect()->route('estudiantes.index')->with(compact('notificacion'));
    }
}
