@extends('master')

@section('pantallas')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<div class="container">
    <h1 class="text-primary mt-3 mb-4 text-center"><b>Agregar Calificación</b></h1>

    <div class="card">
        <div class="card-header">
            <h4 class="mb-0"><b>Formulario de Calificación Parcial 1</b></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('calificaciones.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_estudiantes" class="form-label">Estudiante</label>
                    <input type="text" class="form-control" value="{{ $estudiante->estudiante_nombre_completo }}" readonly>
                    <input type="hidden" name="id_estudiantes" value="{{ $estudiante->id }}">
                </div>

                <div class="mb-3">
					<label for="id_estudiantes" class="form-label">Cuatrimestre</label>
					@if($estudiante)
					@php
					$cuatrimestre = App\Models\Cuatrimestre::find($estudiante->id_cuatrimestres);
					@endphp
					<input type="text" class="form-control" value="{{ $cuatrimestre->cuatrimestre_nombre ?? '' }}" readonly>
					@endif
				</div>
                <div class="mb-3">
                    <label for="id_asignaturas" class="form-label">Asignatura</label>
                    <select name="id_asignaturas" class="form-control">
                        @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}">{{ $asignatura->asignatura_descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 1</label>
					<input type="number" name="parcial1" class="form-control" min="1" max="10" step="1" />
				</div>
                    <div class="col-sm-6">
                        <label class="col-form-label">Calificacion cualitativa Parcial 1</label>
                        <input type="text" name="parcial1cual" class="form-control" disabled/>
                    </div>
			    </div>

                <div class="row mb-3" style="display: none;">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 2</label>
					<input type="number" name="parcial2" class="form-control" class="form-control" min="0" max="10" step="1" value="0"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cualitativa Parcial 2</label>
					<input type="text" name="parcial2cual" class="form-control" value="Sin registro" disabled />
				</div>
			</div>
            <div class="row mb-3" style="display: none;">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 3</label>
					<input type="number" name="parcial3" class="form-control" class="form-control" min="0" max="10" step="1" value="0"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cualitativa Parcial 3</label>
					<input type="text" name="parcial3cual" class="form-control" value="Sin registro" disabled/>
				</div>
			</div>
            <div class="row mb-3" style="display: none;">
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación final cuantitativa</label>
					<input type="number" name="final" class="form-control" min="0" max="10" step="1" value="0"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación final cualitativa</label>
					<input type="text" name="finalCual" class="form-control" value="Sin registro" disabled />
				</div>
			</div>
			<!-- <div class="form-check mb-3">
				<input class="form-check-input" type="checkbox" id="showExtraordinario">
				<label class="form-check-label" for="showExtraordinario">Mostrar Evaluación Extraordinario</label>
			</div>

			<div class="form-check mb-3">
				<input class="form-check-input" type="checkbox" id="showUltimaAsignatura">
				<label class="form-check-label" for="showUltimaAsignatura">Mostrar Evaluación Última Asignatura</label>
			</div> -->



			<div class="row mb-3" style="display: none;">
				<div class="col-sm-6">
					<label class="col-form-label extraordinario-label">Evaluación cuantitativa extraordinario</label>
					<input type="text" name="extraordinario" class="form-control" value="0"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación cualitativa extraordinario</label>
					<input type="text" name="extraordinarioCual" class="form-control" value="Sin registro" disabled/>
				</div>
			</div>
			<div class="row mb-3" style="display: none;">
				<div class="col-sm-6">
					<label class="col-form-label ultima-asignatura-label">Evaluación cuantitativa última asignatura</label>
					<input type="text" name="ultima_asignatura" class="form-control"  value="0"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación cualitativa última asignatura</label>
					<input type="text" name="ultima_asignaturaCual" class="form-control" value="Sin registro" disabled/>
				</div>
			</div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Agregar Calificación</button>
                    <a href="{{ route('calificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function () {
    var parcial1Input = $('input[name="parcial1"]');
    var parcial1CualInput = $('input[name="parcial1cual"]');

    parcial1Input.on('input', function () {
        var inputVal = $(this).val();

        if (/^[0-9]+$/.test(inputVal)) {
            var calificacionCuantitativa = parseInt(inputVal);

            if (calificacionCuantitativa < 8) {
                parcial1CualInput.val('NA');
            } else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
                parcial1CualInput.val('SA');
			} else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
                parcial1CualInput.val('DE');
            } else if (calificacionCuantitativa === 10) {
                parcial1CualInput.val('AU');
            } else {
                parcial1CualInput.val('');
            }
        } else {
            parcial1CualInput.val('');
        }
    });
});
</script>

<script>
$(document).ready(function () {
    var parcial2Input = $('input[name="parcial2"]');
    var parcial2CualInput = $('input[name="parcial2cual"]');

    parcial2Input.on('input', function () {
        var inputVal = $(this).val();

        if (/^[0-9]+(\.[0-9]+)?$/.test(inputVal)) {
            var calificacionCuantitativa = parseFloat(inputVal);

            if (calificacionCuantitativa < 8) {
                parcial2CualInput.val('NA');
            } else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
                parcial2CualInput.val('SA');
            } else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
                parcial2CualInput.val('DE');
            } else if (calificacionCuantitativa === 10) {
                parcial2CualInput.val('AU');
            } else {
                parcial2CualInput.val('');
            }
        } else {
            parcial2CualInput.val('');
        }
    });
});
</script>

<script>
$(document).ready(function () {
    var parcial3Input = $('input[name="parcial3"]');
    var parcial3CualInput = $('input[name="parcial3cual"]');

    parcial3Input.on('input', function () {
        var inputVal = $(this).val();

        if (/^[0-9]+$/.test(inputVal)) {
            var calificacionCuantitativa = parseInt(inputVal);

            if (calificacionCuantitativa < 8) {
                parcial3CualInput.val('NA');
            } else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
                parcial3CualInput.val('SA');
            } else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
                parcial3CualInput.val('DE');
            } else if (calificacionCuantitativa === 10) {
                parcial3CualInput.val('AU');
            } else {
                parcial3CualInput.val('');
            }
        } else {
            parcial3CualInput.val('');
        }
    });
});
</script>


<script>
    $(document).ready(function () {
        // Obtener todos los campos de entrada dentro del formulario
        var inputFields = $('form input[type="text"]');

        // Asignar el evento keydown a cada campo de entrada
        inputFields.on('keydown', function (event) {
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