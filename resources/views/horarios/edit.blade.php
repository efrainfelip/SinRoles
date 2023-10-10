@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Editar Horario de {{ $materia->nombre }}</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Editar Horario</h4>
                        <form method="POST" action="{{ route('horarios.update', ['materiaId' => $materia->id, 'horarioId' => $horario->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="dia_semana">Día de la Semana</label>
                                <input type="text" name="dia_semana" class="form-control" value="{{ $horario->dia_semana }}" required>
                            </div>
                           <div class="form-group">
    <label for="hora_inicio">Hora de Inicio</label>
    <input type="text" id="hora_inicio" name="hora_inicio" class="form-control flatpickr" value="{{ $horario->hora_inicio }}" required>
</div>
<div class="form-group">
    <label for="hora_fin">Hora de Fin</label>
    <input type="text" id="hora_fin" name="hora_fin" class="form-control flatpickr" value="{{ $horario->hora_fin }}" required>
</div>

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('scripts')
<script>
    flatpickr('.flatpickr', {
        enableTime: true,
        noCalendar: true,
        dateFormat: 'H:i',
    });
</script>
@endsection

@endsection
