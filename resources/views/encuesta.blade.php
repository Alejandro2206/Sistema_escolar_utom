@extends('master')

@section('pantallas')

<style>
    .rating-stars {
        display: inline-block;
        font-size: 70px;
        color: #ccc;
        cursor: pointer;
    }

    .rating-stars input[type="radio"] {
        display: none;
    }

    .rating-stars label {
        float: right;
    }

    .rating-stars label:before {
        content: "\2605";
    }

    .rating-stars input[type="radio"]:checked ~ label {
        color: #ffc107;
    }
</style>

<div class="container">
    <h1 class="mt-5">Encuesta de satisfacción</h1>
    @if(session('success'))
        <div class="alert alert-success mt-4">{{ session('success') }}</div>
    @endif
    <form action="/encuesta" method="POST" class="mt-4">
        @csrf
        <div class="mb-3 text-center">
        <h4 for="puntuacion text-center">Puntuación:</h4>
            <div class="rating-stars">
                <input type="radio" name="puntuacion" id="star5" value="5" />
                <label for="star5"></label>
                <input type="radio" name="puntuacion" id="star4" value="4" />
                <label for="star4"></label>
                <input type="radio" name="puntuacion" id="star3" value="3" />
                <label for="star3"></label>
                <input type="radio" name="puntuacion" id="star2" value="2" />
                <label for="star2"></label>
                <input type="radio" name="puntuacion" id="star1" value="1" />
                <label for="star1"></label>
            </div>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario:</label>
            <textarea name="comentario" id="comentario" rows="4" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <br>
</div>

@endsection