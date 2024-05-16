
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

<div class="card">
	<div class="card-header">Agregar Calificaciones</div>
	<div class="card-body">
		<form method="post" action="{{ route('calificaciones.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Ciclo</label>
					<input type="text" name="ciclo" class="form-control" />
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Carrera</label>
					<input type="text" name="carrera" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Cuatrimestre</label>
					<input type="text" name="cuatrimestre" class="form-control" />
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Matricula</label>
					<input type="text" name="matricula" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Asignatura</label>
					<input type="text" name="asignatura" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 1</label>
					<input type="number" name="parcial1" class="form-control" step="0.1"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cualitativa Parcial 1</label>
					<input type="text" name="parcial1cual" class="form-control" disabled/>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 2</label>
					<input type="number" name="parcial2" class="form-control" step="0.1"/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cualitativa Parcial 2</label>
					<input type="text" name="parcial2cual" class="form-control" disabled />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cuantitativa Parcial 3</label>
					<input type="number" name="parcial3" class="form-control" step="0.1" required/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Calificacion cualitativa Parcial 3</label>
					<input type="text" name="parcial3cual" class="form-control" disabled/>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación final cuantitativa</label>
					<input type="number" name="final" class="form-control"  value="" required disabled/>
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación final cualitativa</label>
					<input type="text" name="finalCual" class="form-control" disabled />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación cuantitativa extraordinario</label>
					<input type="text" name="extraordinario" class="form-control" />
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación cualitativa extraordinario</label>
					<input type="text" name="extraordinarioCual" class="form-control" disabled/>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación cuantitativa última asignatura</label>
					<input type="text" name="ultima_asignatura" class="form-control" />
				</div>
				<div class="col-sm-6">
					<label class="col-form-label">Evaluación cualitativa última asignatura</label>
					<input type="text" name="ultima_asignaturaCual" class="form-control" disabled/>
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>
		</form>
	</div>
</div>

<script>
	$(document).ready(function () {
		// Obtener el campo de entrada para la calificación cuantitativa Parcial 1
		var parcial1Input = $('input[name="parcial1"]');
		// Obtener el campo de entrada para la calificación cualitativa Parcial 1
		var parcial1CualInput = $('input[name="parcial1cual"]');

		// Asignar el evento 'input' al campo de entrada cuantitativo Parcial 1
		parcial1Input.on('input', function () {
			// Obtener el valor del campo cuantitativo Parcial 1
			var calificacionCuantitativa = parseFloat($(this).val());

			// Verificar si la calificación es igual a 10
			if (calificacionCuantitativa === 10) {
				// Establecer el valor del campo cualitativo como "AU"
				parcial1CualInput.val('AU');
			}
			// Verificar si la calificación está entre 9 y 9.9
			else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
				// Establecer el valor del campo cualitativo como "DE"
				parcial1CualInput.val('DE');
			}
			// Verificar si la calificación está entre 8 y 8.9
			else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
				// Establecer el valor del campo cualitativo como "SA"
				parcial1CualInput.val('SA');
			}
			// Verificar si la calificación es menor a 8
			else if (calificacionCuantitativa < 8) {
				// Establecer el valor del campo cualitativo como "NA"
				parcial1CualInput.val('NA');
			} else {
				// En caso contrario, limpiar el campo cualitativo
				parcial1CualInput.val('');
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		// Obtener el campo de entrada para la calificación cuantitativa Parcial 1
		var parcial1Input = $('input[name="parcial2"]');
		// Obtener el campo de entrada para la calificación cualitativa Parcial 1
		var parcial1CualInput = $('input[name="parcial2cual"]');

		// Asignar el evento 'input' al campo de entrada cuantitativo Parcial 1
		parcial1Input.on('input', function () {
			// Obtener el valor del campo cuantitativo Parcial 1
			var calificacionCuantitativa = parseFloat($(this).val());

			// Verificar si la calificación es igual a 10
			if (calificacionCuantitativa === 10) {
				// Establecer el valor del campo cualitativo como "AU"
				parcial1CualInput.val('AU');
			}
			// Verificar si la calificación está entre 9 y 9.9
			else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
				// Establecer el valor del campo cualitativo como "DE"
				parcial1CualInput.val('DE');
			}
			// Verificar si la calificación está entre 8 y 8.9
			else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
				// Establecer el valor del campo cualitativo como "SA"
				parcial1CualInput.val('SA');
			}
			// Verificar si la calificación es menor a 8
			else if (calificacionCuantitativa < 8) {
				// Establecer el valor del campo cualitativo como "NA"
				parcial1CualInput.val('NA');
			} else {
				// En caso contrario, limpiar el campo cualitativo
				parcial1CualInput.val('');
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		// Obtener el campo de entrada para la calificación cuantitativa Parcial 1
		var parcial1Input = $('input[name="parcial3"]');
		// Obtener el campo de entrada para la calificación cualitativa Parcial 1
		var parcial1CualInput = $('input[name="parcial3cual"]');

		// Asignar el evento 'input' al campo de entrada cuantitativo Parcial 1
		parcial1Input.on('input', function () {
			// Obtener el valor del campo cuantitativo Parcial 1
			var calificacionCuantitativa = parseFloat($(this).val());

			// Verificar si la calificación es igual a 10
			if (calificacionCuantitativa === 10) {
				// Establecer el valor del campo cualitativo como "AU"
				parcial1CualInput.val('AU');
			}
			// Verificar si la calificación está entre 9 y 9.9
			else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
				// Establecer el valor del campo cualitativo como "DE"
				parcial1CualInput.val('DE');
			}
			// Verificar si la calificación está entre 8 y 8.9
			else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
				// Establecer el valor del campo cualitativo como "SA"
				parcial1CualInput.val('SA');
			}
			// Verificar si la calificación es menor a 8
			else if (calificacionCuantitativa < 8) {
				// Establecer el valor del campo cualitativo como "NA"
				parcial1CualInput.val('NA');
			} else {
				// En caso contrario, limpiar el campo cualitativo
				parcial1CualInput.val('');
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		// Obtener el campo de entrada para la calificación cuantitativa Parcial 1
		var parcial1Input = $('input[name="final"]');
		// Obtener el campo de entrada para la calificación cualitativa Parcial 1
		var parcial1CualInput = $('input[name="finalCual"]');

		// Asignar el evento 'input' al campo de entrada cuantitativo Parcial 1
		parcial1Input.on('input', function () {
			// Obtener el valor del campo cuantitativo Parcial 1
			var calificacionCuantitativa = parseFloat($(this).val());

			// Verificar si la calificación es igual a 10
			if (calificacionCuantitativa === 10) {
				// Establecer el valor del campo cualitativo como "AU"
				parcial1CualInput.val('AU');
			}
			// Verificar si la calificación está entre 9 y 9.9
			else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
				// Establecer el valor del campo cualitativo como "DE"
				parcial1CualInput.val('DE');
			}
			// Verificar si la calificación está entre 8 y 8.9
			else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
				// Establecer el valor del campo cualitativo como "SA"
				parcial1CualInput.val('SA');
			}
			// Verificar si la calificación es menor a 8
			else if (calificacionCuantitativa < 8) {
				// Establecer el valor del campo cualitativo como "NA"
				parcial1CualInput.val('NA');
			} else {
				// En caso contrario, limpiar el campo cualitativo
				parcial1CualInput.val('');
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		// Obtener el campo de entrada para la calificación cuantitativa Parcial 1
		var parcial1Input = $('input[name="extraordinario"]');
		// Obtener el campo de entrada para la calificación cualitativa Parcial 1
		var parcial1CualInput = $('input[name="extraordinarioCual"]');

		// Asignar el evento 'input' al campo de entrada cuantitativo Parcial 1
		parcial1Input.on('input', function () {
			// Obtener el valor del campo cuantitativo Parcial 1
			var calificacionCuantitativa = parseFloat($(this).val());

			// Verificar si la calificación es igual a 10
			if (calificacionCuantitativa === 10) {
				// Establecer el valor del campo cualitativo como "AU"
				parcial1CualInput.val('AU');
			}
			// Verificar si la calificación está entre 9 y 9.9
			else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
				// Establecer el valor del campo cualitativo como "DE"
				parcial1CualInput.val('DE');
			}
			// Verificar si la calificación está entre 8 y 8.9
			else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
				// Establecer el valor del campo cualitativo como "SA"
				parcial1CualInput.val('SA');
			}
			// Verificar si la calificación es menor a 8
			else if (calificacionCuantitativa < 8) {
				// Establecer el valor del campo cualitativo como "NA"
				parcial1CualInput.val('NA');
			} else {
				// En caso contrario, limpiar el campo cualitativo
				parcial1CualInput.val('');
			}
		});
	});
</script>


<script>
	$(document).ready(function () {
		// Obtener el campo de entrada para la calificación cuantitativa Parcial 1
		var parcial1Input = $('input[name="ultima_asignatura"]');
		// Obtener el campo de entrada para la calificación cualitativa Parcial 1
		var parcial1CualInput = $('input[name="ultima_asignaturaCual"]');

		// Asignar el evento 'input' al campo de entrada cuantitativo Parcial 1
		parcial1Input.on('input', function () {
			// Obtener el valor del campo cuantitativo Parcial 1
			var calificacionCuantitativa = parseFloat($(this).val());

			// Verificar si la calificación es igual a 10
			if (calificacionCuantitativa === 10) {
				// Establecer el valor del campo cualitativo como "AU"
				parcial1CualInput.val('AU');
			}
			// Verificar si la calificación está entre 9 y 9.9
			else if (calificacionCuantitativa >= 9 && calificacionCuantitativa < 10) {
				// Establecer el valor del campo cualitativo como "DE"
				parcial1CualInput.val('DE');
			}
			// Verificar si la calificación está entre 8 y 8.9
			else if (calificacionCuantitativa >= 8 && calificacionCuantitativa < 9) {
				// Establecer el valor del campo cualitativo como "SA"
				parcial1CualInput.val('SA');
			}
			// Verificar si la calificación es menor a 8
			else if (calificacionCuantitativa < 8) {
				// Establecer el valor del campo cualitativo como "NA"
				parcial1CualInput.val('NA');
			} else {
				// En caso contrario, limpiar el campo cualitativo
				parcial1CualInput.val('');
			}
		});
	});
</script>

<script>
	$(document).ready(function () {
		// Obtener los campos de entrada para las calificaciones cuantitativas de los tres parciales
		var parcial1Input = $('input[name="parcial1"]');
		var parcial2Input = $('input[name="parcial2"]');
		var parcial3Input = $('input[name="parcial3"]');

		// Obtener el campo de entrada para la evaluación final cuantitativa
		var finalInput = $('input[name="final"]');
		// Obtener el campo de entrada para la evaluación final cualitativa
		var finalCualInput = $('input[name="finalCual"]');

		// Asignar el evento 'input' a los campos de entrada cuantitativos de los tres parciales
		parcial1Input.add(parcial2Input).add(parcial3Input).on('input', function () {
			// Obtener los valores de los campos cuantitativos de los tres parciales
			var calificacionP1 = parseFloat(parcial1Input.val());
			var calificacionP2 = parseFloat(parcial2Input.val());
			var calificacionP3 = parseFloat(parcial3Input.val());

			// Calcular el promedio de las calificaciones cuantitativas
			var promedio = (calificacionP1 + calificacionP2 + calificacionP3) / 3;

			// Mostrar el promedio en el campo de evaluación final cuantitativa
			finalInput.val(promedio.toFixed(2)); // Muestra el promedio con dos decimales

			// Verificar si la calificación es igual a 10
			if (promedio === 10) {
				// Establecer el valor del campo cualitativo como "AU"
				finalCualInput.val('AU');
			}
			// Verificar si la calificación está entre 9 y 9.9
			else if (promedio >= 9 && promedio < 10) {
				// Establecer el valor del campo cualitativo como "DE"
				finalCualInput.val('DE');
			}
			// Verificar si la calificación está entre 8 y 8.9
			else if (promedio >= 8 && promedio < 9) {
				// Establecer el valor del campo cualitativo como "SA"
				finalCualInput.val('SA');
			}
			// Verificar si la calificación es menor a 8
			else if (promedio < 8) {
				// Establecer el valor del campo cualitativo como "NA"
				finalCualInput.val('NA');
			} else {
				// En caso contrario, limpiar el campo cualitativo
				finalCualInput.val('');
			}
		});
	});
</script>
<script>
	$(document).ready(function () {
		// Obtener los campos de entrada para las calificaciones cuantitativas de los tres parciales
		var parcial1Input = $('input[name="parcial1"]');
		var parcial2Input = $('input[name="parcial2"]');
		var parcial3Input = $('input[name="parcial3"]');

		// Obtener el campo de entrada para la evaluación final cuantitativa
		var finalInput = $('input[name="final"]');
		// Obtener el campo de entrada para la evaluación final cualitativa
		var finalCualInput = $('input[name="finalCual"]');

		// Asignar el evento 'input' a los campos de entrada cuantitativos de los tres parciales
		parcial1Input.add(parcial2Input).add(parcial3Input).on('input', function () {
			// Obtener los valores de los campos cuantitativos de los tres parciales
			var calificacionP1 = parseFloat(parcial1Input.val());
			var calificacionP2 = parseFloat(parcial2Input.val());
			var calificacionP3 = parseFloat(parcial3Input.val());

			// Verificar si alguna de las calificaciones cualitativas es "NA"
			var calificacionCualP1 = $('input[name="parcial1cual"]').val();
			var calificacionCualP2 = $('input[name="parcial2cual"]').val();
			var calificacionCualP3 = $('input[name="parcial3cual"]').val();

			var existeNA =
				calificacionCualP1 === 'NA' ||
				calificacionCualP2 === 'NA' ||
				calificacionCualP3 === 'NA';

			// Si existe "NA" en alguna de las calificaciones cualitativas, establecer "NA" en la evaluación final cualitativa
			if (existeNA) {
				finalCualInput.val('NA');
			} else {
				// Calcular el promedio de las calificaciones cuantitativas
				var promedio = (calificacionP1 + calificacionP2 + calificacionP3) / 3;

				// Redondear el promedio según criterios específicos
				if (promedio >= 8.5) {
					finalInput.val(Math.ceil(promedio)); // Redondea hacia arriba si es mayor o igual a 8.5
				} else if (promedio < 8.5 && promedio >= 7.5) {
					finalInput.val(8); // Establece 8 si es mayor o igual a 7.5 pero menor a 8.5
				} else {
					finalInput.val(Math.floor(promedio)); // Redondea hacia abajo para valores menores a 7.5
				}

				// Establecer la calificación cualitativa según el promedio redondeado
				if (finalInput.val() === '10') {
					finalCualInput.val('AU');
				} else if (finalInput.val() === '9') {
					finalCualInput.val('DE');
				} else if (finalInput.val() === '8') {
					finalCualInput.val('SA');
				} else {
					finalCualInput.val('');
				}
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
		// Obtener los campos de entrada para las calificaciones cuantitativas de los tres parciales
		var parcial1Input = $('input[name="parcial1"]');
		var parcial2Input = $('input[name="parcial2"]');
		var parcial3Input = $('input[name="parcial3"]');

		// Obtener el campo de entrada para la evaluación final cuantitativa
		var finalInput = $('input[name="final"]');
		// Obtener el campo de entrada para la evaluación final cualitativa
		var finalCualInput = $('input[name="finalCual"]');

		// Función para redondear la calificación cuantitativa de la evaluación final
		function roundFinalCuantitativa() {
			// Obtener los valores de los campos cuantitativos de los tres parciales
			var calificacionP1 = parseFloat(parcial1Input.val());
			var calificacionP2 = parseFloat(parcial2Input.val());
			var calificacionP3 = parseFloat(parcial3Input.val());

			// Calcular el promedio de las calificaciones cuantitativas
			var promedio = (calificacionP1 + calificacionP2 + calificacionP3) / 3;

			// Redondear el promedio según criterios específicos
			if (promedio >= 9.6) {
				finalInput.val(10); // Redondea a 10 si es mayor o igual a 9.6
			} else if (promedio >= 8.6) {
				finalInput.val(9); // Redondea a 9 si es mayor o igual a 8.6 pero menor a 9.6
			} else if (promedio >= 8.5) {
				finalInput.val(8); // Establece 8 si es mayor o igual a 8.5 pero menor a 8.6
			} else {
				finalInput.val(Math.floor(promedio)); // Redondea hacia abajo para valores menores a 8.5
			}

			// Establecer la calificación cualitativa según el promedio redondeado
			if (finalInput.val() === '10') {
				finalCualInput.val('AU');
			} else if (finalInput.val() === '9') {
				finalCualInput.val('DE');
			} else if (finalInput.val() === '8') {
				finalCualInput.val('SA');
			} else {
				finalCualInput.val('');
			}
		}

		// Asignar el evento 'input' a los campos de entrada cuantitativos de los tres parciales
		parcial1Input.add(parcial2Input).add(parcial3Input).on('input', function () {
			// Redondear la calificación cuantitativa de la evaluación final
			roundFinalCuantitativa();
		});
	});
</script>






@endsection('content')