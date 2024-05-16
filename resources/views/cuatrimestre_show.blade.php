@extends('master')

@section('content')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Detalles de Cuatrimestres</b></h1>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Detalles de Cuatrimestre</b></div>
			<div class="col col-md-6">
				<a href="{{ route('cuatrimestres.index') }}" class="btn btn-primary btn-sm float-end">Ver todo</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Cuatrimestre</b></label>
			<div class="col-sm-10">
				{{ $cuatrimestre->cuatrimestre_nombre }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Fecha de Inicio</b></label>
			<div class="col-sm-10">
				{{ $cuatrimestre->cuatrimestre_fecha_inicio }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Fecha de Termino</b></label>
			<div class="col-sm-10">
				{{ $cuatrimestre->cuatrimestre_fecha_termino }}
			</div>
		</div>
	</div>
</div>

@endsection
