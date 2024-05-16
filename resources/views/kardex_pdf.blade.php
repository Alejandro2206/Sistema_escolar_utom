<!DOCTYPE html>
<html>

<head>
    <style>
    @page {
        /* Ajusta este valor para cambiar el margen de la página */
        margin-left: 1cm;
        margin-right: 1cm;
    }

    .table-container {
        /* Alinea la tabla a la izquierda */
        text-align: left;
    }

    /* Estilos para el cuerpo del PDF */
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }

    /* Estilos para la tarjeta de título */
    .card-header {
        text-align: center;
        font-weight: bold;
    }

    .promedio {
        width: 200px;
        float: right;
        font-size: 9px;
    }

    /* Estilos para el contenido del kardex */
    .card-body {
        text-align: justify;
        margin: 10px;
    }

    /* Estilos para la tabla */
    .table {
        width: 80%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #000;
        padding: 2px;
    }

    /* Estilos para el pie de página */
    .card-footer {
        text-align: left;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="card">
        <div class="card text-center">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-12"><b>Kardex</b></div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>

        <p><strong>A QUIEN CORRESPONDA:</strong></p>

        <div class="card text-right">
            <div class="card-body">
                <p class="card-text">El departamento de Servicios Escolares de la Universidad Tecnológica del Oriente de
                    Michoacán certifica que, según constancias existentes en el archivo escolar, el alumno <strong><i>
                            {{ $nombreAlumno }} </i></strong>,
                    con matrícula <strong><i>{{ $matricula }}</i></strong>, concluyó satisfactoriamente el plan de
                    estudios <strong><i>2020</i></strong>
                    de la carrera de <strong><i>INGENIERIA EN DESARROLLO Y GESTIÓN DE SOFTWARE</i></strong> en esta
                    institución, obteniendo las calificaciones
                    que a continuación
                    se anotan:</p>
            </div>
        </div>

        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 90px;">CUATRIMESTRE</th>
                        <th>ASIGNATURA</th>
                        <th style="width: 90px;">CALIFICACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuatrimestres as $cuatrimestre => $materias)
                    @foreach($materias as $asignatura => $calificacion)
                    <tr>
                        <td>{{ $cuatrimestre }}</td>
                        <td>{{ $asignatura }}</td>
                        <td>{{ $calificacion }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
            <div class="card">
                <div class="promedio">
                    <p class="card-text"><strong>Promedio {{ number_format($promedio, 1) }}</strong></p>
                    <p class="card-text">La calificación mínima aprobatoria es 8.0</p>
                    <p class="card-text">ERC Examen de Regularización</p>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div>
                <div>
                    <p>Se extiende el presente para los usos y fines legales que la persona
                        interesada
                        juzgue convenientes, a los {{ $fechaActual }} en la ciudad de Maravatío de Ocampo,
                        Michoacán.
                    </p>
                </div>
            </div>

            <br>
            <br>
            <div class="card-footer print-table">
                <div class="row">
                    <div class="col col-md-12 text-left">
                        <p>ATENTAMENTE</p>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="col col-md-12 text-left">
                    <p>ING. SOCORRO MORALES ROSAS <br>JEFA DEL DEPARTAMENTO DE <br>SERVICIOS ESCOLARES
                    </p>
                </div>
            </div>
</body>

</html>