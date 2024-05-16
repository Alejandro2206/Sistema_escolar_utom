
<!DOCTYPE html>
<html>
<head>
    <title>Estadisticas PDF</title>
    <style>

    @page {
        margin-left: 3cm; /* Ajusta este valor para cambiar el margen de la página */
        margin-right: 3cm;
    }
    body {
        font-family: Arial, sans-serif;
        color: #333;
        font-size: 12px;
    }

    h4 {
        text-align: right; /* Align the title to the right */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 12px; /* Set font size to small */
    }

    th {
        font-weight: bold; /* Make th elements bold */
        background-color: #ddd;
        color: #222;
    }

    table, th, td {
        border: 1px solid black;
        padding: 2px;
    }

    .page-break-before {
        page-break-before: always;
    }

    .page-break-after {
        page-break-after: always;
    }

    .card-footer {
        text-align: center;
    }
    .texto-derecha {
    text-align: right;
    }
    .texto-centro {
    text-align: center;
    }
</style>

</head>
<body>
    <h4 class="texto-derecha ">Universidad Tecnológica del Oriente de Michoacán</h4>
    <h4 class="texto-derecha ">Información estadistica {{ $estadisticas['carreraSeleccionada'] }}</h4>

    <table class="table table-bordered border-2 ">
    <tr>
        <td class="texto-derecha" colspan="4">Información cuatrimestral {{ $estadisticas['cuatrimestreSeleccionado'] }}</td>
    </tr>
    <tr>
        <th colspan="2">Concepto</th>
        <th style="width: 100px;">Mujer</th>
        <th style="width: 100px;">Hombre</th>
    </tr>
    <tr>
        <td class="texto-centro" colspan="2">Total nuevo ingreso</td>
        <td class="texto-centro">{{ isset($estadisticas['nuevoIngresoMujeres']) ? $estadisticas['nuevoIngresoMujeres'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['nuevoIngresoHombres']) ? $estadisticas['nuevoIngresoHombres'] : 0 }}</td>
    </tr>
	<tr>
		<th class="texto-centro" colspan="4">Perfil de nuevo ingreso</th>
	</tr>
	<tr>
        <td colspan="2">Concepto</td>
        <td class="texto-centro">Mujer</td>
        <td class="texto-centro">Hombre</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad física/motriz</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDMM']) ? $estadisticas['NIDMM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDMH']) ? $estadisticas['NIDMH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad intelectual</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad múltiple</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad auditiva</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDAM']) ? $estadisticas['NIDAM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDAH']) ? $estadisticas['NIDAH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad baja visión</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDVM']) ? $estadisticas['NIDVM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDVH']) ? $estadisticas['NIDVH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad ceguera</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDVM']) ? $estadisticas['NIDVM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDVH']) ? $estadisticas['NIDVH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad psicosocial</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Hablante de lengua indígena</td>
        <td class="texto-centro">{{ isset($estadisticas['LindigenaM']) ? $estadisticas['LindigenaM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['LindigenaH']) ? $estadisticas['LindigenaH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Soltero(a)</td>
        <td class="texto-centro">{{ isset($estadisticas['NISM']) ? $estadisticas['NISM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NISH']) ? $estadisticas['NISH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Casado(a)</td>
        <td class="texto-centro">{{ isset($estadisticas['NICM']) ? $estadisticas['NICM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NICH']) ? $estadisticas['NICH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Divorciado(a)</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDM']) ? $estadisticas['NIDM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIDH']) ? $estadisticas['NIDH'] : 0 }}</td>
	</tr>
	<tr>
        <td colspan="2">Viudo(a)</td>
        <td class="texto-centro">{{ isset($estadisticas['NIVM']) ? $estadisticas['NIVM'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIVH']) ? $estadisticas['NIVH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Unión libre(a)</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Con hijos</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Otro</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Especifique</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td class="texto-centro align-middle" rowspan="16">Edades de nuevo ingreso</td>
        <td>-18</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEMmenos18']) ? $estadisticas['NIEMmenos18'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEHmenos18']) ? $estadisticas['NIEHmenos18'] : 0 }}</td>
    </tr>
	<tr>
		<td>18</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM18']) ? $estadisticas['NIEM18'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH18']) ? $estadisticas['NIEH18'] : 0 }}</td>
	</tr>
	<tr>
		<td>19</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM19']) ? $estadisticas['NIEM19'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH19']) ? $estadisticas['NIEH19'] : 0 }}</td>
	</tr>
	<tr>
		<td>20</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM20']) ? $estadisticas['NIEM20'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH20']) ? $estadisticas['NIEH20'] : 0 }}</td>
	</tr>
	<tr>
		<td>21</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM21']) ? $estadisticas['NIEM21'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH21']) ? $estadisticas['NIEH21'] : 0 }}</td>
	</tr>
	<tr>
		<td>22</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM22']) ? $estadisticas['NIEM22'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH22']) ? $estadisticas['NIEH22'] : 0 }}</td>
	</tr>
	<tr>
		<td>23</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM23']) ? $estadisticas['NIEM23'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH23']) ? $estadisticas['NIEH23'] : 0 }}</td>
	</tr>
	<tr>
		<td>24</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM24']) ? $estadisticas['NIEM24'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH24']) ? $estadisticas['NIEH24'] : 0 }}</td>
	</tr>
	<tr>
		<td>25</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM25']) ? $estadisticas['NIEM25'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH25']) ? $estadisticas['NIEH25'] : 0 }}</td>
	</tr>
	<tr>
		<td>26</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM26']) ? $estadisticas['NIEM26'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH26']) ? $estadisticas['NIEH26'] : 0 }}</td>
    </tr>
	<tr>
		<td>27</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM27']) ? $estadisticas['NIEM27'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH27']) ? $estadisticas['NIEH27'] : 0 }}</td>
	</tr>
	<tr>
		<td>28</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM28']) ? $estadisticas['NIEM28'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH28']) ? $estadisticas['NIEH28'] : 0 }}</td>
	</tr>
	<tr>
		<td>29</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEM29']) ? $estadisticas['NIEM29'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEH29']) ? $estadisticas['NIEH29'] : 0 }}</td>
	</tr>
	<tr>
		<td>30-34</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEMmenos34']) ? $estadisticas['NIEMmenos34'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEHmenos34']) ? $estadisticas['NIEHmenos34'] : 0 }}</td>
	</tr>
	<tr>
		<td>35-39</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEMmenos39']) ? $estadisticas['NIEMmenos39'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEHmenos39']) ? $estadisticas['NIEHmenos39'] : 0 }}</td>
	</tr>
	<tr>
		<td>39 o más</td>
		<td class="texto-centro">{{ isset($estadisticas['NIEMmas40']) ? $estadisticas['NIEMmas40'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['NIEHmas40']) ? $estadisticas['NIEHmas40'] : 0 }}</td>
	</tr>
</table>
<div class="page-break-before">
<table class="table table-bordered border-2 ">
	<tr>
        <td class="texto-centro" colspan="2">Concepto</td>
        <td class="texto-centro" style="width: 100px; ">Mujer</td>
        <td class="texto-centro" style="width: 100px;">Hombre</td>
    </tr>
    <tr>
        <th class="texto-centro" colspan="2">Total de Reingreso</th>
        <th class="texto-centro">N/A</th>
        <th class="texto-centro">N/A</th>
    </tr>
	<tr>
        <td class="texto-centro align-middle" rowspan="16">Edad del reingreso</td>
        <td>-18</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro" class="texto-centro">N/A</td>
    </tr>
	<tr>
		<td>18</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>19</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>20</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>21</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>22</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>23</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>24</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>25</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>26</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>27</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>28</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>29</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>30-34</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>35-39</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
		<td>39 o más</td>
		<td class="texto-centro">N/A</td>
		<td class="texto-centro">N/A</td>
	</tr>
	<tr>
        <td colspan="2">Matutino</td>
        <td class="texto-centro">{{ isset($estadisticas['numeroMujeres']) ? $estadisticas['numeroMujeres'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['numeroHombres']) ? $estadisticas['numeroHombres'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Vespertino</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
	</tr>
	<tr>
        <td class="texto-derecha" colspan="4">Información cuatrimestral {{ $estadisticas['cuatrimestreSeleccionado'] }}</td>
    </tr>
	<tr>
        <th colspan="2">Concepto</th>
        <th class="texto-centro">Mujer</th>
        <th class="texto-centro">Hombre</th>
    </tr>
	<tr>
        <td colspan="2">Egresados</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Titulados</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Con cédula</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Total baja temporal</td>
        <td class="texto-centro">{{ isset($estadisticas['BTMujeres']) ? $estadisticas['BTMujeres'] : 0 }}</td>
        <td class="texto-centro">{{ isset($estadisticas['BTHombres']) ? $estadisticas['BTHombres'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Causas desconocida</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Incumplimiento de espectativas</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Reprobación</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Problemas económicos</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Motivos personales</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Distancia de la UT</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Problemas de trabajo</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de institución</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de carrera</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de residencia</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Faltas al reglamento escolar</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Baja de rendimiento académico</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Salud</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Defunción</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Inasistencia</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Embarazo</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Mala elección de las carreras</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Violencia escolar</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td colspan="2">Otras causas (especifica)</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
    </table>
    </div>
<div class="page-break-before">
<table class="table table-bordered border-2 ">
	<tr>
        <td >Total baja definitiva</td>
        <td  class="texto-centro" style="width: 100px;">{{ isset($estadisticas['BDMujeres']) ? $estadisticas['BDMujeres'] : 0 }}</td>
        <td  class="texto-centro" style="width: 100px;">{{ isset($estadisticas['BDHombres']) ? $estadisticas['BDHombres'] : 0 }}</td>
    </tr>
	<tr>
        <td >Causas desconocida</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Incumplimiento de espectativas</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Reprobación</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Problemas económicos</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Motivos personales</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Distancia de la UT</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Problemas de trabajo</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Cambio de institución</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Cambio de carrera</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Cambio de residencia</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Faltas al reglamento escolar</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Baja de rendimiento académico</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Salud</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Defunción</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Inasistencia</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Embarazo</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Mala elección de las carreras</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Violencia escolar</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Otras causas (especifica)</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Becados</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Transporte</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Manutención</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Jóvenes Escribiendo el Futuro</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Otro (especifica)</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Aprovechamiento</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Eficiencia Terminal %</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>
	<tr>
        <td >Deserción %</td>
        <td class="texto-centro">N/A</td>
        <td class="texto-centro">N/A</td>
    </tr>	
    </table>
    </div>

    <div class="card-footer ">
        <p>Firma y sello</p>
        <p>____________________________________</p>
        <p>Ing. Socorro Morales</p>
        <p>Jefa Control Escolar</p>
    </div>
</body>
</html>