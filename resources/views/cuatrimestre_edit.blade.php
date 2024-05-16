@extends('master')

@section('pantallas')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Editar Cuatrimestres</b></h1>

<div class="card">
	<div class="card-header">Editar Cuatrimestre</div>
	<div class="card-body">
		<form method="post" action="{{ route('cuatrimestres.update', $cuatrimestre->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Cuatrimestre:</label>
				<div class="col-sm-10">
					<input type="text" name="cuatrimestre_nombre" class="form-control" value="{{ $cuatrimestre->cuatrimestre_nombre }}" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Fecha de Inicio:</label>
				<div class="col-sm-10">
					<input type="text" name="cuatrimestre_fecha_inicio" class="form-control" value="{{ $cuatrimestre->cuatrimestre_fecha_inicio }}" />
				</div>
			</div>

            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Fecha de Termino:</label>
				<div class="col-sm-10">
					<input type="text" name="cuatrimestre_fecha_termino" class="form-control" value="{{ $cuatrimestre->cuatrimestre_fecha_termino }}" />
				</div>
			</div>

			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $cuatrimestre->id }}" />
				<input type="submit" class="btn btn-primary" value="Editar Cuatrimestre" />
                <a href="{{ route('cuatrimestres.index') }}" class="btn btn-secondary">Cancelar</a>
			</div>
		</form>
	</div>
</div>
@endsection
