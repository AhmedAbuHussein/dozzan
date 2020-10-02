<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Dozzan') }}</title>
    <link rel="icon" href="{{ url('images/logo.png') }}" type="image/gif" sizes="30x30">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ url('js/app.js') }}" defer></script>
    <style>
        body{
            background: url('/images/banner.jpg') no-repeat;
        }
    </style>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>    
</body>
</html>
