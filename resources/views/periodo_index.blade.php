@extends('master')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-primary text-center mb-4"><b>Catalogo de Periodos</b></h1>

        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-6"><b>Catalogo de Periodos</b></div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('periodos.create') }}" class="btn btn-success btn-sm">Agregar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Ciclo</th>
                            <th>Asignatura</th>
                            <th>Periodo Cerrado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                            <tr>
                                <td>{{ $row->periodo_ciclo }}</td>
                                <td>{{ $row->periodo_asignatura }}</td>
                                <td>{{ $row->periodo_cerrado }}</td>
                                <td>
                                    <form method="post" action="{{ route('periodos.destroy', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('periodos.show', $row->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('periodos.edit', $row->id) }}" class="btn btn-warning btn-sm">Editar</a>
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

