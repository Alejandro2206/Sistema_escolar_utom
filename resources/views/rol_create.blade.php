
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
	<div class="card-header">Crear Rol</div>
	<div class="card-body">
		<form method="post" action="{{ route('rols.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Descripción del Rol </label>
				<div class="col-sm-10">
					<input type="text" name="rol_descripcion" class="form-control" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Agregar" />
			</div>
		</form>
	</div>
</div>

@endsection('content')
