<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="Ahmed Shaker">

    <title>{{ config('app.name', 'Dozzan') }}</title>
    <link rel="icon" href="{{ url('images/logo.png') }}" type="image/gif" sizes="30x30">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
   {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}">
    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="{{ url('css/colors/orange.css') }}" />

    <!-- Modernizer -->
    <script src="{{ url('js/modernizer.js') }}"></script>
    <link href="{{ url('css/datatables.min.css') }}" rel="stylesheet">

    
    @yield('style')
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    <div id="app">
        <div id="loader">
            <div id="status"></div>
        </div>
        @include('layouts.partial.nav')
        @yield('content')
        @include('layouts.partial.footer')
    </div>
    <script src="{{ url('js/app.js') }}" ></script>
    @include('layouts.partial.scripts')
    @yield('script')
    @if (\Session::has('message'))

    <script>
        $(function() {

            swal({
                text:"{{ \Session::pull('message') }}",
                icon:"{{ \Session::pull('icon') }}"
            });

        })
        
    </script>
        
    @endif
</body>
</html>
