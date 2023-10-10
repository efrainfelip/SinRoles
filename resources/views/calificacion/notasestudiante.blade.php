@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Notas de Estudiante</h3>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4">Notas del Estudiante: {{ $estudiante->nombre }} {{ $estudiante->apellidoP }} {{ $estudiante->apellidoM }}</h4>

                @foreach ($calificacionesPorMateria as $materiaId => $calificaciones)
                    @php
                        $materia = $calificaciones->first()->materia;
                        $notaFinal = $calificaciones->avg('promedio_final');
                        $resultado = $notaFinal >= 61 ? 'Aprobado' : 'Reprobado';
                    @endphp
                    <h5>Materia: {{ $materia->nombre }}</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Gestión</th>
                                <th>Nota Final</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calificaciones as $calificacion)
                                <tr>
                                    <td>{{ $calificacion->gestion }}</td>
                                    <td>{{ number_format($calificacion->promedio_final, 2) }}</td>
                                    <td class="{{ $calificacion->promedio_final >= 61 ? 'bg-green' : 'bg-red' }}">{{ $resultado }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach

                <a href="{{ route('calificacion.exportPDF', ['estudiante' => $estudiante->id]) }}" class="btn btn-success">Exportar a PDF</a>
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
