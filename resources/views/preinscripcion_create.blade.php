@extends('master')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="container-fluid">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Preinscripción</b></h1>
    <h5 class="text-center">Recuerda subir tus documentos para tener tu expediente completo</h5>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><b>Preinscripción</b></div>
                        <div class="col-md-6">
                            <a href="{{ route('digitalizacion.index') }}" class="btn btn-success btn-sm float-end">Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('preinscripcion.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="constancia_estudio" class="form-label">Constancia de Estudio</label>
                            <input type="file" class="form-control" id="constancia_estudio" name="constancia_estudio" accept="application/pdf">
                            @error('constancia_estudio')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="examen_diagnostico" class="form-label">Examen Diagnóstico</label>
                            <input type="file" class="form-control" id="examen_diagnostico" name="examen_diagnostico" accept="application/pdf">
                            @error('examen_diagnostico')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="comprobante_pago" class="form-label">Comprobante de Pago</label>
                            <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago" accept="application/pdf">
                            @error('comprobante_pago')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @error('foto')
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
        </div>
    </div>
</div>

@endsection