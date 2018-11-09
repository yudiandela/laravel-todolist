<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Todo List App') }}</title>

    <!-- Bootstrap Style -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container">
        @yield('content')

        <div class="footer">
            <div class="text-center text-white">
                {{ config('app.name', 'Todo List App') }} <br>
                [ ] with ❤ in Aceh Besar (Nanggroe Aceh Darussalam), Indonesia
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/1.14.3/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>