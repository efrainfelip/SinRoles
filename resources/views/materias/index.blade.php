@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Materias</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <a class="btn btn-warning" href="{{route('materias.create')}}">Agregar materia</a>
                            
                            <div class="card-body">
                                @if(session('notificacion'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notificacion')}}
                                </div>
                                @endif
                                <div class="form-container">
                                    <form action="{{ route('materias.search') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="query" class="form-control" placeholder="Buscar por nombre  de materia">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container">
                                    <form action="{{ route('materias.index') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Mostrar todas las materias</button>
                                    </form>
                                </div>
                                

                            </div>
                            <div class="table-responsive-sm">
                                
                            <table class="table table-striped mt-2">
                                
                                <thead style="background-color:#6777ef">
                                    <th style="display :none;">ID</th>
                                    <th style="color:#fff">Nombre </th>
                                    <th style="color:#fff">Horarios </th>
                                    
                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                            
                                <tbody>
                                    @foreach($materias as $materia)
                                    <tr>
                                        <td style="display: none;">{{$materia->id}}</td>
                                        <td>{{$materia->nombre}}</td>
                                        
                                        <td>
                                            <a class="btn btn-secondary" style="background-color:#6777ef" href="{{ route('horarios.show', $materia->id) }}">Ver Horarios</a>
                                        </td>
                                        
                                        
                                        <td> 
                                            <form action="{{route('materias.destroy',$materia->id)}}" method="POST">
                                                <a class="btn btn-info" href="{{ route('materias.edit', $materia->id)}}">Editar</a>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                   
                                                   |
                                                   
                                            </form>
    
                                        </td>
                                        

                                    </tr>
                                    @endforeach 

                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $materias->links() !!}

                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
