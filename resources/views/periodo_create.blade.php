@extends('master')

@section('pantallas')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Agregar Periodo</b></div>
            <div class="col col-md-6">
                <a href="{{ route('periodos.index') }}" class="btn btn-primary btn-sm float-end">Cancelar</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('periodos.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Ciclo</label>
                <div class="col-sm-10">
                    <input type="text" name="periodo_ciclo" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Asignatura</label>
                <div class="col-sm-10">
                    <input type="text" name="periodo_asignatura" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Periodo Cerrado</label>
                <div class="col-sm-10">
                    <input type="text" name="periodo_cerrado" class="form-control" />
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="{{ route('periodos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection('pantallas')