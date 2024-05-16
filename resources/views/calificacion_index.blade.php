@extends('master')

@section('pantallas')
@if($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

<div class="container mt-5">
    <h1 class="text-primary text-center mb-4"><b>Calificaciones</b></h1>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6"> 
                    <h4 class="mb-0"><b>Anexar Calificaciones</b></h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <form action="{{ route('calificaciones.index') }}" method="GET" class="d-flex">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por matrícula" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Matrícula</th>
                        <th>Carrera</th>
                        <th>Nombre</th>
                        <th>Operación</th>
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
                                <div class="dropdown">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Agregar
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $estudiante->id }}">
                                        <a class="dropdown-item" href="{{ route('calificaciones.create', ['estudiante_id' => $estudiante->id, 'parcial' => 1]) }}">Parcial 1</a>
                                        <a class="dropdown-item" href="{{ route('calificacionesp1.create', ['estudiante_id' => $estudiante->id, 'parcial' => 2]) }}">Parcial 2</a>
                                        <a class="dropdown-item" href="{{ route('calificacionesp3.create', ['estudiante_id' => $estudiante->id, 'parcial' => 3]) }}">Parcial 3</a>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='{{ route('calificaciones.show', $estudiante->id) }}'">Ver Detalles</button>
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
@endsection
