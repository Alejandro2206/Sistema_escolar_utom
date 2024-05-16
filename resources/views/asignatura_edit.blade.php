@extends('master')

@section('content')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Editar Asignatura</b></h1>

<div class="card">
	<div class="card-header">Editar Asignatura</div>
	<div class="card-body">
		<form method="post" action="{{ route('asignaturas.update', $asignatura->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Asignatura Plan:</label>
				<div class="col-sm-10">
					<input type="text" name="asignatura_plan" class="form-control" value="{{ $asignatura->asignatura_plan }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Asignatura Descripción:</label>
				<div class="col-sm-10">
					<input type="text" name="asignatura_descripcion" class="form-control" value="{{ $asignatura->asignatura_descripcion }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $asignatura->id }}" />
				<input type="submit" class="btn btn-primary" value="Editar Asignatura" />
				<a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</form>
	</div>
</div>
@endsection('content')
