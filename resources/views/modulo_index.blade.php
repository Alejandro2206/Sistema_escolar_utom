@extends('master')

@section('pantallas')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Catalogo de Modulos</b></div>
			<div class="col col-md-6">
				<a href="{{ route('modulos.create') }}" class="btn btn-success btn-sm float-end">Agregar</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th>descripción</th>
				<th>nombre</th>
				<th>orden</th>

			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td>{{ $row->modulo_descripcion }}</td>
						<td>{{ $row->modulo_nombre }}</td>
						<td>{{ $row->modulo_orden }}</td>
						<td>
							<form method="post" action="{{ route('modulos.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('modulos.show', $row->id) }}" class="btn btn-primary btn-sm">Ver</a>
								<a href="{{ route('modulos.edit', $row->id) }}" class="btn btn-warning btn-sm">Editar</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>

						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No se Encontraron Datos</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
	</div>
</div>

@endsection
