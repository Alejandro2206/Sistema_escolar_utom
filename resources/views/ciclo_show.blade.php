@extends('master')

@section('pantallas')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Detalles de Ciclos</b></div>
			<div class="col col-md-6">
				<a href="{{ route('ciclos.index') }}" class="btn btn-primary btn-sm float-end">Ver todo</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Descripcion</b></label>
			<div class="col-sm-10">
				{{ $ciclo->ciclo_descripcion}}
			</div>
		</div>
</div>

@endsection('content')
