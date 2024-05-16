@extends('master')

@section('pantallas')

<div class="card">
	<div class="card-header">Editar Rol</div>
	<div class="card-body">
		<form method="post" action="{{ route('rols.update', $rol->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Descripcion del rol:</label>
				<div class="col-sm-10">
					<input type="text" name="rol_descripcion" class="form-control" value="{{ $rol->rol_descripcion }}" />
				</div>
			</div>

			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $rol->id }}" />
				<input type="submit" class="btn btn-primary" value="Editar Rol" />
			</div>
		</form>
	</div>
</div>
@endsection('content')
