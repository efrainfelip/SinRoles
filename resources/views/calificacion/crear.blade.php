@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Ingresar Calificaciones</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Calificacion.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="materia_id">Materia:</label>
                                <select class="form-control select2" id="materia_id" name="materia_id">
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gestion">Gestión:</label>
                                <input type="text" class="form-control" id="gestion" name="gestion" placeholder="Año de gestión">
                            </div>
                            <h4>Calificaciones</h4>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="saber1">Saber 1:</label>
                                    <input type="number" class="form-control" id="saber1" name="saber1" min="0" max="100">
                                </div>
                                <div class="col-md-3">
                                    <label for="saber2">Saber 2:</label>
                                    <input type="number" class="form-control" id="saber2" name="saber2" min="0" max="100">
                                </div>
                                <div class="col-md-3">
                                    <label for="hacer1">Hacer 1:</label>
                                    <input type="number" class="form-control" id="hacer1" name="hacer1" min="0" max="100">
                                </div>
                                <div class="col-md-3">
                                    <label for="hacer2">Hacer 2:</label>
                                    <input type="number" class="form-control" id="hacer2" name="hacer2" min="0" max="100">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="decidir1">Decidir 1:</label>
                                    <input type="number" class="form-control" id="decidir1" name="decidir1" min="0" max="100">
                                </div>
                                <div class="col-md-3">
                                    <label for="decidir2">Decidir 2:</label>
                                    <input type="number" class="form-control" id="decidir2" name="decidir2" min="0" max="100">
                                </div>
                                <div class="col-md-3">
                                    <label for="ser1">Ser 1:</label>
                                    <input type="number" class="form-control" id="ser1" name="ser1" min="0" max="100">
                                </div>
                                <div class="col-md-3">
                                    <label for="ser2">Ser 2:</label>
                                    <input type="number" class="form-control" id="ser2" name="ser2" min="0" max="100">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Guardar Calificaciones</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
