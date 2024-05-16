@extends('master')

@section('pantallas')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Detalles de Plan</b></div>
			<div class="col col-md-6">
				<a href="{{ route('carreras.index') }}" class="btn btn-primary btn-sm float-end">Ver todo</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Id</b></label>
			<div class="col-sm-10">
				{{ $carrera->id }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Clave</b></label>
			<div class="col-sm-10">
				{{ $carrera->carrera_clave }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Plan De Estudios</b></label>
			<div class="col-sm-10">
				{{ $carrera->carrera_descripcion }}
			</div>
		</div>
	</div>
</div>

@endsection('pantallas')
