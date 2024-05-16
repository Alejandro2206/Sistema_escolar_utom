@extends('master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Editar Titulo Tsu</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('titulotsu.update', $titulotsu->id) }}" 
        method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Matricula</label>
				<div class="col-sm-10">
					<input type="text" name="matricula" class="form-control" value="{{ $titulotsu->matricula }}" />
				</div>
			</div>
            <div class=" mb-3">
                <label class="col-sm-2 col-label-form">Nombre</label>
				<div class="col-sm-10">
					<input type="text" name="nombre" class="form-control" value="{{ $titulotsu->nombre }}" />
				</div>
			</div>
            <div class="mb-3">
                <label for="comprobante_pago" class="form-label">Comprobante de Pago</label>
                <input type="file" class="form-control" id="comprobante_pago" name="comprobante_pago" accept="application/pdf">
                @if ($titulotsu->comprobante_pago)
                <div class="mt-2">
                    <a href="{{ asset('docutitulotsu/' . $titulotsu->comprobante_pago) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('comprobante_pago')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="liberacion_servicio" class="form-label">Liberacion de Servicio</label>
                <input type="file" class="form-control" id="liberacion_servicio" name="liberacion_servicio" accept="application/pdf">
                @if ($titulotsu->liberacion_servicio)
                <div class="mt-2">
                    <a href="{{ asset('docutitulotsu/' . $titulotsu->liberacion_servicio) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('liberacion_servicio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="reporte_tecnico" class="form-label">Reporte Tecnico</label>
                <input type="file" class="form-control" id="reporte_tecnico" name="reporte_tecnico" accept="application/pdf">
                @if ($titulotsu->reporte_tecnico)
                <div class="mt-2">
                    <a href="{{ asset('docutitulotsu/' . $titulotsu->reporte_tecnico) }}" target="_blank">Ver documento actual</a>
                </div>
                @endif
                @error('reporte_tecnico')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fotografias" class="form-label">Fotografias</label>
                <input type="file" class="form-control" id="fotografias" name="fotografias" accept="image/*">
                @if ($titulotsu->fotografias)
                <div class="mt-2">
                    <img src="{{ asset('images/' . $titulotsu->fotografias) }}" alt="fotografias" style="max-width: 200px;">
                </div>
                @endif
                @error('fotografias')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection