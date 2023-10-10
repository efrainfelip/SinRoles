@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Notas de Materia</h3>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4">Notas de la Materia: {{ $materia->nombre }}</h4>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Estudiante</th>
                                <th>Saber 1</th>
                                <th>Saber 2</th>
                                <th>Saber 3</th>
                                <th>Promedio Saber</th>
                                <th>Hacer 1</th>
                                <th>Hacer 2</th>
                                <th>Hacer 3</th>
                                <th>Promedio Hacer</th>
                                <th>Decidir 1</th>
                                <th>Decidir 2</th>
                                <th>Decidir 3</th>
                                <th>Promedio Decidir</th>
                                <th>Ser 1</th>
                                <th>Ser 2</th>
                                <th>Ser 3</th>
                                <th>Promedio Ser</th>
                                <th>Nota Final</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calificaciones as $calificacion)
                                @php
                                    $notaFinal = $calificacion->notaFinal();
                                    $resultado = $notaFinal >= 51 ? 'Aprobado' : 'Reprobado';
                                @endphp
                                <tr>
                                    <td>{{ $calificacion->estudiante->nombre }}</td>
                                    <td>{{ $calificacion->saber1 }}</td>
                                    <td>{{ $calificacion->saber2 }}</td>
                                    <td>{{ $calificacion->saber3 }}</td>
                                    <td>{{ number_format($calificacion->promedioSaber(), 2) }}</td>
                                    <td>{{ $calificacion->hacer1 }}</td>
                                    <td>{{ $calificacion->hacer2 }}</td>
                                    <td>{{ $calificacion->hacer3 }}</td>
                                    <td>{{ number_format($calificacion->promedioHacer(), 2) }}</td>
                                    <td>{{ $calificacion->decidir1 }}</td>
                                    <td>{{ $calificacion->decidir2 }}</td>
                                    <td>{{ $calificacion->decidir3 }}</td>
                                    <td>{{ number_format($calificacion->promedioDecidir(), 2) }}</td>
                                    <td>{{ $calificacion->ser1 }}</td>
                                    <td>{{ $calificacion->ser2 }}</td>
                                    <td>{{ $calificacion->ser3 }}</td>
                                    <td>{{ number_format($calificacion->promedioSer(), 2) }}</td>
                                    <td>{{ number_format($notaFinal, 2) }}</td>
                                    <td class="{{ $notaFinal >= 51 ? 'bg-green' : 'bg-red' }}">{{ $resultado }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .bg-green {
        background-color: #00ff00;
    }
    .bg-red {
        background-color: #ff0000;
    }
</style>
@endsection
