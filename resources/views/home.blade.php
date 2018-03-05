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
	<script src="{{mix('js/app.js')}}"></script>
</nav>

<body>
	<div id="app">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
		<script src="{!! asset('js/userdata.js')!!}"></script>
		<script src="{{mix('js/app.js')}}"></script>
		<script type="text/javascript" src="{!! asset('js/homeforms.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('js/updatechart.js') !!}"></script>

		<!--React Elements Div -->
		<div id="reacthome"></div>
		<script src="{{mix('js/app.js')}}"></script>



		<!-- Bootstrapped Forms -->
	</div>
	<!--<input id="submit" onclick="getGraphData()" type="button" value="Get Graph">-->
	<div class="text-center">


		<!--Logout Section -->
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</div>

	<!-- Scripts -->
	<noscript>
		You need to enable JavaScript to run this app.
</body>
</html>