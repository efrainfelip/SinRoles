@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Horarios de {{ $materia->nombre }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            

                            @if(!empty($horarios))
                                <div class="table-responsive-sm">
                                    <table class="table table-striped mt-2">
                                        <thead style="background-color:#6777ef" >
                                            <th style="color:#fff">Día</th>
                                            <th style="color:#fff">Hora de Inicio</th>
                                            <th style="color:#fff">Hora de Fin</th>
                                            <th style="color:#fff">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach($horarios as $horario)
                                            <tr>
                                                <td>{{ $horario->dia_semana }}</td>
                                                <td>{{ $horario->hora_inicio }}</td>
                                                <td>{{ $horario->hora_fin }}</td>
                                                <td>
                                                    <a href="{{ route('horarios.edit', ['materiaId' => $materia->id, 'horarioId' => $horario->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                                                    <form action="{{ route('horarios.destroy', ['materiaId' => $materia->id, 'horarioId' => $horario->id]) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>No se encontraron horarios para esta materia.</p>
                            @endif
                            <h4>Agregar Nuevo Horario</h4>
                            <form method="POST" action="{{ route('horarios.store') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="carrera_id">Carrera:</label>
                                    <select class="form-control" id="carrera_id" name="carrera_id">
                                        <option value="">Seleccionar Carrera</option>
                                        @foreach($carreras as $carrera)
                                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="paralelo">Paralelo:</label>
                                            <input type="text" class="form-control" id="paralelo" name="paralelo">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="piso">Piso:</label>
                                            <input type="text" class="form-control" id="piso" name="piso">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="fecha_inicio">Fecha Inicio:</label>
                                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="fecha_fin">Fecha Fin:</label>
                                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="modulo">Módulo:</label>
                                    <input type="text" class="form-control" id="modulo" name="modulo">
                                </div>
                                
                                <div class="form-group">
                                    <label for="turno">Turno:</label>
                                    <input type="text" class="form-control" id="turno" name="turno">
                                </div>
                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'] as $dia)
                                                <th>{{ $dia }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($hour = 8; $hour <= 18; $hour++)
                                            <tr>
                                                <th>{{ $hour }}:00 - {{ $hour + 1 }}:00</th>
                                                @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'] as $dia)
                                                    <td>
                                                        <select class="form-control" name="horario[{{ $dia }}][{{ $hour }}]">
                                                            <option value="">Seleccionar Materia</option>
                                                            @foreach($materias as $materia)
                                                                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nombre_aula">Nombre Aula:</label>
                                            <input type="text" class="form-control" id="nombre_aula" name="nombre_aula">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="numero_aula">Número Aula:</label>
                                            <input type="text" class="form-control" id="numero_aula" name="numero_aula">
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Guardar Horarios</button>
                            </form>
                            
                            @if($errors->any())
                               
                            @endif>
                            
                            <script>
                                flatpickr("#hora_inicio", {
                                    enableTime: true,
                                    noCalendar: true,
                                    dateFormat: "H:i",
                                });
                            
                                flatpickr("#hora_fin", {
                                    enableTime: true,
                                    noCalendar: true,
                                    dateFormat: "H:i",
                                });
                            </script>
                            @if($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
