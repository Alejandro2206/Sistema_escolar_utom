@extends('master')

@section('content')
<div class="container-fluid">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Titulo Tsu</b></h1>
    <h5 class="text-center">Recuerda subir tus documentos para tener tu expediente completo</h5>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><b>Titulo Tsu</b></div>
                        <div class="col-md-6">
                            <a href="{{ route('digitalizacion.index') }}" class="btn btn-success btn-sm float-end">Volver</a>
                        </div>
                    </div>
                </div>
    <div class="card-body">
        <form action="{{ route('titulotsu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="comprobante_pago" class="form-label">Comprobante de Pago</label>
                <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago" accept="application/pdf">
                @error('comprobante_pago')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="liberacion_servicio" class="form-label">Liberacion de Servicio</label>
                <input type="file" class="form-control" id="liberacion_servicio" name="liberacion_servicio" accept="application/pdf">
                @error('liberacion_servicio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="reporte_tecnico" class="form-label">Reporte Tecnico</label>
                <input type="file" class="form-control" id="reporte_tecnico" name="reporte_tecnico" accept="application/pdf">
                @error('reporte_tecnico')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fotografias" class="form-label">Fotografias</label>
                <input type="file" class="form-control" id="fotografias" name="fotografias" accept="image/*">
                @error('fotografias')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                    <input type="hidden" name="estudiante_id" value="{{ $estudiantes->id }}">
                    <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
</div>
@endsection