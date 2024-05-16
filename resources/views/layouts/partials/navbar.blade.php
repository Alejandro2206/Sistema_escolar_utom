
<style>
  @media print {
    .ocultar-imprimir {
      display: none;
    }
  }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SISTEMA ESCOLAR UTOM</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @auth
        {{auth()->user()->name}}
        <div class="text-end">
            <a href="{{ route('logout.perform') }}" class="btn btn-danger ">SALIR</a>
        </div>
        @endauth
        @guest
        <div class="text-end">
            <a href="{{ route('login.perform') }}" class="btn btn-danger ">ENTRAR</a>
            <a href="{{ route('register.perform') }}" class="btn btn-warning">REGISTRAR</a>
        </div>
        @endguest
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">INICIO</a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catalogos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('estudiantes.index') }}">Estudiantes</a></li>
              <li><a class="dropdown-item" href="{{ route('cuatrimestres.index') }}">Cuatrimestres</a></li>
              <li><a class="dropdown-item" href="{{ route('carreras.index') }}">Carreras</a></li>
              <li><a class="dropdown-item" href="{{ route('periodos.index') }}">Periodos</a></li>
              <li><a class="dropdown-item" href="{{ route('ciclos.index') }}">Ciclos</a></li>
              <li><a class="dropdown-item" href="{{ route('asignaturas.index') }}">Asignaturas</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkB" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Documentos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkB">
              <li><a class="dropdown-item" href="{{ route('constancias.index') }}">Constancias</a></li>
              <li><a class="dropdown-item" href="{{ route('kardex.index') }}">Kardex</a></li>
              <li><a class="dropdown-item" href="{{ route('estadisticas.index') }}">Estadisticas</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkC" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Procesos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkC">
              <li><a class="dropdown-item" href="{{ route('calificaciones.index') }}">Calificaciones</a></li>
              <li><a class="dropdown-item" href="{{ route('digitalizacion.index') }}">Digitalizacion</a></li>
            </ul>
          </li>
          @endauth
        </ul>


      </div>

    </div>
  </nav>
