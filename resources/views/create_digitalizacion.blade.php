@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
    <table>
        <thead>
            <tr>
                <th>Datos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <ul>
                        <li><strong>Fichas:</strong> {{ $fichas }}</li>
                        <li><strong>Inscripcións:</strong> {{ $inscripcions }}</li>
                        <li><strong>Reinscripcións:</strong> {{ $reinscripcions }}</li>
                        <li><strong>Titulacións TSU:</strong> {{ $titulacionsTsu }}</li>
                        <li><strong>Titulacións Ing/Lic:</strong> {{ $titulacionsIngLic }}</li>
                    </ul>
                </td>
                <td>
                    <ul class="actions">
                        <li><a href="{{ route('digitalizacions.fichas') }}" class="button">Inicio</a></li>
                        <li><a href="{{ route('digitalizacions.inscripcions') }}" class="button">Inicio</a></li>
                        <li><a href="{{ route('digitalizacions.reinscripcions') }}" class="button">Inicio</a></li>
                        <li><a href="{{ route('digitalizacions.titulacionsTsu') }}" class="button">Inicio</a></li>
                        <li><a href="{{ route('digitalizacions.titulacionsIngLic') }}" class="button">Inicio</a></li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
@endsection