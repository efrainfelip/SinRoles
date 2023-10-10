@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Horario</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('horarios.store') }}" method="post">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Campos de Carrera, Paralelo, Piso, Módulo, Fecha de Inicio, Fecha de Fin -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="carrera_id" class="form-label">Carrera:</label>
                <select name="carrera_id" class="form-control select2" required>
                    <option value="">Seleccione una carrera</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="paralelo" class="form-label">Paralelo:</label>
                <input type="text" name="paralelo" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="piso" class="form-label">Piso:</label>
                <input type="text" name="piso" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="modulo" class="form-label">Módulo:</label>
                <input type="text" name="modulo" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                <input type="date" name="fecha_fin" class="form-control" required>
            </div>
        </div>

        <!-- Botones para elegir el turno -->
        <div class="row mb-3">
            @foreach(['Mañana', 'Tarde', 'Noche'] as $turno)
                <div class="col-md-4">
                    <button type="button" class="btn btn-turno" data-turno="{{ $turno }}">{{ $turno }}</button>
                </div>
            @endforeach
            <input type="hidden" name="turno" id="selected-turno" value="Mañana"> <!-- Campo oculto para almacenar el turno seleccionado -->
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Día de la Semana</th>
                    <th>Materia con Docente</th>
                    <th>Aula</th>
                </tr>
            </thead>
            <tbody id="detalles-container">
                @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'] as $dia)
                <tr>
                    <td><input type="time" name="detalles[{{ $dia }}][hora_inicio]" class="form-control hora-inicio" id="{{ $dia }}-hora-inicio"></td>
                    <td><input type="time" name="detalles[{{ $dia }}][hora_fin]" class="form-control hora-fin" id="{{ $dia }}-hora-fin"></td>
                    <td>
                        <select name="detalles[{{ $dia }}][dia_semana]" class="form-control select2" required>
                            <option value="{{ $dia }}" selected>{{ $dia }}</option> <!-- Seleccionar el día de la semana automáticamente -->
                        </select>
                    </td>
                    <td>
                        <select name="detalles[{{ $dia }}][materia_docente_id]" class="form-control select2" required>
                            <option value="">Seleccione una materia con su docente</option>
                            @foreach ($materiaDocentes as $materiaDocente)
                                <option value="{{ $materiaDocente->id }}">{{ $materiaDocente->materia->nombre }} - {{ $materiaDocente->docente->nombre }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="detalles[{{ $dia }}][aula_id]" class="form-control select2" required>
                            <option value="">Seleccione un aula</option>
                            @foreach ($aulas as $aula)
                                <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Guardar Horario</button>
    </form>
</div>

<style>
    /* Estilo para los botones de turno */
    .btn-turno {
        background-color: lightblue; /* Color de fondo predeterminado */
        color: black; /* Color de texto predeterminado */
    }

    /* Cambia el color de fondo y el color de texto cuando el botón está activo */
    .btn-turno.active {
        background-color: lightcoral; /* Color de fondo cuando está seleccionado */
        color: white; /* Color de texto cuando está seleccionado */
    }
</style>



<script>
    // Agregar un controlador de eventos a los botones de turno
    document.querySelectorAll('.btn-turno').forEach(function(button) {
        button.addEventListener('click', function() {
            // Quitar la clase "active" de todos los botones
            document.querySelectorAll('.btn-turno').forEach(function(btn) {
                btn.classList.remove('active');
            });
            // Agregar la clase "active" al botón seleccionado
            this.classList.add('active');

            var turnoSeleccionado = this.getAttribute('data-turno');
            document.getElementById('selected-turno').value = turnoSeleccionado; // Actualizar el valor del campo oculto

            // Configurar las horas de inicio y fin según el turno seleccionado
            var horaInicio, horaFin;
            if (turnoSeleccionado === 'Mañana') {
                horaInicio = '08:30';
                horaFin = '12:00';
            } else if (turnoSeleccionado === 'Tarde') {
                horaInicio = '15:00'; // Cambiar la hora de inicio para el turno Tarde
                horaFin = '18:00';    // Cambiar la hora de fin para el turno Tarde
            } else if (turnoSeleccionado === 'Noche') {
                horaInicio = '19:00';
                horaFin = '21:30';
            }

            // Establecer las horas de inicio y fin en todos los campos de la tabla
            document.querySelectorAll('.hora-inicio').forEach(function(input) {
                input.value = horaInicio;
            });

            document.querySelectorAll('.hora-fin').forEach(function(input) {
                input.value = horaFin;
            });
        });
    });
</script>




@endsection
