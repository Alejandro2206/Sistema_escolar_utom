@extends('master')

@section('pantallas')

<div class="card">
	<div class="card-header">Editar Modulo</div>
	<div class="card-body">
		<form method="post" action="{{ route('modulos.update', $modulo->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Descripcion del Modulo:</label>
				<div class="col-sm-10">
					<input type="text" name="modulo_descripcion" class="form-control" value="{{ $modulo->descripcion }}" />
				</div>

                <label class="col-sm-2 col-label-form">Nombre</label>
                <div class="col-sm-10">
					<input type="text" name="modulo_nombre" class="form-control" value="{{ $modulo->nombre }}" />
				</div>

				<label class="col-sm-2 col-label-form">Orden</label>
                <div class="col-sm-10">
					<input type="text" name="modulo_orden" class="form-control" value="{{ $modulo->orden }}" />
				</div>
			</div>

			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $modulo->id }}" />
				<input type="submit" class="btn btn-primary" value="Editar Modulo" />
			</div>
		</form>
	</div>
</div>
@endsection('content')
