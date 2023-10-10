@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Calificar</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4">Calificar Estudiante</h4>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form action="{{ route('calificacion.store', ['id' => $materiaEstudiante->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="materia">Materia</label>
                                <input type="text" class="form-control" id="materia" value="{{ $materiaEstudiante->materia->nombre }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="estudiante">Estudiante</label>
                                <input type="text" class="form-control" id="estudiante" value="{{ $materiaEstudiante->estudiante->nombre }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="gestion">Gestión</label>
                                <input type="text" class="form-control" id="gestion" value="{{ $materiaEstudiante->gestion }}" readonly>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h5>Calificación de Saber</h5>
                                    <div class="form-group">
                                        <label for="saber1">Saber 1</label>
                                        <input type="number" class="form-control" id="saber1" name="saber1" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="saber2">Saber 2</label>
                                        <input type="number" class="form-control" id="saber2" name="saber2" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="saber3">Saber 3</label>
                                        <input type="number" class="form-control" id="saber3" name="saber3" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5>Calificación de Hacer</h5>
                                    <div class="form-group">
                                        <label for="hacer1">Hacer 1</label>
                                        <input type="number" class="form-control" id="hacer1" name="hacer1" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hacer2">Hacer 2</label>
                                        <input type="number" class="form-control" id="hacer2" name="hacer2" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hacer3">Hacer 3</label>
                                        <input type="number" class="form-control" id="hacer3" name="hacer3" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5>Calificación de Decidir</h5>
                                    <div class="form-group">
                                        <label for="decidir1">Decidir 1</label>
                                        <input type="number" class="form-control" id="decidir1" name="decidir1" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="decidir2">Decidir 2</label>
                                        <input type="number" class="form-control" id="decidir2" name="decidir2" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="decidir3">Decidir 3</label>
                                        <input type="number" class="form-control" id="decidir3" name="decidir3" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5>Calificación de Ser</h5>
                                    <div class="form-group">
                                        <label for="ser1">Ser 1</label>
                                        <input type="number" class="form-control" id="ser1" name="ser1" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ser2">Ser 2</label>
                                        <input type="number" class="form-control" id="ser2" name="ser2" step="0.01" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ser3">Ser 3</label>
                                        <input type="number" class="form-control" id="ser3" name="ser3" step="0.01" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Calificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
