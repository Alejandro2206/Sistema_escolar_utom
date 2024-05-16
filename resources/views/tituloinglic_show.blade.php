@extends('master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Detalles de Titulo Ing Lic</h4>
    </div>
    <div class="card-body">
        <ul>
        
            <li>
                <strong>Comprobante de Pago:</strong>
                @if ($tituloinglic->comprobante_pago)
                <a href="{{ asset('docutituloinglic/' . $tituloinglic->comprobante_pago) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>liberacion de Servicio:</strong>
                @if ($tituloinglic->liberacion_servicio)
                <a href="{{ asset('docutituloinglic/' . $tituloinglic->liberacion_servicio) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Reporte Tecnico:</strong>
                @if ($tituloinglic->reporte_tecnico)
                <a href="{{ asset('docutituloinglic/' . $tituloinglic->reporte_tecnico) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Fotografias:</strong>
                @if ($tituloinglic->fotografias)
                <img src="{{ asset('images/' . $tituloinglic->fotografias) }}" alt="fotografias" style="max-width: 200px;">
                @else
                No se ha cargado ninguna foto.
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection