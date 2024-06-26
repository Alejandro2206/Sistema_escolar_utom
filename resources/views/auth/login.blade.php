@extends('layouts.auth-master')

@section('content')
    <div class="container">
        <form class="needs-validation mt-5" method="post" action="{{ route('login.perform') }}" novalidate>

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <img class="mx-auto d-block mb-4" src="{{ asset('image/Diseño.png') }}" alt="" width="200" height="200">

            <h1 class="h3 mb-3 fw-normal text-center">LOGIN</h1>

            @include('layouts.partials.messages')

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                <label for="floatingName">Email or Username</label>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

            @include('auth.partials.copy')
        </form>
    </div>
@endsection
