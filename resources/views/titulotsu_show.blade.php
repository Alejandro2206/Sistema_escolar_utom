@extends('master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Detalles de Titulo Tsu</h4>
    </div>
    <div class="card-body">
        <ul>
            <li>
                <strong>Comprobante de Pago:</strong>
                @if ($titulotsu->comprobante_pago)
                <a href="{{ asset('docutitulotsu/' . $titulotsu->comprobante_pago) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>liberacion de Servicio:</strong>
                @if ($titulotsu->liberacion_servicio)
                <a href="{{ asset('docutitulotsu/' . $titulotsu->liberacion_servicio) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Reporte Tecnico:</strong>
                @if ($titulotsu->reporte_tecnico)
                <a href="{{ asset('docutitulotsu/' . $titulotsu->reporte_tecnico) }}" target="_blank">Ver documento</a>
                @else
                No se ha cargado ningún documento.
                @endif
            </li>
            <li>
                <strong>Fotografias:</strong>
                @if ($titulotsu->fotografias)
                <img src="{{ asset('images/' . $titulotsu->fotografias) }}" alt="fotografias" style="max-width: 200px;">
                @else
                No se ha cargado ninguna foto.
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection