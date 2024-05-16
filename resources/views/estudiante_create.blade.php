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

<h1 class="text-primary mt-3 mb-4 text-center"><b>Agregar Estudiante</b></h1>

<div class="card">
    <div class="card-header">Agregar Estudiante</div>
    <div class="card-body">
        <form method="post" action="{{ route('estudiantes.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Matrícula</label>
                    <input type="text" name="estudiante_matricula" class="form-control" value="{{ old('estudiante_matricula') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Nombre de Estudiante</label>
                    <input type="text" name="estudiante_nombre" class="form-control" value="{{ old('estudiante_nombre') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Apellido Paterno</label>
                    <input type="text" name="estudiante_apellido_paterno" class="form-control" value="{{ old('estudiante_apellido_paterno') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Apellido Materno</label>
                    <input type="text" name="estudiante_apellido_materno" class="form-control" value="{{ old('estudiante_apellido_materno') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Carrera</label>
                    <select name="carrera_descripcion" class="form-control">
                        <option value="">Seleccione una carrera</option>
                        @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ old('carrera_descripcion') == $carrera->id ? 'selected' : '' }}>{{ $carrera->carrera_actual }} {{ $carrera->carrera_descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Cuatrimestre</label>
                    <select name="cuatrimestre_nombre" class="form-control">
                        <option value="">Seleccione un cuatrimestre</option>
                        @foreach($cuatrimestres as $cuatrimestre)
                        <option value="{{ $cuatrimestre->id }}" {{ old('cuatrimestre_nombre') == $cuatrimestre->id ? 'selected' : '' }}>{{ $cuatrimestre->cuatrimestre_nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Estatus</label>
                    <select name="estudiante_status" class="form-select">
                        <option value="">Seleccione un estatus</option>
                        <option value="Activo" {{ old('estudiante_status') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Baja Temporal" {{ old('estudiante_status') == 'Baja Temporal' ? 'selected' : '' }}>Baja Temporal</option>
                        <option value="Baja Permanente" {{ old('estudiante_status') == 'Baja Permanente' ? 'selected' : '' }}>Baja Permanente</option>
                    </select>
                </div>
               

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Nombre Completo</label>
                    <input type="text" name="estudiante_nombre_completo" class="form-control" value="{{ old('estudiante_nombre_completo') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Edad</label>
                    <input type="text" name="estudiante_edad" class="form-control" value="{{ old('estudiante_edad') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Estado de Nacimiento</label>
                    <input type="text" name="estudiante_estado_nacimiento" class="form-control" value="{{ old('estudiante_estado_nacimiento') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Municipio de Nacimiento</label>
                    <input type="text" name="estudiante_municipio_nacimiento" class="form-control" value="{{ old('estudiante_municipio_nacimiento') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Localidad de Nacimiento</label>
                    <input type="text" name="estudiante_localidad_nacimiento" class="form-control" value="{{ old('estudiante_localidad_nacimiento') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Fecha de Nacimiento</label>
                    <input type="date" name="estudiante_fecha_nacimiento" class="form-control" value="{{ old('estudiante_fecha_nacimiento') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Género</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_genero" value="Masculino" {{ old('estudiante_genero') == 'Masculino' ? 'checked' : '' }}>

                        <label class="form-check-label">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_genero" value="Femenino" {{ old('estudiante_genero') == 'Femenino' ? 'checked' : '' }}>
                        <label class="form-check-label">Femenino</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Estado Civil</label>
                    <select name="estudiante_estado_civil" class="form-select">
                        <option value="">Seleccione un estado civil</option>
                        <option value="Soltero/a" {{ old('estudiante_estado_civil') == 'Soltero/a' ? 'selected' : '' }}>Soltero/a</option>
                        <option value="Casado/a" {{ old('estudiante_estado_civil') == 'Casado/a' ? 'selected' : '' }}>Casado/a</option>
                        <option value="Separado/a" {{ old('estudiante_estado_civil') == 'Separado/a' ? 'selected' : '' }}>Separado/a</option>
                        <option value="Divorciado/a" {{ old('estudiante_estado_civil') == 'Divorciado/a' ? 'selected' : '' }}>Divorciado/a</option>
                        <option value="Viudo/a" {{ old('estudiante_estado_civil') == 'Viudo/a' ? 'selected' : '' }}>Viudo/a</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Personas que dependen de ti</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_personas_depende_de_ti" value="Hijos" {{ old('estudiante_personas_depende_de_ti') == 'Hijos' ? 'checked' : '' }}>
                        <label class="form-check-label">Hijos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_personas_depende_de_ti" value="Padres" {{ old('estudiante_personas_depende_de_ti') == 'Padres' ? 'checked' : '' }}>
                        <label class="form-check-label">Padres</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="estudiante_personas_depende_de_ti" value="Otro" {{ old('estudiante_personas_depende_de_ti') == 'Otro' ? 'checked' : '' }}>
                        <label class="form-check-label">Otro</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">¿Quiénes?</label>
                    <input type="text" name="estudiante_quienes" class="form-control" value="{{ old('estudiante_quienes') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Tipo Sanguíneo</label>
                    <input type="text" name="estudiante_tipo_sanguineo" class="form-control" value="{{ old('estudiante_tipo_sanguineo') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Número Social</label>
                    <input type="text" name="estudiante_numero_social" class="form-control" value="{{ old('estudiante_numero_social') }}" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Enfermedad Crónica</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_enfermedad_cronica" value="Si" {{ old('estudiante_enfermedad_cronica') == 'Si' ? 'checked' : '' }}>
                        <label class="form-check-label">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_enfermedad_cronica" value="No" {{ old('estudiante_enfermedad_cronica') == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">¿Cuál?</label>
                    <input type="text" name="estudiante_cual_enfermedad" class="form-control" value="{{ old('estudiante_cual_enfermedad') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Discapacidades</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_discapacidades" id="motriz" value="Motriz" {{ old('estudiante_discapacidades') == 'Motriz' ? 'checked' : '' }}>
                        <label class="form-check-label" for="motriz">Motriz</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_discapacidades" id="visual" value="Visual" {{ old('estudiante_discapacidades') == 'Visual' ? 'checked' : '' }}>
                        <label class="form-check-label" for="visual">Visual</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_discapacidades" id="auditiva" value="Auditiva" {{ old('estudiante_discapacidades') == 'Auditiva' ? 'checked' : '' }}>
                        <label class="form-check-label" for="auditiva">Auditiva</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Instancia médica que le atiende</label>
                    <input type="text" name="estudiante_instancia_medica" class="form-control" value="{{ old('estudiante_instancia_medica') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Hablas alguna lengua indígena</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_habla_lengua_indigena" value="Si" {{ old('estudiante_habla_lengua_indigena') == 'Si' ? 'checked' : '' }}>
                        <label class="form-check-label">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_habla_lengua_indigena" value="No" {{ old('estudiante_habla_lengua_indigena') == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">¿Trabajas Actualmente?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_trabajas_actualmente" value="Si" {{ old('estudiante_trabajas_actualmente') == 'Si' ? 'checked' : '' }}>
                        <label class="form-check-label">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudiante_trabajas_actualmente" value="No" {{ old('estudiante_trabajas_actualmente') == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">¿Dónde?</label>
                    <input type="text" name="estudiante_donde_trabajas" class="form-control" value="{{ old('estudiante_donde_trabajas') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Tutor</label>
                    <input type="text" name="estudiante_tutor" class="form-control" value="{{ old('estudiante_tutor') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Teléfono del Tutor</label>
                    <input type="tel" name="estudiante_telefono_tutor" class="form-control" value="{{ old('estudiante_telefono_tutor') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Calle</label>
                    <input type="text" name="estudiante_calle" class="form-control" value="{{ old('estudiante_calle') }}" />
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Número</label>
                    <input type="text" name="estudiante_numero" class="form-control" value="{{ old('estudiante_numero') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Código Postal</label>
                    <input type="text" name="estudiante_codigo_postal" class="form-control" value="{{ old('estudiante_codigo_postal') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Colonia Actual</label>
                    <input type="text" name="estudiante_colonia_actual" class="form-control" value="{{ old('estudiante_colonia_actual') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Localidad Actual</label>
                    <input type="text" name="estudiante_localidad_actual" class="form-control" value="{{ old('estudiante_localidad_actual') }}" />
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Municipio Actual</label>
                    <input type="text" name="estudiante_municipio_actual" class="form-control" value="{{ old('estudiante_municipio_actual') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Estado Actual</label>
                    <input type="text" name="estudiante_estado_actual" class="form-control" value="{{ old('estudiante_estado_actual') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Teléfono</label>
                    <input type="tel" name="estudiante_telefono" class="form-control" value="{{ old('estudiante_telefono') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Celular</label>
                    <input type="tel" name="estudiante_celular" class="form-control" value="{{ old('estudiante_celular') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Email</label>
                    <input type="text" name="estudiante_email" class="form-control" value="{{ old('estudiante_email') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Escuela de Egreso</label>
                    <input type="text" name="estudiante_escuela_egreso" class="form-control" value="{{ old('estudiante_escuela_egreso') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Estado</label>
                    <input type="text" name="estudiante_estado" class="form-control" value="{{ old('estudiante_estado') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Municipio</label>
                    <input type="text" name="estudiante_municipio" class="form-control" value="{{ old('estudiante_municipio') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Localidad</label>
                    <input type="text" name="estudiante_localidad" class="form-control" value="{{ old('estudiante_localidad') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Año de Inicio de Bachillerato</label>
                    <input type="text" name="estudiante_año_inicio_bachillerato" class="form-control" value="{{ old('estudiante_año_inicio_bachillerato') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Año de Finalización de Bachillerato</label>
                    <input type="text" name="estudiante_año_final_bachillerato" class="form-control" value="{{ old('estudiante_año_final_bachillerato') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Perfil de Egreso</label>
                    <input type="text" name="estudiante_perfil_egreso" class="form-control" value="{{ old('estudiante_perfil_egreso') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">Especialidad de Bachillerato</label>
                    <input type="text" name="estudiante_especialidad_bachillerato" class="form-control" value="{{ old('estudiante_especialidad_bachillerato') }}" />
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Promedio de Bachillerato</label>
                    <input type="text" name="estudiante_promedio_bachillerato" class="form-control" value="{{ old('estudiante_promedio_bachillerato') }}" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label class="col-form-label">CURP</label>
                    <input type="text" name="estudiante_curp" class="form-control" value="{{ old('estudiante_curp') }}" />
                </div>
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Agregar" />
                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Obtener todos los campos de entrada dentro del formulario
        var inputFields = $('form input[type="text"]');

        // Asignar el evento keydown a cada campo de entrada
        inputFields.on('keydown', function(event) {
            if (event.key === 'Enter') {
                // Obtener el índice del campo de entrada actual
                var currentIndex = inputFields.index(this);

                // Obtener el índice del siguiente campo de entrada
                var nextIndex = currentIndex + 1;

                // Verificar si el siguiente campo de entrada existe
                if (nextIndex < inputFields.length) {
                    // Establecer el foco en el siguiente campo de entrada
                    inputFields.eq(nextIndex).focus();
                } else {
                    // Si el siguiente campo no existe, enviar el formulario
                    $('form').submit();
                }

                // Prevenir el comportamiento predeterminado de "Enter" (enviar el formulario)
                event.preventDefault();
            }
        });
    });
</script>
@endsection