<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD- @yield('title')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

        <link href="{{asset('libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body>
        @section('sidebar')
            <nav class="nav justify-content-center">
              <a class="nav-link active" href="{{ url('/') }}">Inicio</a>
              <a class="nav-link" href="{{ url('/listar/estudiantes') }}">Estudiantes</a>
              <a class="nav-link" href="{{ url('/listar/grupos') }}">Grupos</a>
              <a class="nav-link" href="{{ url('/concentrado') }}">Concentrado</a>
            </nav>
        @show

        <div class="container mt-5">
             @yield('content')
        </div>

        <script src="{{asset('libs/bootstrap/js/bootstrap.min.js')}}"></script>
    </body>
</html>
