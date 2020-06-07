<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="laravel developer in ncr, laravel developer in delhi, experienced laravel web developer remote"/>
    <meta name="description" content="kumar ravi is experienced laravel developer, Technology in his hand includes laravel, AWS, vue etc. can work in ncr, gurugram, remote.">
    <meta name="author" content="kumar ravi">
    <title>Ravi | Laravel Developer</title>

    <title>{{ config('app.name') }}</title>

    <link rel="canonical">
    <link href="{{ mix('css/studio.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Karla|Merriweather:400,700">

    <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.1/build/highlight.min.js"></script>
    <script src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.18.1/build/styles/github.min.css">
</head>
<body>
<div id="studio" class="mb-5">
    <router-view></router-view>
</div>

<script>
    window.Studio = @json($scripts);
</script>

<script src="{{ asset('js/studio.js') }}" defer></script>
</body>
</html>
