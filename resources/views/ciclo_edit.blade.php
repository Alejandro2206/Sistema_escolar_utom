@extends('master')

@section('content')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Editar Ciclo</b></h1>

<div class="card">
	<div class="card-header">Editar Ciclo</div>
	<div class="card-body">
		<form method="post" action="{{ route('ciclos.update', $ciclo->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Descripcion del Ciclo:</label>
				<div class="col-sm-10">
					<input type="text" name="ciclo_descripcion" class="form-control" value="{{ $ciclo->ciclo_descripcion }}" />
				</div>

			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $ciclo->id }}" />
				<input type="submit" class="btn btn-primary" value="Editar Ciclo" />
				<a href="{{ route('ciclos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>    
			</div>
		</form>
	</div>
</div>
@endsection('content')
