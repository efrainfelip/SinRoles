@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Docentes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{route('docentes.create')}}">Agregar docente</a>
                            <div class="card-body">
                                @if(session('notificacion'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notificacion')}}
                                </div>
                                @endif
                                <div class="form-container">
                                    <form action="{{ route('docentes.search') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="query" class="form-control" placeholder="Buscar por nombre o carnet de docente">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container">
                                    <form action="{{ route('docentes.index') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Mostrar todos los docentes</button>
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
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                            
                                <tbody>
                                    @foreach($docentes as $docente)
                                    <tr>
                                        <td style="display: none;">{{$docente->id}}</td>
                                        <td>{{$docente->CI}}</td>
                                        <td>{{$docente->nombre}}</td>
                                        <td>{{$docente->apellidoP}}</td>
                                        <td>{{$docente->apellidoM}}</td>
                                     
                                        <td>{{$docente->tel}}</td>
                                       
                                        <td>{{$docente->direccion}}</td>

                                        
                                        
                                        <td>
                                            <form action="{{route('docentes.destroy',$docente->id)}}" method="POST">
                                          
                                                <a class="btn btn-info" href="{{ route('docentes.edit', $docente->id)}}">Editar</a>
                                                 
                                                    
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
                                {!!$docentes->links() !!}

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
