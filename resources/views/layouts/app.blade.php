<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="laravel developer in ncr, laravel developer in delhi, experienced laravel web developer remote"/>
    <meta name="description" content="kumar ravi is experienced laravel developer, Technology in his hand includes laravel, AWS, vue etc. can work in ncr, gurugram, remote.">
    <meta name="author" content="kumar ravi">
    <title>{{ config('app.name', 'Kumar Ravi | Laravel Developer') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <main class="font-sans">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
