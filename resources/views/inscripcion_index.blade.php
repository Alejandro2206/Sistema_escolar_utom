@extends('master')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success">
	{{ $message }}
</div>
@endif

<div class="container-fluid">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Inscripcion</b></h1>
    <h5 class="text-center">Recuerda subir tus documentos para tener tu expediente completo</h5>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><b>Inscripcion</b></div>
                        <div class="col-md-6">
                            <a href="{{ route('inscripcion.create') }}" class="btn btn-success btn-sm float-end">Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="scrollable-horizontal">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
									<th class="text-center">Curp Original <br> 2 copias</th>
				                    <th class="text-center">Comprobante de Domicilio <br> 2 copias</th>
				                    <th class="text-center">Certificado de Bachillerato <br> 2 copias</th>
                                    <th class="text-center">Acta de Nacimiento <br> 2 copias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($estudiantes->count() > 0)
                                    @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $estudiante->id }}</td>
                                        <td>{{ $estudiante->estudiante_matricula }}</td>
                                        <td>
                                            @if ($estudiante->carreras)
                                            {{ $estudiante->carreras->carrera_descripcion }}
                                            @else
                                            Sin carrera asignada
                                            @endif
                                        </td>
                                        <td>{{ $estudiante->estudiante_nombre_completo }}</td>
                                        <!-- Loop through each $data item -->
                                        @foreach($data as $row)
                                        @if ($row->estudiante_id == $estudiante->id)
                                        <td>@if($row->curp_original)<a href="{{ asset('docuinscripcion/' . $row->curp_original) }}">Ver documento</a>@endif</td>
							            <td>@if($row->comprobante_domicilio)<a href="{{ asset('docuinscripcion/' . $row->comprobante_domicilio) }}">Ver documento</a>@endif</td>
							            <td>@if($row->certificado_bachillerato)<a href="{{ asset('docuinscripcion/' . $row->certificado_bachillerato) }}">Ver documento</a>@endif</td>
							            <td>@if($row->acta_nacimiento)<a href="{{ asset('docuinscripcion/' . $row->acta_nacimiento) }}" >Ver documento</a>@endif</td>
                                        <td>
                                            <form method="post" action="{{ route('preinscripcion.destroy', $row->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('inscripcion.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('incripcion.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                            </form>
                                        </td>
                                        @endif
                                        @endforeach
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="10" class="text-center">No Data Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection