@extends('master')

@section('pantallas')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Detalles de Rol</b></div>
			<div class="col col-md-6">
				<a href="{{ route('rols.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Descripcion del rol</b></label>
			<div class="col-sm-10">
				{{ $rol->rol_descripcion }}
			</div>
		</div>

	</div>
</div>

@endsection('content')
