@extends('master')

@section('pantallas')

<div class="card">
	<div class="card-header">Edit Constancia</div>
	<div class="card-body">
		<form method="post" action="{{ route('constancias.update', $constancia->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Nombre</label>
				<div class="col-sm-10">
					<input type="text" name="nombre" class="form-control" value="{{ $constancia->nombre }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Apellido Paterno</label>
				<div class="col-sm-10">
					<input type="text" name="apellido_paterno" class="form-control" value="{{ $constancia->apellido_paterno }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Apellido Materno</label>
				<div class="col-sm-10">
					<input type="text" name="apellido_materno" class="form-control" value="{{ $constancia->apellido_materno }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Cuatrimestre</label>
				<div class="col-sm-10">
					<input type="text" name="cuatrimestre" class="form-control" value="{{ $constancia->cuatrimestre }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Carrera</label>
				<div class="col-sm-10">
					<input type="text" name="carrera" class="form-control" value="{{ $constancia->carrera }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $constancia->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>

<script>
document.getElementsByName('student_gender')[0].value = "{{ $constancia->student_gender }}";
</script>

@endsection('content')
