@extends('master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Editar Preinscripción</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('preinscripcion.update', $preinscripcion->id) }}" 
        method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nombre</label>
				<div class="col-sm-10">
					<input type="text" name="nombre" class="form-control" value="{{ $preinscripcion->nombre }}" />
				</div>
			</div>
            <div class="mb-3">
                <label for="constancia_estudio" class="form-label">Constancia de Estudio</label>
                <input type="file" class="form-control" id="constancia_estudio" name="constancia_estudio" accept="application/pdf">
                @if ($preinscripcion->constancia_estudio)
                <div class="mt-2">
                    <a href="{{ asset('documentos/' . $preinscripcion->constancia_estudio) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('constancia_estudio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="examen_diagnostico" class="form-label">Examen Diagnóstico</label>
                <input type="file" class="form-control" id="examen_diagnostico" name="examen_diagnostico" accept="application/pdf">
                @if ($preinscripcion->examen_diagnostico)
                <div class="mt-2">
                    <a href="{{ asset('documentos/' . $preinscripcion->examen_diagnostico) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('examen_diagnostico')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comprobante_pago" class="form-label">Comprobante de Pago</label>
                <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago" accept="application/pdf">
                @if ($preinscripcion->comprobante_pago)
                <div class="mt-2">
                    <a href="{{ asset('documentos/' . $preinscripcion->comprobante_pago) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('comprobante_pago')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                @if ($preinscripcion->foto)
                <div class="mt-2">
                    <img src="{{ asset('images/' . $preinscripcion->foto) }}" alt="Foto" style="max-width: 200px;">
                </div>
                @endif
                @error('foto')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
