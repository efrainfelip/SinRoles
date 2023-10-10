<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Calificaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            font-weight: bold;
            font-size: 18px;
        }
        .title {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }
        .subtitle {
            font-size: 18px;
            margin-bottom: 20px;
            text-align: center;
        }
        .student {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
            text-align: center;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .approved {
            background-color: #c6efce;
        }
        .rejected {
            background-color: #f8cecc;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">INSTITUTO TECNOLOGICO NACIONAL</div>
        <div>"Ceicom"</div>
    </div>
    <div class="subtitle">Centro de Informática y Computación</div>
    <div class="title">BOLETA DE CALIFICACIONES</div>
    
    
    <div class="student">ALUMNO(A): {{ $estudiante->nombre }} {{ $estudiante->apellidoP }} {{ $estudiante->apellidoM }}</div>
    <div>Gestión: {{ date('Y') }}</div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Materia</th>
                <th>Gestión</th>
                <th>Nota Final</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calificaciones as $calificacion)
                @php
                    $resultado = $calificacion->promedio_final >= 61 ? 'Aprobado' : 'Reprobado';
                @endphp
                <tr>
                    <td>{{ $calificacion->materia->nombre }}</td>
                    <td>{{ $calificacion->gestion }}</td>
                    <td>{{ number_format($calificacion->promedio_final, 2) }}</td>
                    <td class="{{ $calificacion->promedio_final >= 61 ? 'approved' : 'rejected' }}">{{ $resultado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        NOTA MÍNIMA DE APROBACIÓN: 61<br>
        Cochabamba - {{ date('d/m/Y') }}
    </div>
</body>
</html>
