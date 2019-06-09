<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1-biTseA1z3UZ5EpXubiAge8DmMLKobM"
            async defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/652715ee50.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
<div id="app">
    <div class="alert warning">
        @if($errors->any())
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    @include('layouts.welcome-loader')
    @include('layouts.navbar')


    <main class="py-4">
        @yield('content')
    </main>
</div>
@stack('js')
</body>
</html>
