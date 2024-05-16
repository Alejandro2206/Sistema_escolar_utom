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
    <div class="card-header">Agregar Cuatrimestre</div>
    <div class="card-body">
        <form method="post" action="{{ route('cuatrimestres.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" name="cuatrimestre_nombre" class="form-control" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Fecha de Inicio</label>
                <div class="col-sm-10">
                    <input type="date" name="cuatrimestre_fecha_inicio" class="form-control" required />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Fecha de Término</label>
                <div class="col-sm-10">
                    <input type="date" name="cuatrimestre_fecha_termino" class="form-control" required />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Agregar" />
                <a href="{{ route('cuatrimestres.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>    
        </form>
    </div>
</div>

@endsection
