@extends('master')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-primary text-center mb-4"><b>Catalogo de Cuatrimestres</b></h1>

        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-6"><b>Catalogo de Cuatrimestres</b></div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('cuatrimestres.create') }}" class="btn btn-success btn-sm">Agregar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Termino</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td>{{ $row->cuatrimestre_nombre }}</td>
                                <td>{{ $row->cuatrimestre_fecha_inicio }}</td>
                                <td>{{ $row->cuatrimestre_fecha_termino }}</td>
                                <td>
                                    <form method="post" action="{{ route('cuatrimestres.destroy', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('cuatrimestres.show', $row->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('cuatrimestres.edit', $row->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No se encontraron datos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {!! $data->links() !!}
            </div>
        </div>
    </div>
@endsection

