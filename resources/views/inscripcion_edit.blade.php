@extends('master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Editar Inscripcion</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('inscripcion.update', $inscripcion->id) }}" 
        method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Matricula</label>
				<div class="col-sm-10">
					<input type="text" name="matricula" class="form-control" value="{{ $inscripcion->matricula }}" />
				</div>
			</div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nombre</label>
				<div class="col-sm-10">
					<input type="text" name="nombre" class="form-control" value="{{ $inscripcion->nombre }}" />
				</div>
			</div>
            <div class="mb-3">
                <label for="curp_original" class="form-label">Curp Original</label>
                <input type="file" class="form-control" id="curp_original" name="curp_original" accept="application/pdf">
                @if ($inscripcion->curp_original)
                <div class="mt-2">
                    <a href="{{ asset('docuinscripcion/' . $inscripcion->curp_original) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('curp_original')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comprobante_domicilio" class="form-label">Comprobante de Domicilio</label>
                <input type="file" class="form-control" id="comprobante_domicilio" name="comprobante_domicilio" accept="application/pdf">
                @if ($inscripcion->comprobante_domicilio)
                <div class="mt-2">
                    <a href="{{ asset('docuinscripcion/' . $inscripcion->comprobante_domicilio) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('comprobante_domicilio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="certificado_bachillerato" class="form-label">Certificado de Bachillerato</label>
                <input type="file" class="form-control" id="certificado_bachillerato" name="certificado_bachillerato" accept="application/pdf">
                @if ($inscripcion->certificado_bachillerato)
                <div class="mt-2">
                    <a href="{{ asset('docuinscripcion/' . $inscripcion->certificado_bachillerato) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('certificado_bachillerato')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
            <label for="acta_nacimiento" class="form-label">Certificado de Bachillerato</label>
                <input type="file" class="form-control" id="acta_nacimiento" name="acta_nacimiento" accept="application/pdf">
                @if ($inscripcion->acta_nacimiento)
                <div class="mt-2">
                    <a href="{{ asset('docuinscripcion/' . $inscripcion->acta_nacimiento) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('acta_nacimiento')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection