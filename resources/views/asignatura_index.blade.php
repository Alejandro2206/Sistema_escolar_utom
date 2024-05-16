@extends('master')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

<div class="container mt-5">
    <h1 class="text-primary text-center mb-4"><b>Catalogo de Asignaturas</b></h1>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6"><b>Catalogo de Asignaturas</b></div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('asignaturas.create') }}" class="btn btn-success btn-sm">Agregar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>Asignatura Plan</th>
                        <th>Asignatura Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $row)
                        <tr>
                            <td>{{ $row->asignatura_plan }}</td>
                            <td>{{ $row->asignatura_descripcion }}</td>
                            <td>
                                <form method="post" action="{{ route('asignaturas.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('asignaturas.show', $row->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <a href="{{ route('asignaturas.edit', $row->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No se encontraron datos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $data->links() !!}
        </div>
    </div>
</div>

@endsection

