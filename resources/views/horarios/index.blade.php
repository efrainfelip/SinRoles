@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Horarios</h1>

    @foreach ($carreras as $carrera)
        <h2>{{ $carrera->nombre }}</h2>

        @php
        $turnos = $horarios->where('carrera', $carrera->nombre)->pluck('turno')->unique();
        $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
        $paralelos = $horarios->where('carrera', $carrera->nombre)->pluck('paralelo')->unique();
        @endphp

        @foreach ($paralelos as $paralelo)
            <h3>Paralelo: {{ $paralelo }}</h3>

            @foreach ($turnos as $turno)
                <h4>Turno: {{ $turno }}</h4>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Módulo</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Piso</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $uniqueHorarios = $horarios->where('carrera', $carrera->nombre)->where('paralelo', $paralelo)->where('turno', $turno)->unique(function ($item) {
                                return $item->modulo . $item->fecha_inicio . $item->fecha_fin . $item->piso;
                            });
                            @endphp
                            @foreach ($uniqueHorarios as $horario)
                                <tr>
                                    <td>{{ $horario->modulo }}</td>
                                    <td>{{ $horario->fecha_inicio }}</td>
                                    <td>{{ $horario->fecha_fin }}</td>
                                    <td>{{ $horario->piso }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Hora</th>
                                @foreach ($diasSemana as $dia)
                                    <th>{{ $dia }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 3; $i++)
                                <tr>
                                    <td>
                                        @if ($i === 0)
                                            8:30 - 9:30
                                        @elseif ($i === 1)
                                            9:45 - 10:45
                                        @elseif ($i === 2)
                                            11:00 - 12:00
                                        @endif
                                    </td>
                                    @foreach ($diasSemana as $dia)
                                        <td>
                                            @foreach ($horarios->where('carrera', $carrera->nombre)->where('paralelo', $paralelo)->where('turno', $turno)->where('dia_semana', $dia)->where('hora_inicio', '08:30:00') as $horario)
                                                {{ $horario->nombre_materia . ' - ' . $horario->nombre_docente }}<br>
                                                {{ $horario->nombre_aula }}<br>
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endforeach
    @endforeach
</div>
@endsection
