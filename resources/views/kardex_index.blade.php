@extends('master')

@section('pantallas')

@if($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<style>
/* Cambiar el fondo de los resultados predichos */
.tt-menu {
    background-color: white;
    /* Cambiar el color de fondo a tu preferencia */
    border: 1px solid #ccc;
    /* Agregar un borde para mayor contraste */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    /* Agregar sombra para separar los resultados */
}

/* Cambiar el estilo de los elementos de la lista de resultados */
.tt-suggestion {
    padding: 8px;
    /* Añadir espacio interno alrededor de cada resultado */
    cursor: pointer;
    /* Cambiar el cursor al pasar por encima de los resultados */
}

/* Cambiar el estilo del resultado seleccionado */
.tt-suggestion:hover,
.tt-suggestion:focus {
    background-color: #f0f0f0;
    /* Cambiar el color de fondo cuando el resultado se seleccione o pase el cursor sobre él */
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<h1 class="text-center my-4">Kardex Vista</h1>

<!-- Seleccionador de Carreras Alumnos -->
<div class="ocultar-imprimir d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4">
        <div class="card-body">
            <div class="row mb-3 justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('kardex.index') }}" method="GET">
                        <div>
                            <h3>Seleccionar Carrera</h3>
                        </div>
                        <div class="input-group">
                            <select name="Carrera" class="form-select">
                                @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->carrera_actual }}
                                    {{ $carrera->carrera_descripcion }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Seleccionar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div>
                        <h3>Seleccionar Alumno</h3>
                    </div>
                    <form action="{{ route('kardex.pdf') }}" method="GET" target="_blank">
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control"
                                placeholder="Buscar alumno">
                            <button type="submit" class="btn btn-success">Generar Kardex</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var estudiantes = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // Reemplaza 'estudiantes' con la lista de estudiantes
        local: [
            @foreach($estudiantesPorCarrera as $estudiante)
            "{{ $estudiante->nombre_estudiante }} {{ $estudiante->estudiante_matricula }} {{ $estudiante->estudiante_nombre_completo }}",
            @endforeach
        ]
    });

    $('#search').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        name: 'estudiantes',
        source: estudiantes,
        sensitive: false // Esta línea es para hacer coincidencias insensibles a mayúsculas y minúsculas
    });
});
</script>

<!-- FIN Seleccionador de Carreras Alumnos -->
@endsection