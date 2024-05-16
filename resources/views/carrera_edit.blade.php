@extends('master')

@section('content')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Editar Plan</b></h1>

<div class="card">
	<div class="card-header">Editar Plan</div>
	<div class="card-body">
		<form method="post" action="{{ route('carreras.update', $carrera->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
		
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Clave</label>
				<div class="col-sm-10">
					<input type="text" name="carrera_actual" class="form-control" value="{{ $carrera->carrera_clave }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Plan De Estudios</label>
				<div class="col-sm-10">
					<input type="text" name="carrera_descripcion" class="form-control" value="{{ $carrera->carrera_descripcion }}" />
				</div>
			</div>
			<div class="text-center">
				
				<input type="submit" class="btn btn-primary" value="Editar Plan" />
				<a href="{{ route('carreras.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</form>
	</div>
</div>
@endsection('content')
