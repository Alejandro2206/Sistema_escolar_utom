@extends('master')

@section('pantallas')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Agregar Asignatura</b></div>
			<div class="col col-md-6">
				<a href="{{ route('asignaturas.index') }}" class="btn btn-primary btn-sm float-end">Cancelar</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('asignaturas.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Asignatura Plan</label>
				<div class="col-sm-10">
					<input type="text" name="asignatura_plan" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Asignatura Descripción</label>
				<div class="col-sm-10">
					<input type="text" name="asignatura_descripcion" class="form-control" />
				</div>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Agregar</button>
				<a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</form>
	</div>
</div>

@endsection('content')
