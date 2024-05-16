@extends('master')

@section('content')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Editar Periodo</b></h1>

<div class="card">
    <div class="card-header">Editar Periodo</div>
    <div class="card-body">
        <form method="post" action="{{ route('periodos.update', $periodo->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Ciclo:</label>
                <div class="col-sm-10">
                    <input type="text" name="periodo_ciclo" class="form-control" value="{{ $periodo->periodo_ciclo }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Asignatura:</label>
                <div class="col-sm-10">
                    <input type="text" name="periodo_asignatura" class="form-control" value="{{ $periodo->periodo_asignatura}}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Periodo Cerrado:</label>
                <div class="col-sm-10">
                    <input type="text" name="periodo_cerrado" class="form-control" value="{{ $periodo->periodo_cerrado}}" />
                </div>
            </div>
            <div class="text-center">

                <input type="submit" class="btn btn-primary" value="Editar Periodo" />
                <a href="{{ route('periodos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection('content')