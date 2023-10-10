@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Materias de docentes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <a class="btn btn-warning" href="{{ route('MateriaDocente.create') }}">Agregar Materia al Docente</a>
                        </div>

                      
                        <div class="mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead style="background-color:#6777ef">
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Docente</th>
                                        <th style="color:#fff;">Materia</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materiaDocentes as $materiaDocente)
                                        <tr>
                                            <td style="display: none;">{{ $materiaDocente->id }}</td>
                                            <td>{{ $materiaDocente->docente->nombre }} {{ $materiaDocente->docente->apellidoP }} {{ $materiaDocente->docente->apellidoM }}</td>

                                            <td>
                                                @if ($materiaDocente->materia)
                                                    {{ $materiaDocente->materia->nombre }}
                                                @else
                                                    Materia no asignada
                                                @endif
                                            </td>
                                          
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-info mr-2" href="{{ route('MateriaDocente.edit', $materiaDocente->id) }}">Editar</a>
                                                    <form action="{{ route('MateriaDocente.destroy', $materiaDocente->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
