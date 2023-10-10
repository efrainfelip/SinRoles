@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Carreras</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            <a class="btn btn-warning" href="{{route('carreras.create')}}">Agregar carrera</a>
                            
                            <div class="card-body">
                                @if(session('notificacion'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notificacion')}}
                                </div>
                                @endif
                             
                                

                            </div>
                            <div class="table-responsive-sm">
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display :none;">ID</th>
                                    <th style="color:#fff">Nombre </th>
                              
                                    
                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                            
                                <tbody>
                                    @foreach($carreras as $carrera)
                                    <tr>
                                        <td style="display: none;">{{$carrera->id}}</td>
                                        <td>{{$carrera->nombre}}</td>
                                        
                                      
                                        
                                        <td> 
                                            <form action="{{route('carreras.destroy',$carrera->id)}}" method="POST">
                                                <a class="btn btn-info" href="{{ route('carreras.edit', $carrera->id)}}">Editar</a>
                                                    
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
                                {!! $carreras->links() !!}

                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
