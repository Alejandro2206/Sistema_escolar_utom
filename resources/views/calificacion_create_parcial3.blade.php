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
            <h4 class="mb-0"><b>Formulario de Calificación Parcial 3</b></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('calificaciones.actualizarp3') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_estudiantes" class="form-label">Estudiante</label>
                    <input type="text" class="form-control" value="{{ $estudiante->estudiante_nombre_completo }}" readonly>
                    <input type="hidden" name="id_estudiantes" value="{{ $estudiante->id }}">
                </div>

                <div class="mb-3">
					<label for="" class="form-label">Cuatrimestre</label>
					@if($estudiante)
					@php
					$cuatrimestre = App\Models\Cuatrimestre::find($estudiante->id_cuatrimestres);
					@endphp
					<input type="text" class="form-control" value="{{ $cuatrimestre->cuatrimestre_nombre ?? '' }}" readonly>
					@endif
				</div>

<!-- 
                <div class="mb-3">
                    <label for="asignaturas_id" class="form-label">Asignatura</label>
                    <select name="asignaturas_id" class="form-control">
                        @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}">{{ $asignatura->asignatura_descripcion }}</option>
                        @endforeach
                    </select>
                </div> -->
                <div class="mb-3">
                    <label for="id_asignaturas" class="form-label">Asignatura</label>
                    <select id="asignaturasDropdown" name="id_asignaturas" class="form-control">
                        @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}">{{ $asignatura->asignatura_descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
				

                <div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 3</label>
					<input type="number" name="parcial3" class="form-control" class="form-control" min="0" max="10" step="1"  required/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cualitativa Parcial 3</label>
					<input type="text" name="parcial3cual" class="form-control"  disabled />
				</div>
			</div>
            <div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación final cuantitativa</label>
					<input type="number" name="final" class="form-control" min="0" max="10" step="1" disabled/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación final cualitativa</label>
					<input type="text" name="finalCual" class="form-control" disabled />
				</div>
			</div>

            <div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 1</label>
                    @php
                    // Realizar la consulta y obtener el valor de parcial1
                    $consultaParcial1 = DB::table('calificaciones')
                        ->where('id_estudiantes', $estudiante->id)
                        ->where('id_asignaturas', $asignatura->id)
                        ->value('parcial1');
                    @endphp
					<input type="number" name="parcial1" class="form-control" min="1" max="10" step="1" value="{{ $consultaParcial1 ?? '' }}" />
				</div>
                    <div class="col-sm-6">
                        <label class="col-form-label">Calificacion cualitativa Parcial 1</label>
                        <input type="text" name="parcial1cual" class="form-control" disabled/>
                    </div>
			    </div>

                <div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 2</label>
                    @php
                    // Realizar la consulta y obtener el valor de parcial2
                    $consultaParcial2 = DB::table('calificaciones')
                        ->where('id_estudiantes', $estudiante->id)
                        ->where('id_estudiantes', $asignatura->id)
                        ->value('parcial2');
                    @endphp
					<input id="parcial2Input"  type="number" name="parcial2" class="form-control" class="form-control" min="0" max="10" step="1"  value="{{ $consultaParcial2 ?? '' }}"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cualitativa Parcial 2</label>
					<input type="text" name="parcial2cual" class="form-control"  disabled />
				</div>
			</div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar Calificación</button>
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
















<script>
    $(document).ready(function () {
        // Obtener el elemento del dropdown de asignaturas y el input de parcial2
        var asignaturasDropdown = $('#asignaturasDropdown');
        var parcial2Input = $('#parcial2Input');
        
        // Asignar el evento change al dropdown de asignaturas
        asignaturasDropdown.on('change', function () {
            var asignaturaId = $(this).val();
            
            // Realizar una consulta AJAX para obtener la calificación parcial2
            $.ajax({
                url: '{{ route('calificaciones.obtenerparcial2') }}', // Cambia esto a la ruta adecuada en tu aplicación
                type: 'GET',
                data: {
                    estudiantes_id: '{{ $estudiante->id }}',
                    asignaturas_id: asignaturaId
                },
                success: function (response) {
                    // Actualizar el valor del input de parcial2
                    parcial2Input.val(response.parcial2);
                },
                error: function () {
                    // Manejar errores si es necesario
                }
            });
        });
    });
</script>



<script>
$(document).ready(function () {
    var parcial1Input = $('input[name="parcial1"]');
    var parcial2Input = $('input[name="parcial2"]');
    var parcial3Input = $('input[name="parcial3"]');
    var finalInput = $('input[name="final"]');
    var finalCualInput = $('input[name="finalCual"]');

    function calcularPromedio() {
        var parcial1 = parseFloat(parcial1Input.val()) || 0;
        var parcial2 = parseFloat(parcial2Input.val()) || 0;
        var parcial3 = parseFloat(parcial3Input.val()) || 0;
        var promedio = (parcial1 + parcial2 + parcial3) / 3;

        finalInput.val(promedio.toFixed(2));

        if (promedio < 7) {
            finalCualInput.val('NA');
        } else if (promedio >= 7 && promedio < 8) {
            finalCualInput.val('NA');
        } else if (promedio >= 8 && promedio < 9) {
            finalCualInput.val('SA');
        } else if (promedio >= 9 && promedio < 10) {
            finalCualInput.val('DE');
        } else if (promedio === 10) {
            finalCualInput.val('AU');
        } else {
            finalCualInput.val('');
        }
    }

    parcial1Input.on('input', calcularPromedio);
    parcial2Input.on('input', calcularPromedio);
    parcial3Input.on('input', calcularPromedio);
});
</script>

@endsection