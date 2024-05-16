@extends('master')

@section('pantallas')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Detalles de Asignatura</b></div>
			<div class="col col-md-6">
				<a href="{{ route('asignaturas.index') }}" class="btn btn-primary btn-sm float-end">Ver todo</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Asignatura Plan</b></label>
			<div class="col-sm-10">
				{{ $asignatura->asignatura_plan }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Asignatura Descripción</b></label>
			<div class="col-sm-10">
				{{ $asignatura->asignatura_descripcion }}
			</div>
		</div>
	</div>
</div>

@endsection('content')
