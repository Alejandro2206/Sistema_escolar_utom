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
			<div class="col col-md-6"><b>Agregar Modulo</b></div>
			<div class="col col-md-6">
				<a href="{{ route('modulos.index') }}" class="btn btn-primary btn-sm float-end">Regresar</a>
			</div>
    </div>
	<div class="card-body">
		<form method="post" action="{{ route('modulos.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Descripcion</label>
				<div class="col-sm-10">
					<input type="text" name="modulo_descripcion" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nombre</label>
				<div class="col-sm-10">
					<input type="text" name="modulo_nombre" class="form-control" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Orden</label>
				<div class="col-sm-10">
					<input type="text" name="modulo_orden" class="form-control" />
				</div>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="Agregar" />
                </div>
			</div>

		</form>
	</div>
</div>

@endsection('content')
