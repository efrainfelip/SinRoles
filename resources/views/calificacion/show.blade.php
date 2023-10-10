@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Detalles de Calificación</h3>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4">Detalles de la Calificación</h4>

                <div class="form-group">
                    <label for="materia">Materia</label>
                    <input type="text" class="form-control" id="materia" value="{{ $calificacion->materia->nombre }}" readonly>
                </div>

                <div class="form-group">
                    <label for="estudiante">Estudiante</label>
                    <input type="text" class="form-control" id="estudiante" value="{{ $calificacion->estudiante->nombre }}" readonly>
                </div>

                <div class="form-group">
                    <label for="gestion">Gestión</label>
                    <input type="text" class="form-control" id="gestion" value="{{ $calificacion->gestion }}" readonly>
                </div>

                <h5>Notas</h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="saber1">Saber 1</label>
                            <input type="text" class="form-control" id="saber1" value="{{ $calificacion->saber1 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="saber2">Saber 2</label>
                            <input type="text" class="form-control" id="saber2" value="{{ $calificacion->saber2 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="saber3">Saber 3</label>
                            <input type="text" class="form-control" id="saber3" value="{{ $calificacion->saber3 }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="hacer1">Hacer 1</label>
                            <input type="text" class="form-control" id="hacer1" value="{{ $calificacion->hacer1 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="hacer2">Hacer 2</label>
                            <input type="text" class="form-control" id="hacer2" value="{{ $calificacion->hacer2 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="hacer3">Hacer 3</label>
                            <input type="text" class="form-control" id="hacer3" value="{{ $calificacion->hacer3 }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="decidir1">Decidir 1</label>
                            <input type="text" class="form-control" id="decidir1" value="{{ $calificacion->decidir1 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="decidir2">Decidir 2</label>
                            <input type="text" class="form-control" id="decidir2" value="{{ $calificacion->decidir2 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="decidir3">Decidir 3</label>
                            <input type="text" class="form-control" id="decidir3" value="{{ $calificacion->decidir3 }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ser1">Ser 1</label>
                            <input type="text" class="form-control" id="ser1" value="{{ $calificacion->ser1 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ser2">Ser 2</label>
                            <input type="text" class="form-control" id="ser2" value="{{ $calificacion->ser2 }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ser3">Ser 3</label>
                            <input type="text" class="form-control" id="ser3" value="{{ $calificacion->ser3 }}" readonly>
                        </div>
                    </div>
                </div>

                <h5>Promedios</h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="promedio_saber">Promedio Saber</label>
                            <input type="text" class="form-control" id="promedio_saber" value="{{ $calificacion->promedioSaber() }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="promedio_hacer">Promedio Hacer</label>
                            <input type="text" class="form-control" id="promedio_hacer" value="{{ $calificacion->promedioHacer() }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="promedio_decidir">Promedio Decidir</label>
                            <input type="text" class="form-control" id="promedio_decidir" value="{{ $calificacion->promedioDecidir() }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="promedio_ser">Promedio Ser</label>
                            <input type="text" class="form-control" id="promedio_ser" value="{{ $calificacion->promedioSer() }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="promedio_final">Promedio Final</label>
                    <input type="text" class="form-control" id="promedio_final" value="{{ $calificacion->notaFinal() }}" readonly>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
