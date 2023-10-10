<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aulas = Aula::paginate(5);
        return view('aulas.index',compact('aulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aulas.crear');
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
        Aula::create($request->all());
        $notificacion='El aula se agrego correctamente.';
        return redirect()->route('aulas.index')->with(compact('notificacion'));
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
    public function edit(Aula $aula)
    {
        return view('aulas.editar',compact('aula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aula $aula)
    {
        request()->validate([
       
            'nombre'=>'required',
            

        ]);
        $aula->update($request->all());
        $notificacion='El aula se actualizo correctamente';
        return redirect()->route('aulas.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aula $aula)
    {
        $aula->delete();
    
        $notificacion = 'El aula ' . $aula->nombre . ' se eliminó correctamente junto con sus calificaciones.';
        return redirect()->route('aulas.index')->with(compact('notificacion'));
    }
}
