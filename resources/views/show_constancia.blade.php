@extends('master')

@section('pantallas')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Constancia Details</b></div>
            <div class="col col-md-6">
                <a href="{{ route('constancias.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div id="htmlContent">
        <img src="https://www.bing.com/images/search?view=detailV2&ccid=KIL9OKXb&id=31A8283D616B40F5D2C0CE9C99B360D31C1918FD&thid=OIP.KIL9OKXbyMNTeTjRO9nSBwHaHa&mediaurl=https%3a%2f%2flookaside.fbsbx.com%2flookaside%2fcrawler%2fmedia%2f%3fmedia_id%3d174829848406465&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.2882fd38a5dbc8c3537938d13bd9d207%3frik%3d%252fRgZHNNgs5mczg%26pid%3dImgRaw%26r%3d0&exph=960&expw=960&q=utom&simid=607993827189330831&FORM=IRPRST&ck=AF72585B098138B9CED6E114A37DFDBA&selectedIndex=54&ajaxhist=0&ajaxserp=0" alt="logo">
    <h3 style="text-align: center">Universidad Tecnologica Del Oriente de Michoacan</h3>
    <h5>Dependencia</h5>
    <h5>Clave</h5>
    <h5>Zona Escolar</h5>
    <h5>Sector</h5>
  <h3 style="text-align: center"> A QUIEN CORRESPONDA:</h3> 
  <p>Quien subscribe .... direcor de la escuela Universidad Tecnologica Del Oriente de Michoacan</p> 
  <h1 style="text-align: center"> HACE CONSTAR:</h1> 
  <p>que {{ $estudiante->estudiante_nombre }}  {{ $estudiante->estudiante_apellido_paterno }} {{ $estudiante->estudiante_apellido_materno }} es alumno(a) de esta institucion</p> 
  <p>que actualmente esta cursando el ...... cuatrimestre</p>
  <p>en la carrera de {{ $estudiante->estudiante_carrera }} </p> 
  <p>
  
  <a href="{{ route('constancias.generarPDF', ['estudiante' => $estudiante->id]) }}" class="btn btn-primary" target="_blank">
    Generar PDF
</a>


  </p>
</div>

@endsection
