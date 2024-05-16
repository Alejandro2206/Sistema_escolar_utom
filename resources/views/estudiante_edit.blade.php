@extends('master')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1 class="text-primary mt-3 mb-4 text-center"><b>Editar Estudiante</b></h1>

<div class="card">
    <div class="card-header">Editar Estudiante</div>
    <div class="card-body">
        <form method="post" action="{{ route('estudiantes.update', $estudiante->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Matrícula</label>
                    <input type="text" name="estudiante_matricula" class="form-control" value="{{ $estudiante->estudiante_matricula }}" />
                </div>

                <div class="col-sm-6">
                    <label class="col-form-label">Carrera</label>
                    <select name="id_carreras" class="form-control">
                        <option value="">Seleccione una carrera</option>
                        @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" @if($carrera->id == $estudiante->id_carreras) selected @endif>{{ $carrera->carrera_actual }} {{ $carrera->carrera_descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Cuatrimestre</label>
                    <select name="id_cuatrimestres" class="form-control">
                        <option value="">Seleccione un cuatrimestre</option>
                        @foreach($cuatrimestres as $cuatrimestre)
                        <option value="{{ $cuatrimestre->id }}" @if($cuatrimestre->id == $estudiante->id_cuatrimestres) selected @endif>{{ $cuatrimestre->cuatrimestre_nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Estatus</label>
                    <select name="estudiante_status" class="form-select">
                        <option value="Activo" @if($estudiante->estudiante_status == "Activo") selected @endif>Activo</option>
                        <option value="Baja Temporal" @if($estudiante->estudiante_status == "Baja Temporal") selected @endif>Baja Temporal</option>
                        <option value="Baja Permanente" @if($estudiante->estudiante_status == "Baja Permanente") selected @endif>Baja Permanente</option>
                      
                    </select>
                </div>
            </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Nombre de Estudiante</label>
                    <input type="text" name="estudiante_nombre" class="form-control" value="{{ $estudiante->estudiante_nombre }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Apellido Paterno</label>
                    <input type="text" name="estudiante_apellido_paterno" class="form-control" value="{{ $estudiante->estudiante_apellido_paterno }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Apellido Materno</label>
                    <input type="text" name="estudiante_apellido_materno" class="form-control" value="{{ $estudiante->estudiante_apellido_materno }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Nombre Completo</label>
                    <input type="text" name="estudiante_nombre_completo" class="form-control" value="{{ $estudiante->estudiante_nombre_completo }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Edad</label>
                    <input type="text" name="estudiante_edad" class="form-control" value="{{ $estudiante->estudiante_edad }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Estado de Nacimiento</label>
                    <input type="text" name="estudiante_estado_nacimiento" class="form-control" value="{{ $estudiante->estudiante_estado_nacimiento }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Municipio de Nacimiento</label>
                    <input type="text" name="estudiante_municipio_nacimiento" class="form-control" value="{{ $estudiante->estudiante_municipio_nacimiento }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Localidad de Nacimiento</label>
                    <input type="text" name="estudiante_localidad_nacimiento" class="form-control" value="{{ $estudiante->estudiante_localidad_nacimiento }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Fecha de Nacimiento</label>
                    <input type="text" name="estudiante_fecha_nacimiento" class="form-control" value="{{ $estudiante->estudiante_fecha_nacimiento }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Género</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_genero" value="Masculino" @if($estudiante->estudiante_genero == "Masculino") checked @endif>
                        <label class="form-check-label">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_genero" value="Femenino" @if($estudiante->estudiante_genero == "Femenino") checked @endif>
                        <label class="form-check-label">Femenino</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Estado Civil</label>
                    <select name="estudiante_estado_civil" class="form-select">
                        <option value="Soltero/a" @if($estudiante->estudiante_estado_civil == "Soltero/a") selected @endif>Soltero/a</option>
                        <option value="Casado/a" @if($estudiante->estudiante_estado_civil == "Casado/a") selected @endif>Casado/a</option>
                        <option value="Separado/a" @if($estudiante->estudiante_estado_civil == "Separado/a") selected @endif>Separado/a</option>
                        <option value="Divorciado/a" @if($estudiante->estudiante_estado_civil == "Divorciado/a") selected @endif>Divorciado/a</option>
                        <option value="Viudo/a" @if($estudiante->estudiante_estado_civil == "Viudo/a") selected @endif>Viudo/a</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Personas que dependen de ti</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_personas_depende_de_ti" value="Hijos" @if($estudiante->estudiante_personas_depende_de_ti == "Hijos") checked @endif>
                        <label class="form-check-label">Hijos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_personas_depende_de_ti" value="Padres" @if($estudiante->estudiante_personas_depende_de_ti == "Padres") checked @endif>
                        <label class="form-check-label">Padres</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_personas_depende_de_ti" value="Otro" @if($estudiante->estudiante_personas_depende_de_ti == "Otro") checked @endif>
                        <label class="form-check-label">Otro</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">¿Quiénes?</label>
                    <input type="text" name="estudiante_quienes" class="form-control" value="{{ $estudiante->estudiante_quienes }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Tipo Sanguíneo</label>
                    <input type="text" name="estudiante_tipo_sanguineo" class="form-control" value="{{ $estudiante->estudiante_tipo_sanguineo }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Número Social</label>
                    <input type="text" name="estudiante_numero_social" class="form-control" value="{{ $estudiante->estudiante_numero_social }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Enfermedad Crónica</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_enfermedad_cronica" value="Si" @if($estudiante->estudiante_enfermedad_cronica == "Si") checked @endif>
                        <label class="form-check-label">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_enfermedad_cronica" value="No" @if($estudiante->estudiante_enfermedad_cronica == "No") checked @endif>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">¿Cuál?</label>
                    <input type="text" name="estudiante_cual_enfermedad" class="form-control" value="{{ $estudiante->estudiante_cual_enfermedad }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Discapacidades</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_discapacidades" id="motriz" value="Motriz" @if($estudiante->estudiante_discapacidades == "Motriz") checked @endif>
                        <label class="form-check-label" for="motriz">Motriz</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_discapacidades" id="visual" value="Visual" @if($estudiante->estudiante_discapacidades == "Visual") checked @endif>
                        <label class="form-check-label" for="visual">Visual</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_discapacidades" id="auditiva" value="Auditiva" @if($estudiante->estudiante_discapacidades == "Auditiva") checked @endif>
                        <label class="form-check-label" for="auditiva">Auditiva</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Instancia médica que le atiende</label>
                    <input type="text" name="estudiante_instancia_medica" class="form-control" value="{{ $estudiante->estudiante_instancia_medica }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Hablas alguna lengua indígena</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_lengua_indigena" value="Si" @if($estudiante->estudiante_lengua_indigena == "Si") checked @endif>
                        <label class="form-check-label">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_lengua_indigena" value="No" @if($estudiante->estudiante_lengua_indigena == "No") checked @endif>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">¿Trabajas Actualmente?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_trabajas_actualmente" value="Si" @if($estudiante->estudiante_trabajas_actualmente == "Si") checked @endif>
                        <label class="form-check-label">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_trabajas_actualmente" value="No" @if($estudiante->estudiante_trabajas_actualmente == "No") checked @endif>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">¿Dónde?</label>
                    <input type="text" name="estudiante_donde_trabajas" class="form-control" value="{{ $estudiante->estudiante_donde_trabajas }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Tutor</label>
                    <input type="text" name="estudiante_tutor" class="form-control" value="{{ $estudiante->estudiante_tutor }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Teléfono del Tutor</label>
                    <input type="text" name="estudiante_telefono_tutor" class="form-control" value="{{ $estudiante->estudiante_telefono_tutor }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Calle</label>
                    <input type="text" name="estudiante_calle" class="form-control" value="{{ $estudiante->estudiante_calle }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Número</label>
                    <input type="text" name="estudiante_numero" class="form-control" value="{{ $estudiante->estudiante_numero }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Código Postal</label>
                    <input type="text" name="estudiante_codigo_postal" class="form-control" value="{{ $estudiante->estudiante_codigo_postal }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Colonia Actual</label>
                    <input type="text" name="estudiante_colonia_actual" class="form-control" value="{{ $estudiante->estudiante_colonia_actual }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Localidad Actual</label>
                    <input type="text" name="estudiante_localidad_actual" class="form-control" value="{{ $estudiante->estudiante_localidad_actual }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Municipio Actual</label>
                    <input type="text" name="estudiante_municipio_actual" class="form-control" value="{{ $estudiante->estudiante_municipio_actual }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Estado Actual</label>
                    <input type="text" name="estudiante_estado_actual" class="form-control" value="{{ $estudiante->estudiante_estado_actual }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Teléfono</label>
                    <input type="tel" name="estudiante_telefono" class="form-control" value="{{ $estudiante->estudiante_telefono }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Celular</label>
                    <input type="tel" name="estudiante_celular" class="form-control" value="{{ $estudiante->estudiante_celular }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Email</label>
                    <input type="text" name="estudiante_email" class="form-control" value="{{ $estudiante->estudiante_email }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Escuela de Egreso</label>
                    <input type="text" name="estudiante_escuela_egreso" class="form-control" value="{{ $estudiante->estudiante_escuela_egreso }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Estado</label>
                    <input type="text" name="estudiante_estado" class="form-control" value="{{ $estudiante->estudiante_estado }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Municipio</label>
                    <input type="text" name="estudiante_municipio" class="form-control" value="{{ $estudiante->estudiante_municipio }}" />
                </div>
            </div>

            <div class="col-sm-6">
                <label class="col-form-label">Localidad Actual</label>
                <input type="text" name="estudiante_localidad_actual" class="form-control" value="{{ $estudiante->estudiante_localidad_actual }}" required />
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Año de Inicio de Bachillerato</label>
                    <input type="text" name="estudiante_año_inicio_bachillerato" class="form-control" value="{{ $estudiante->estudiante_año_inicio_bachillerato }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Año Final de Bachillerato</label>
                    <input type="text" name="estudiante_año_final_bachillerato" class="form-control" value="{{ $estudiante->estudiante_año_final_bachillerato }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Perfil de Egreso</label>
                    <input type="text" name="estudiante_perfil_egreso" class="form-control" value="{{ $estudiante->estudiante_perfil_egreso }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Especialidad de Bachillerato</label>
                    <input type="text" name="estudiante_especialidad_bachillerato" class="form-control" value="{{ $estudiante->estudiante_especialidad_bachillerato }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Promedio de Bachillerato</label>
                    <input type="text" name="estudiante_promedio_bachillerato" class="form-control" value="{{ $estudiante->estudiante_promedio_bachillerato }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">CURP</label>
                    <input type="text" name="estudiante_curp" class="form-control" value="{{ $estudiante->estudiante_curp }}" />
                </div>
            </div>


            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Actualizar" />
                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection