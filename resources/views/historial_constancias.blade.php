@extends('master')

@section('pantallas')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-0"><b>Historial de Constancias Generadas</b></h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <form  class="d-flex">
                    <div class="input-group">
                    <a href="{{ route('constancias.index') }}" class="btn btn-success btn-sm">Regresar</a>
                    <a href="{{ route('limpiar-historial-constancias') }}" class="btn btn-danger btn-sm ml-2">Limpiar Historial</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.Constancia</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Cuatrimestre</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody>
                @if ($constancias->count() > 0)
                @foreach ($constancias as $constancia)
                <tr>
                    <td>{{ $constancia->id }}</td>
                    <td>{{ $constancia->nombre }}</td>
                    <td>{{ $constancia->apellido_paterno }}</td>
                    <td>{{ $constancia->apellido_materno }}</td>
                    <td>{{ $constancia->cuatrimestre }}</td>
                    <td>{{ $constancia->carrera }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center">No se encontraron datos</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection