@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Materias de Estudiantes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <a class="btn btn-warning" href="{{ route('MateriaEstudiante.create') }}">Agregar Materia de Estudiante</a>
                            <a href="{{ route('MateriaEstudiante.index') }}" class="btn btn-warning">Ver todas las Materias Asignadas</a>
                        </div>

                        @if ($mensaje)
                            <div class="alert alert-warning">{{ $mensaje }}</div>
                        @endif

                        <form action="{{ route('MateriaEstudiante.index') }}" method="GET">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="filtro_carnet">Buscar por Carnet:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="filtro_carnet" name="carnet" placeholder="Ingrese el Carnet">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Buscar por Carnet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('MateriaEstudiante.index') }}" method="GET">
                            <div class="form-row mt-3">
                                <div class="col-md-4">
                                    <label for="filtro_materia">Filtrar por Materia:</label>
                                    <div class="input-group">
                                        <select class="form-control select2" id="filtro_materia" name="materia_id">
                                            <option value="">Seleccione una materia</option>
                                            @foreach($materias as $materia)
                                                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Filtrar por Materia</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('MateriaEstudiante.index') }}" method="GET">
                            <div class="form-row mt-3">
                                <div class="col-md-4">
                                    <label for="filtro_gestion">Filtrar por Gestión:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="filtro_gestion" name="gestion" placeholder="Año de gestión">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Filtrar por Gestión</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead style="background-color:#6777ef">
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Estudiante</th>
                                        <th style="color:#fff;">Materia</th>
                                        <th style="color:#fff;">Gestión</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materiaEstudiantes as $materiaEstudiante)
                                        <tr>
                                            <td style="display: none;">{{ $materiaEstudiante->id }}</td>
                                            <td>{{ $materiaEstudiante->estudiante->nombre }} {{ $materiaEstudiante->estudiante->apellidoP }} {{ $materiaEstudiante->estudiante->apellidoM }}</td>

                                            <td>
                                                @if ($materiaEstudiante->materia)
                                                    {{ $materiaEstudiante->materia->nombre }}
                                                @else
                                                    Materia no asignada
                                                @endif
                                            </td>
                                            <td>
                                                {{ $materiaEstudiante->gestion }}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-info mr-2" href="{{ route('MateriaEstudiante.edit', $materiaEstudiante->id) }}">Editar</a>
                                                    <form action="{{ route('MateriaEstudiante.destroy', $materiaEstudiante->id) }}" method="POST">
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
