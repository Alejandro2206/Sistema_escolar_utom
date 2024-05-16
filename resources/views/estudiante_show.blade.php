@extends('master')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<h1 class="text-primary mt-3 mb-4 text-center"><b>Detalles del Estudiante</b></h1>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6"><b>Detalles del Estudiante</b></div>
            <div class="col-md-6">
                <a href="{{ route('estudiantes.index') }}" class="btn btn-primary btn-sm float-end">Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <!-- Primera Columna -->
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>ID del Estudiante</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->id }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Matrícula</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_matricula }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Carrera</b></label>
                    <div class="col-sm-6">
                        @if ($estudiante->carreras)
                        {{$estudiante->carreras-> carrera_actual}} {{$estudiante->carreras-> carrera_descripcion}}
                        @else
                        Sin carrera asignada
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Cuatrimestre</b></label>
                    <div class="col-sm-6">
                        @if ($estudiante->cuatrimestres)
                        {{ $estudiante->cuatrimestres->cuatrimestre_nombre}}
                        @else
                        Sin cuatrimestre asignado
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Estatus</b></label>
                    <div class="col-sm-6">
                        @php
                        $estatusColor = '';
                        switch ($estudiante->estudiante_status) {
                        case 'Activo':
                        $estatusColor = 'text-success';
                        break;
                        case 'Baja Temporal':
                        $estatusColor = 'text-warning';
                        break;
                        case 'Baja Permanente':
                        $estatusColor = 'text-danger';
                        break;
                        default:
                        $estatusColor = '';
                        break;
                        }
                        @endphp
                        <span class="{{ $estatusColor }}">{{ $estudiante->estudiante_status }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Nombre</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_nombre }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Apellido Paterno</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_apellido_paterno }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Apellido Materno</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_apellido_materno }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Nombre Completo</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_nombre_completo }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Edad</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_edad }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Estado de Nacimiento</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_estado_nacimiento }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Municipio de Nacimiento</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_municipio_nacimiento }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Localidad de Nacimiento</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_localidad_nacimiento }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Fecha de Nacimiento</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_fecha_nacimiento }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Género</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_genero }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Estado Civil</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_estado_civil }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Personas que Dependen de Ti</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_personas_depende_de_ti }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Tipo Sanguíneo</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_tipo_sanguineo }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Número Social</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_numero_social }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Enfermedad Crónica</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_enfermedad_cronica }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Cual Enfermedad</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_cual_enfermedad }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Discapacidades</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_discapacidades }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Instancia Médica</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_instancia_medica }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Lengua Indígena</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_lengua_indigena }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Trabajas Actualmente</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_trabajas_actualmente }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Donde Trabajas</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_donde_trabajas }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Tutor</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_tutor }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Teléfono del Tutor</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_telefono_tutor }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Segunda Columna -->
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Calle</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_calle }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Número</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_numero }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Código Postal</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_codigo_postal }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Colonia Actual</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_colonia_actual }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Localidad Actual</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_localidad_actual }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Municipio Actual</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_municipio_actual }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Estado Actual</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_estado_actual }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Teléfono</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_telefono }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Celular</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_celular }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Correo Electrónico</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_email }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Escuela de Egreso</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_escuela_egreso }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Estado</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_estado }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Municipio</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_municipio }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Localidad</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_localidad }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Año de Inicio de Bachillerato</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_año_inicio_bachillerato }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Año de Finalización de Bachillerato</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_año_final_bachillerato }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Perfil de Egreso</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_perfil_egreso }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Especialidad de Bachillerato</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_especialidad_bachillerato }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>Promedio de Bachillerato</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_promedio_bachillerato }}
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label"><b>CURP</b></label>
                    <div class="col-sm-6">
                        {{ $estudiante->estudiante_curp }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')