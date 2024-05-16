@extends('master')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <h1 class="text-primary mt-3 mb-4 text-center"><b>Digitalización</b></h1>

    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0"><b>Anexar Datos de Digitalización</b></h4>
                    </div>
                    <div class="col-md-6 text-end">
                        <form action="{{ route('digitalizacion.index') }}" method="GET" class="d-flex">
                            <div class="input-group">
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
                                        <div class="btn-group" role="group" aria-label="Funciones">
                                            <a href="{{ route('preinscripcion.create', ['estudiante_id' => $estudiante->id]) }}" class="btn btn-primary btn-sm">Preinscripcion</a>
                                            <a href="{{ route('inscripcion.create', ['estudiante_id' => $estudiante->id]) }}" class="btn btn-primary btn-sm">Inscripcion</a>
                                            <a href="{{ route('reinscripcion.create', ['estudiante_id' => $estudiante->id]) }}" class="btn btn-primary btn-sm">Reinscripcion</a>
                                            <a href="{{ route('titulotsu.create', ['estudiante_id' => $estudiante->id]) }}" class="btn btn-primary btn-sm">Titulo Tsu </a>
                                            <a href="{{ route('tituloinglic.create', ['estudiante_id' => $estudiante->id]) }}" class="btn btn-primary btn-sm">Titulo Ing, Lic</a>
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




