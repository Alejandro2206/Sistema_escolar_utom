@extends('master')

@section('pantallas')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Detalles de Periodo</b></div>
            <div class="col col-md-6">
                <a href="{{ route('periodos.index') }}" class="btn btn-primary btn-sm float-end">Ver todo</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Id</b></label>
            <div class="col-sm-10">
                {{ $periodo->id }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Ciclo</b></label>
            <div class="col-sm-10">
                {{ $periodo->periodo_ciclo}}
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Asignatura</b></label>
                <div class="col-sm-10">
                    {{ $periodo->periodo_asignatura}}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Periodo Cerrado</b></label>
                <div class="col-sm-10">
                    {{ $periodo->periodo_cerrado}}
                </div>
            </div>
        </div>
    </div>

    @endsection('pantallas')