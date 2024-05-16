@extends('master')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success">
	{{ $message }}
</div>
@endif

<h1 class="text-primary mt-3 mb-4 text-center"><b>Titulo Ing Lic</b></h1>

<h5  class="text-center">Recuerda subir tus documentos, para tener tu expediente completo</h5>

<div class="container-fluid">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col col-md-6"><b>Titulo Ing Lic</b></div>
						<div class="col-md-6 d-flex justify-content-end">
                <form action="{{ route('tituloinglic.index') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por matrícula" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
                <a href="{{ route('tituloinglic.create') }}" class="btn btn-success ms-2">Agregar</a>
            </div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<div class="scrollable-horizontal">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center">Comprobante de Pago <br>con dos copias</th>
                                        <th class="text-center">liberacion de Servicio</th>
										<th class="text-center">Reporte Tecnico</th>
										<th class="text-center">Fotografias</th>
									</tr>
								</thead>
								<tbody>
									@if(count($data) > 0)
									@foreach($data as $row)
									<tr>
									    
                                        <td>@if($row->comprobante_pago)<a href="{{ asset('docutituloinglic/' . $row->comprobante_pago) }}">Ver documento</a>@endif</td>
										<td>@if($row->liberacion_servicio)<a href="{{ asset('docutituloinglic/' . $row->liberacion_servicio) }}">Ver documento</a>@endif</td>
										<td>@if($row->reporte_tecnico)<a href="{{ asset('docutituloinglic/' . $row->reporte_tecnico) }}">Ver documento</a>@endif</td>
										
										<td>@if($row->fotografias)<img src="{{ asset('images/' . $row->fotografias) }}" alt="Foto" style="max-width: 200px;">@endif</td>
										<td>
											<form method="post" action="{{ route('tituloinglic.destroy', $row->id) }}">
												@csrf
												@method('DELETE')
												<a href="{{ route('tituloinglic.show', $row->id) }}" class="btn btn-primary btn-sm">Ver</a>
												<a href="{{ route('tituloinglic.edit', $row->id) }}" class="btn btn-success btn-sm">Editar</a>
												<input type="submit" class="btn btn-danger btn-sm" value="Eliminar" />
											</form>
										</td>
									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="5" class="text-center">No Data Found</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				{!! $data->links() !!}
			</div>
		</div>
	</div>
</div>

@endsection