<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    -->

    @extends('home.index')

    @section('content')

    @auth


    <div class="container mt-5">

        

        @yield('pantallas')



    </div>

    @endauth

    @endsection

    <!--
</body>
</html>
-->
