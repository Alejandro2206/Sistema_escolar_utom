@extends('master')

@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif
<div class="container-fluid">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Inscripción</b></h1>
    <h5 class="text-center">Recuerda subir tus documentos para tener tu expediente completo</h5>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><b>Inscripción</b></div>
                        <div class="col-md-6">
                            <a href="{{ route('digitalizacion.index') }}" class="btn btn-success btn-sm float-end">Volver</a>
                        </div>
                    </div>
                </div>
    <div class="card-body">
        <form action="{{ route('inscripcion.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class=" mb-3">
                <label for="curp_original" class="form-label">Curp Original</label>
                <input type="file" class="form-control" id="curp_original" name="curp_original" accept="application/pdf">
                @error('curp_original')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="comprobante_domicilio" class="form-label">Comprobante de Domicilio</label>
                <input type="file" class="form-control" id="comprobante_domicilio" name="comprobante_domicilio" accept="application/pdf">
                @error('comprobante_domicilio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="certificado_bachillerato" class="form-label">Certificado de Bachillerato</label>
                <input type="file" class="form-control" id="certificado_bachillerato" name="certificado_bachillerato" accept="application/pdf">
                @error('certificado_bachillerato')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="acta_nacimiento" class="form-label">Acta de Nacimiento</label>
                <input type="file" class="form-control" id="acta_nacimiento" name="acta_nacimiento" accept="application/pdf">
                @error('acta_nacimiento')
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

