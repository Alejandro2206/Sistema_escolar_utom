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
    <div class="card-header">Add Constancia</div>
    <div class="card-body">
        <form method="post" action="{{ route('constancias.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Apellido Paterno</label>
                <div class="col-sm-10">
                    <input type="text" name="apellido_paterno" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Apellido Materno</label>
                <div class="col-sm-10">
                    <input type="text" name="apellido_materno" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Cuatrimestre</label>
                <div class="col-sm-10">
                    <input type="text" name="cuatrimestre" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Carrera</label>
                <div class="col-sm-10">
                    <input type="text" name="carrera" class="form-control" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>    
        </form>
    </div>
</div>

@endsection