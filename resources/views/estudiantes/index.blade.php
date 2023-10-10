@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Estudiantes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{route('estudiantes.create')}}">Agregar estudiante</a>
                            <div class="card-body">
                                @if(session('notificacion'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notificacion')}}
                                </div>
                                @endif
                                <div class="form-container">
                                    <form action="{{ route('estudiantes.search') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="query" class="form-control" placeholder="Buscar por nombre o carnet de estudiante">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container">
                                    <form action="{{ route('estudiantes.index') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Mostrar todos los estudiantes</button>
                                    </form>
                                </div>
                                
                                


                            </div>
                            <div class="table-responsive-sm">
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display :none;">ID</th>
                                    <th style="color:#fff">CI </th>
                                    <th style="color:#fff">Nombre </th>
                                    <th style="color:#fff">Apellido paterno</th>
                                    <th style="color:#fff">Apellido materno </th>
                                    <th style="color:#fff">Telefono</th>
                                    <th style="color:#fff">Direccion </th>
                                    <th style="color:#fff">Fecha de inscripción </th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                            
                                <tbody>
                                    @foreach($estudiantes as $estudiante)
                                    <tr>
                                        <td style="display: none;">{{$estudiante->id}}</td>
                                        <td>{{$estudiante->CI}}</td>
                                        <td>{{$estudiante->nombre}}</td>
                                        <td>{{$estudiante->apellidoP}}</td>
                                        <td>{{$estudiante->apellidoM}}</td>
                                     
                                        <td>{{$estudiante->tel}}</td>
                                       
                                        <td>{{$estudiante->direccion}}</td>
                                        <td>{{$estudiante->fechaIns}}</td>

                                        
                                        
                                        <td>
                                            <form action="{{route('estudiantes.destroy',$estudiante->id)}}" method="POST">
                                          
                                                <a class="btn btn-info" href="{{ route('estudiantes.edit', $estudiante->id)}}">Editar</a>
                                                 
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                   
                                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                                   
                                            </form>
    
                                        </td>
                                        

                                    </tr>
                                    @endforeach 

                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!!$estudiantes->links() !!}

                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endsection
