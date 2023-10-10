@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Agregar/Editar Materia a Estudiante</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('MateriaEstudiante.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="estudiante_id">Estudiante:</label>
                                <select class="form-control select2" id="estudiante_id" name="estudiante_id">
                                    @foreach($estudiantes as $estudiante)
                                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellidoP }} {{ $estudiante->apellidoM }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="materia_id">Materia:</label>
                                <select class="form-control select2" id="materia_id" name="materia_id[]" multiple>
                                    @foreach($materias as $materia)
                                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                            <button type="submit" class="btn btn-primary">Agregar Materia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css">
<style>
    .select2-container--classic .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
        color: white;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'classic',
            width: '100%',
            placeholder: 'Selecciona una o varias opciones',
            allowClear: true,
        });
    });
</script>
@endpush
