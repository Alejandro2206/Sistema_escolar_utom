<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constancia</title>
    <style>
        .content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        body {
            margin-left: 40px; 
            margin-right: 40px; 
        }
        img {
            text-align: center;
            padding-left: 50px;
            width: 150px;
            height: 100px;
        }
        .fecha {
            padding-top: 25px;
            padding-right: 25px;
            text-align: right;
            font-family: Arial, Helvetica, sans-serif;
            font-style: italic;
        }
        h2 {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
        }
        h4 {
            font-family: 'Times New Roman', Times, serif;
            text-align: left;
            font-weight: bold;
        }
        .parametros{
            font-family: 'Times New Roman', Times, serif;
            text-align: left;
            font-weight: bold;
            font-size: small;
        }
        p {
            font-family: 'Times New Roman', Times, serif;
            text-align: justify;
            padding-left:20px;
            padding-top: small;
        }
    </style>
</head>
<body>

    <div class="content">
        
    </div>
    <div style="padding-top: 45px;">
        <p class="fecha">"2023, año de Francisco Villa, El revolucionario del pueblo"</p>

        <h2>CONSTANCIAS DE ESTUDIOS</h2>
        <br>
<h4 style="padding-left:20px;">A QUIEN CORRESPONDA:</h4>
<p>El departamento de Servicios Escolares de la Universidad Tecnologica del Oriente de Michoacan</p>
<p style="text-align: center;">Hacer constar que el alumno:</p>
<h3 style="text-align: center;">{{ $estudiante->estudiante_nombre_completo }}</h3>
<P>&nbsp;&nbsp;&nbsp;&nbsp;Esta inscrito como alumno regular que cursa el {{ $estudiante->cuatrimestres->cuatrimestre_nombre }} de la carrera de 
<b>{{ $estudiante->carreras->carrera_descripcion }},</b> con matricula <b>{{ $estudiante->estudiante_matricula }},</b> del {{ $diaInicio }} de {{ $mesInicio }} del {{ $anioInicio }} al {{ $diaTermino }} de {{ $mesTermino }} del {{ $anioTermino }} en esta institucion.</p>
<p> <b>Con un Promedio general de 8.81 </b></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;Se extiende al precente para los usos y fines legales que la persona interezada juzge convenientes,
a los 19 dias del mes de {{ $mesInicio }} del {{ $anioInicio }} en la ciudad de Maravatio de Ocampo,Michoacan</p>
<br>
<h4>ATENTAMENTE</h4>
<br> &nbsp;

<h4 >ING SOCORRO MORALES ROSAS</h4>
<h4 >JEFA DE DEPARTAMENTO</h4>
<h4 >DE SERVICIOS ESCOLARES</h4>
<p class="parametros">C.c.p archivo</p>
<p class="parametros">*SMR/ecg</p>
    </div>

</body>
</html>