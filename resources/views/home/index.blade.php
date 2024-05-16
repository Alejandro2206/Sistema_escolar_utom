@extends('layouts.app-master')

@section('content')
    <style>
        .banner-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Para que la imagen esté detrás del contenido */
        }

        .bg-light {
            z-index: 1; /* Asegura que el contenido esté por encima de la imagen de fondo */
        }

        .bg-light h1, .bg-light p {
            color: white; /* Cambia el color del texto a blanco */
            text-align: center; /* Centra el texto horizontalmente */
            position: absolute; /* Añade posición absoluta para superponer el texto sobre la imagen */
            left: 50%; /* Coloca el texto en el centro horizontal */
            transform: translateX(-50%); /* Centra el texto horizontalmente */
        }

        .bg-light p {
            top: 16%; /* Ajusta la posición vertical del párrafo */
        }
    </style>

    <div class="bg-light">
        @auth
            @yield('content')
        @endauth

        @guest
            <h1>PAGINA INICIAL</h1>
            <p class="lead">Actualmente se encuentra en la pagina inicial. <br>Por favor, inicia sesión para acceder a los recursos restringidos</p>
        @endguest
    </div>

    <div class="text-center banner-image">
        <img class="rounded" width="100%" src="{{ asset('image/banner1.png') }}" alt="Marcador de posición: Bienvenidos al Sistema">
    </div>
@endsection


