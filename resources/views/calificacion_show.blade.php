@extends('master')

@section('pantallas')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Detalles de Calificación</b></div>
            <div class="col col-md-6">
                <a href="{{ route('calificaciones.index') }}" class="btn btn-primary btn-sm float-end">Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="id_estudiantes" class="form-label">Estudiante</label>
            @if($calificacion->estudiante)
            <input type="text" class="form-control" value="{{ $calificacion->estudiante->estudiante_nombre_completo }}" readonly>
            @else
            <input type="text" class="form-control" value="Alejandro Camacho Vázquez" readonly>
            @endif
        </div>

        <div class="mb-3">
            <label for="id_estudiantes" class="form-label">Carrera</label>
            @if($calificacion->estudiante && $calificacion->estudiante->carrera)
           @else
            <input type="text" class="form-control" value="ING. Desarrollo y Gestión De Software" readonly>
            @endif
        </div>

        <div class="mb-3">
            <label for="id_estudiantes" class="form-label">Cuatrimestre</label>
            @if($calificacion->estudiante && $calificacion->estudiante->cuatrimestre)
            <input type="text" class="form-control" value="{{ $calificacion->estudiante->cuatrimestre->cuatrimestre_nombre }}" readonly>
            @else
            <input type="text" class="form-control" value="10° Cuatrimestre" readonly>
            @endif
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Asignatura</b></label>
            <div class="col-sm-10">
                {{ $calificacion->asignatura ? $calificacion->asignatura->nombre_de_la_asignatura : 'Desarrollo Web Integral' }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Parcial 1</b></label>
            <div class="col-sm-10">
                {{ $calificacion->parcial1 }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Parcial 2</b></label>
            <div class="col-sm-10">
                {{ $calificacion->parcial2 }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Parcial 3</b></label>
            <div class="col-sm-10">
                {{ $calificacion->parcial3 }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Final</b></label>
            <div class="col-sm-10">
                {{ $calificacion->final }}
            </div>
        </div>
    </div>
</div>



@endsection
