<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docentes::paginate(5);
        return view('docentes.index',compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.crear');
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
            
        ]);
        Docentes::create($request->all());
        $notificacion='El docente se agrego correctamente.';
        return redirect()->route('docentes.index')->with(compact('notificacion'));
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
    public function edit(Docentes $docente)
    {
        return view('docentes.editar',compact('docente'));
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
        
        $docentes = Docentes::where('CI', 'LIKE', "%{$searchQuery}%")
        ->orWhere('nombre', 'LIKE', "%{$searchQuery}%")->
        paginate(5);
        
        return view('docentes.index', compact('docentes'));
    }
    public function update(Request $request, Docentes $docente)
    {
        request()->validate([
            'CI'=>'required',
            'nombre'=>'required',
            'apellidoP'=>'required',
            'apellidoM'=>'required',
            'tel'=>'required',
            'direccion'=>'required',

        ]);
        $docente->update($request->all());
        $notificacion='El docente se actualizo correctamente';
        return redirect()->route('docentes.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docentes $docente)
    {
        $deleteName=$docente->nombre;
        $docente->delete();
        $notificacion='El docente  '. $deleteName.' se elimino correctamente';
        return redirect()->route('docentes.index')->with(compact('notificacion'));
    }
}
