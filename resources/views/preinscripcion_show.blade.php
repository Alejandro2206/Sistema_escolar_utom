@extends('master')

@section('content')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Detalles del Preinscripcion</b></h1>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6"><b>Detalles del Preinscripcion</b></div>
            <div class="col-md-6">
                <a href="{{ route('digitalizacion.index') }}" class="btn btn-primary btn-sm float-end">Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul>
            <li>
                <strong>Constancia de Estudio:</strong>
                @if ($preinscripcion->constancia_estudio)
                <a href="{{ asset( $preinscripcion->constancia_estudio) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Examen Diagnóstico:</strong>
                @if ($preinscripcion->examen_diagnostico)
                <a href="{{ asset( $preinscripcion->examen_diagnostico) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Comprobante de Pago:</strong>
                @if ($preinscripcion->comprobante_pago)
                <a href="{{ asset( $preinscripcion->comprobante_pago) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Foto:</strong>
                @if ($preinscripcion->foto)
                <img src="{{ asset( $preinscripcion->foto) }}" alt="Foto" style="max-width: 200px;">
                @else
                No se ha cargado ninguna foto.
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection
