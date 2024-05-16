@extends('master')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<h1 class="text-primary mt-3 mb-4 text-center"><b>Catalogo Estudiantes</b></h1>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-0"><b>Lista de Estudiantes</b></h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <form action="{{ route('estudiantes.index') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por matrícula"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                    </div>
                </form>
                <a href="{{ route('estudiantes.create') }}" class="btn btn-success ms-2">Agregar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Carrera</th>
                        <th>Nombre Completo</th>
                        <th class="text-center">Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($estudiantes->count() > 0)
                    @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->estudiante_matricula }}</td>
                        <td>
                            @if ($estudiante->carreras)
                            {{ $estudiante->carreras->carrera_actual }}{{ $estudiante->carreras->carrera_descripcion }}
                            @else
                            Sin carrera asignada
                            @endif
                        </td>
                        <td>{{ $estudiante->estudiante_nombre_completo }}</td>
                        <td
                            class="text-center text-black @if($estudiante->estudiante_status == 'Activo') bg-success text-white @elseif($estudiante->estudiante_status == 'Baja Temporal') bg-warning @elseif($estudiante->estudiante_status == 'Baja Permanente') bg-danger text-white @endif">
                            {{ $estudiante->estudiante_status }}</td>
                        <td>
                            <a href="{{ route('estudiantes.show', $estudiante->id) }}"
                                class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}"
                                class="btn btn-info btn-sm">Actualizar</a>
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')

                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="text-center">No se encontraron datos</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection