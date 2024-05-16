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
			<div class="col col-md-6"><b>Roles</b></div>
			<div class="col col-md-6">
				<a href="{{ route('rols.create') }}" class="btn btn-success btn-sm float-end">Agregar</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th>Rol</th>
				<th>Action</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td>{{ $row->rol_descripcion }}</td>
						<td>
							<form method="post" action="{{ route('rols.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('rols.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('rols.edit', $row->id) }}" class="btn btn-warning btn-sm">Editar</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Eliminar" />
							</form>

						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No existen roles registrados.</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
	</div>
</div>

@endsection
