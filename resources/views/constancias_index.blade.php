@extends('master')

@section('pantallas')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="container mt-3">
    <h1 class="text-primary text-center mb-4"><b>Constancias</b></h1>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="mb-0"><b>Generar Constancias</b></h4>
                </div>
                <div class="col-md-6 text-end">
                    <form action="{{ route('constancias.index') }}" method="GET" class="d-flex">
                        <div class="input-group">
                            <a href="{{ route('historial-constancias') }}" class="btn btn-info btn-sm">Ver Historial de Constancias</a>
                            <input type="text" name="search" class="form-control" placeholder="Buscar por matrícula" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Matrícula</th>
                            <th>Carrera</th>
                            <th>Nombre</th>
                            <th>Función</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($estudiantes as $estudiante)
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Funciones">
                                    <a href="{{ route('constancias.generarPDF', ['estudiante' => $estudiante->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-file-pdf"></i> PDF
                                    </a>
                                    <a href="{{ route('constancias.generarPDFPromedio', ['estudiante' => $estudiante->id]) }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-file-earmark-pdf"></i> PDF con Promedio
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No se encontraron datos</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

