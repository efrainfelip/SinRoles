@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar estudiante</h3>
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
        
     
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          @if($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            @foreach($errors->all() as $error)
                            <span class="badge badge-danger">{{$error}}</span>

                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>

                            </button>

                        </div>
                          @endif
                          <form action="{{route('estudiantes.store')}}" method="POST">
                            @csrf
                            
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="nombre" >Nombre</label>
                                        <input type="text" name="nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="apellidoP" >Apellido paterno</label>
                                        <input type="text" name="apellidoP" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="apellidoM" >Apellido materno</label>
                                        <input type="text" name="apellidoM" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group" >
                                            <label for="CI" >CI</label>
                                            <input type="number" name="CI" class="form-control">
                                        </div>
                                    </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="tel" >Telefono </label>
                                        <input type="number" name="tel" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="direccion" >Direccion</label>
                                        <input type="text" name="direccion" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="fechaIns" >Fecha de Inscripción</label>
                                        <input type="date" name="fechaIns" class="form-control">
                                    </div>
                                </div>
                              
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>



                          </form>

                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection