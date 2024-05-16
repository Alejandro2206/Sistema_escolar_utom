@extends('master')

@section('pantallas')
<style>
  @media print {
    .ocultar-imprimir {
      display: none;
    }
    .print-table {
      visibility: visible;
    }
  }
</style>

<div class="ocultar-imprimir">
<h1 class="text-center">Estadísticas </h1>

<div class="d-flex align-items-center">
    <!-- Formulario para generar estadísticas -->
    <form action="{{ route('estadisticas.index') }}" method="GET" class="d-flex align-items-center mx-2">
        <h4 style="font-size: 14px;">Seleccionar Carrera</h4>
        <select name="Carrera" class="form-select mx-2">
            @foreach ($carreras as $carrera)
                <option value="{{ $carrera->id }}" @if($carrera->id == $carreraSeleccionada) selected @endif>
                    {{ $carrera->carrera_actual }} {{ $carrera->carrera_descripcion }}
                </option>
            @endforeach
        </select>

        <h4 style="font-size: 14px;">Seleccionar Cuatrimestre</h4>
        <select name="Cuatrimestre" class="form-select mx-2">
            @foreach ($cuatrimestres as $cuatrimestre)
                <option value="{{ $cuatrimestre->id }}" @if($cuatrimestre->id == $cuatrimestreSeleccionado) selected @endif>
                    {{ $cuatrimestre->cuatrimestre_nombre }} {{ $cuatrimestre->cuatrimestre_fecha_inicio }} {{ $cuatrimestre->cuatrimestre_fecha_termino }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-primary mx-2" type="submit" style="font-size: 14px;">Generar Estadisticas</button>
    </form>

    <!-- Formulario para generar PDF -->
    <form action="{{ route('estadisticas.pdf') }}" method="GET" class="d-flex align-items-center mx-2" target="_blank">
        <input type="hidden" name="Carrera" value="{{ $carreraSeleccionada }}">
        <input type="hidden" name="Cuatrimestre" value="{{ $cuatrimestreSeleccionado }}">
        <button class="btn btn-success" type="submit" style="font-size: 14px;">Generar PDF</button>
    </form>
</div>

</div>
<br>
<h3 class="text-end pritn-table">Universidad Tecnológica del Oriente de Michoacán</h3>
<table class="table table-bordered border-2 print-table">
<tr>
    <td class="text-end" colspan="4">Información estadistica
        @isset($estadisticas['carreraSeleccionada'])
        {{ $estadisticas['carreraSeleccionada'] }}
        @else
            (Presione generar estadisticas)
        @endisset
    </td>
</tr>
<tr>
    <th class="text-end" colspan="4">Información cuatrimestral
        @isset($estadisticas['cuatrimestreSeleccionado'])
            {{ $estadisticas['cuatrimestreSeleccionado'] }}
        @else
            (Presione generar estadisticas)
        @endisset
    </th>
</tr>
    <tr>
        <th colspan="2">Concepto</th>
        <th>Mujer</th>
        <th>Hombre</th>
    </tr>
    <tr>
        <th colspan="2">Total nuevo ingreso</th>
        <td>{{ isset($estadisticas['nuevoIngresoMujeres']) ? $estadisticas['nuevoIngresoMujeres'] : 0 }}</td>
        <td>{{ isset($estadisticas['nuevoIngresoHombres']) ? $estadisticas['nuevoIngresoHombres'] : 0 }}</td>
    </tr>
	<tr>
		<th class="text-center" colspan="4">Perfil de nuevo ingreso</th>
	</tr>
	<tr>
        <th colspan="2">Concepto</th>
        <th>Mujer</th>
        <th>Hombre</th>
    </tr>
	<tr>
        <td colspan="2">Discapacidad física/motriz</td>
        <td>{{ isset($estadisticas['NIDMM']) ? $estadisticas['NIDMM'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIDMH']) ? $estadisticas['NIDMH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad intelectual</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad múltiple</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad auditiva</td>
        <td>{{ isset($estadisticas['NIDAM']) ? $estadisticas['NIDAM'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIDAH']) ? $estadisticas['NIDAH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad baja visión</td>
        <td>{{ isset($estadisticas['NIDVM']) ? $estadisticas['NIDVM'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIDVH']) ? $estadisticas['NIDVH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad ceguera</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Discapacidad psicosocial</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Hablante de lengua indígena</td>
        <td>{{ isset($estadisticas['LindigenaM']) ? $estadisticas['LindigenaM'] : 0 }}</td>
        <td>{{ isset($estadisticas['LindigenaH']) ? $estadisticas['LindigenaH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Soltero(a)</td>
        <td>{{ isset($estadisticas['NISM']) ? $estadisticas['NISM'] : 0 }}</td>
        <td>{{ isset($estadisticas['NISH']) ? $estadisticas['NISH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Casado(a)</td>
        <td>{{ isset($estadisticas['NICM']) ? $estadisticas['NICM'] : 0 }}</td>
        <td>{{ isset($estadisticas['NICH']) ? $estadisticas['NICH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Divorciado(a)</td>
        <td>{{ isset($estadisticas['NIDM']) ? $estadisticas['NIDM'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIDH']) ? $estadisticas['NIDH'] : 0 }}</td>
	</tr>
	<tr>
        <td colspan="2">Viudo(a)</td>
        <td>{{ isset($estadisticas['NIVM']) ? $estadisticas['NIVM'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIVH']) ? $estadisticas['NIVH'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Unión libre(a)</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Con hijos</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Otro</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Especifique</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>

	<tr>
        <td class="text-center align-middle" rowspan="16">Edades de nuevo ingreso</td>
        <td>-18</td>
		<td>{{ isset($estadisticas['NIEMmenos18']) ? $estadisticas['NIEMmenos18'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEHmenos18']) ? $estadisticas['NIEHmenos18'] : 0 }}</td>
    </tr>
	<tr>
		<td>18</td>
		<td>{{ isset($estadisticas['NIEM18']) ? $estadisticas['NIEM18'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH18']) ? $estadisticas['NIEH18'] : 0 }}</td>
	</tr>
	<tr>
		<td>19</td>
		<td>{{ isset($estadisticas['NIEM19']) ? $estadisticas['NIEM19'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH19']) ? $estadisticas['NIEH19'] : 0 }}</td>
	</tr>
	<tr>
		<td>20</td>
		<td>{{ isset($estadisticas['NIEM20']) ? $estadisticas['NIEM20'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH20']) ? $estadisticas['NIEH20'] : 0 }}</td>
	</tr>
	<tr>
		<td>21</td>
		<td>{{ isset($estadisticas['NIEM21']) ? $estadisticas['NIEM21'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH21']) ? $estadisticas['NIEH21'] : 0 }}</td>
	</tr>
	<tr>
		<td>22</td>
		<td>{{ isset($estadisticas['NIEM22']) ? $estadisticas['NIEM22'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH22']) ? $estadisticas['NIEH22'] : 0 }}</td>
	</tr>
	<tr>
		<td>23</td>
		<td>{{ isset($estadisticas['NIEM23']) ? $estadisticas['NIEM23'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH23']) ? $estadisticas['NIEH23'] : 0 }}</td>
	</tr>
	<tr>
		<td>24</td>
		<td>{{ isset($estadisticas['NIEM24']) ? $estadisticas['NIEM24'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH24']) ? $estadisticas['NIEH24'] : 0 }}</td>
	</tr>
	<tr>
		<td>25</td>
		<td>{{ isset($estadisticas['NIEM25']) ? $estadisticas['NIEM25'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH25']) ? $estadisticas['NIEH25'] : 0 }}</td>
	</tr>
	<tr>
		<td>26</td>
		<td>{{ isset($estadisticas['NIEM26']) ? $estadisticas['NIEM26'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH26']) ? $estadisticas['NIEH26'] : 0 }}</td>
    </tr>
	<tr>
		<td>27</td>
		<td>{{ isset($estadisticas['NIEM27']) ? $estadisticas['NIEM27'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH27']) ? $estadisticas['NIEH27'] : 0 }}</td>
	</tr>
	<tr>
		<td>28</td>
		<td>{{ isset($estadisticas['NIEM28']) ? $estadisticas['NIEM28'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH28']) ? $estadisticas['NIEH28'] : 0 }}</td>
	</tr>
	<tr>
		<td>29</td>
		<td>{{ isset($estadisticas['NIEM29']) ? $estadisticas['NIEM29'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEH29']) ? $estadisticas['NIEH29'] : 0 }}</td>
	</tr>
	<tr>
		<td>30-34</td>
		<td>{{ isset($estadisticas['NIEMmenos34']) ? $estadisticas['NIEMmenos34'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEHmenos34']) ? $estadisticas['NIEHmenos34'] : 0 }}</td>
	</tr>
	<tr>
		<td>35-39</td>
		<td>{{ isset($estadisticas['NIEMmenos39']) ? $estadisticas['NIEMmenos39'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEHmenos39']) ? $estadisticas['NIEHmenos39'] : 0 }}</td>
	</tr>
	<tr>
		<td>40 o más</td>
		<td>{{ isset($estadisticas['NIEMmas40']) ? $estadisticas['NIEMmas40'] : 0 }}</td>
        <td>{{ isset($estadisticas['NIEHmas40']) ? $estadisticas['NIEHmas40'] : 0 }}</td>
	</tr>
	<tr>
        <th colspan="2">Concepto</th>
        <th>Mujer</th>
        <th>Hombre</th>
    </tr>
	<tr>
        <td class="text-center align-middle" rowspan="17">Edad del reingreso</td>
    </tr>
	<tr>
		<td>-18</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>18</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>19</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>20</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>21</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>22</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>23</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>24</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>25</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>26</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>27</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>28</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>29</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>30-34</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>35-39</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
		<td>39 o más</td>
		<td>N/A</td>
		<td>N/A</td>
	</tr>
	<tr>
        <th colspan="2">Matutino</th>
        <td>{{ isset($estadisticas['numeroMujeres']) ? $estadisticas['numeroMujeres'] : 0 }}</td>
        <td>{{ isset($estadisticas['numeroHombres']) ? $estadisticas['numeroHombres'] : 0 }}</td>
    </tr>
	<tr>
        <th colspan="2">Vespertino</th>
        <td>N/A</td>
        <td>N/A</td>
	</tr>
	<tr>
        <th class="text-end" colspan="4">Información cuatrimestral @isset($estadisticas['cuatrimestreSeleccionado'])
            {{ $estadisticas['cuatrimestreSeleccionado'] }}
        @else
            (Presione generar estadisticas)
        @endisset</td>
    </tr>
	<tr>
        <th colspan="2">Concepto</th>
        <th>Mujer</th>
        <th>Hombre</th>
    </tr>
	<tr>
        <th colspan="2">Egresados</th>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Titulados</th>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Con cédula</th>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Total baja temporal</th>
        <td>{{ isset($estadisticas['BTMujeres']) ? $estadisticas['BTMujeres'] : 0 }}</td>
        <td>{{ isset($estadisticas['BTHombres']) ? $estadisticas['BTHombres'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Causas desconocida</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Incumplimiento de espectativas</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Reprobación</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Problemas económicos</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Motivos personales</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Distancia de la UT</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Problemas de trabajo</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de institución</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de carrera</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de residencia</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Faltas al reglamento escolar</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Baja de rendimiento académico</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Salud</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Defunción</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Inasistencia</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Embarazo</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Mala elección de las carreras</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Violencia escolar</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Otras causas (especifica)</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Total baja definitiva</th>
        <td>{{ isset($estadisticas['BDMujeres']) ? $estadisticas['BDMujeres'] : 0 }}</td>
        <td>{{ isset($estadisticas['BDHombres']) ? $estadisticas['BDHombres'] : 0 }}</td>
    </tr>
	<tr>
        <td colspan="2">Causas desconocida</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Incumplimiento de espectativas</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Reprobación</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Problemas económicos</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Motivos personales</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Distancia de la UT</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Problemas de trabajo</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de institución</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de carrera</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Cambio de residencia</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Faltas al reglamento escolar</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Baja de rendimiento académico</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Salud</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Defunción</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Inasistencia</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Embarazo</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Mala elección de las carreras</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Violencia escolar</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Otras causas (especifica)</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Becados</th>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Transporte</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Manutención</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Jóvenes Escribiendo el Futuro</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <td colspan="2">Otro (especifica)</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Aprovechamiento</th>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Eficiencia Terminal %</th>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
	<tr>
        <th colspan="2">Deserción %</th>
        <td>N/A</td>
        <td>N/A</td>
    </tr>	
</table>

<div class="card-footer">
		<div class="row">
			<div class="col col-md-12 text-center"><p>Firma y sello</p></div>
		</div>
		<div class="row">
			<div class="col col-md-12 text-center"><p>____________________________________</p></div>
		</div>
		<div class="col col-md-12 text-center"><p>Ing. Socorro Morales Rosas</p></div>
		<div class="col col-md-12 text-center"><p>Jefa de Departamento de Servicios Escolares</p></div>
</div>


@endsection