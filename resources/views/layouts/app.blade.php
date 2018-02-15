<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INRTracker') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<nav>
  </noscript>
	<div id="navbar"></div>
	<script src="{{mix('js/app.js')}}" ></script>  
</nav>
<body>
    <div id="app">
    

        @yield('content')
    </div>

    <!-- Scripts -->
  	<noscript>
		You need to enable JavaScript to run this app.
</body>
</html>
