@extends('master')

@section('pantallas')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="container">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Editar Calificación</b></h1>

    <div class="card">
        <div class="card-header">
            <h4 class="mb-0"><b>Formulario de Edición de Calificación</b></h4>
        </div>
        <div class="card-body">
        <form action="{{ route('calificaciones.update', ['calificacion' => $calificacion->id]) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="estudiantes_id" class="form-label">ID del Estudiante</label>
                    <input type="text" name="estudiantes_id" class="form-control" value="{{ $calificacion->estudiantes_id }}" required>
                </div>

                <div class="mb-3">
                    <label for="ciclos_id" class="form-label">ID del Ciclo</label>
                    <input type="text" name="ciclos_id" class="form-control" value="{{ $calificacion->ciclos_id }}" required>
                </div>

                <div class="mb-3">
                    <label for="asignaturas_id" class="form-label">ID de la Asignatura</label>
                    <input type="text" name="asignaturas_id" class="form-control" value="{{ $calificacion->asignaturas_id }}" required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="parcial1" class="form-label">Parcial 1</label>
                        <input type="text" name="parcial1" class="form-control" value="{{ $calificacion->parcial1 }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="parcial2" class="form-label">Parcial 2</label>
                        <input type="text" name="parcial2" class="form-control" value="{{ $calificacion->parcial2 }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="parcial3" class="form-label">Parcial 3</label>
                        <input type="text" name="parcial3" class="form-control" value="{{ $calificacion->parcial3 }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="extraordinario" class="form-label">Extraordinario</label>
                        <input type="text" name="extraordinario" class="form-control" value="{{ $calificacion->extraordinario }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="ultima_asignatura" class="form-label">Última Asignatura</label>
                        <input type="text" name="ultima_asignatura" class="form-control" value="{{ $calificacion->ultima_asignatura }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="final" class="form-label">Calificación Final</label>
                        <input type="text" name="final" class="form-control" value="{{ $calificacion->final }}" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ route('calificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
