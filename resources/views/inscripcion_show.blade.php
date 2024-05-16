@extends('master')

@section('content')
<h1 class="text-primary mt-3 mb-4 text-center"><b>Detalles del Inscripción</b></h1>
<div class="card">
    <div class="card-header">
    <div class="row">
            <div class="col-md-6"><b>Detalles del Inscripción</b></div>
            <div class="col-md-6">
                <a href="{{ route('digitalizacion.index') }}" class="btn btn-primary btn-sm float-end">Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul>
            <li>
                <strong>Curp Original:</strong>
                @if ($inscripcion->curp_original)
                <a href="{{ asset('docuinscripcion/' . $inscripcion->curp_original) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Comprobante de domicilio:</strong>
                @if ($inscripcion->comprobante_domicilio)
                <a href="{{ asset('docuinscripcion/' . $inscripcion->comprobante_domicilio) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Certificado de Bachillerato:</strong>
                @if ($inscripcion->certificado_bachillerato)
                <a href="{{ asset('docuinscripcion/' . $inscripcion->certificado_bachillerato) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Acta de Nacimiento:</strong>
                @if ($inscripcion->acta_nacimiento)
                <a href="{{ asset('docuinscripcion/' . $inscripcion->acta_nacimiento) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection
