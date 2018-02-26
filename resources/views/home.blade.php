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

			<!--React Elements Div -->
			<div id="reacthome"></div>
			<script src="{{mix('js/app.js')}}"></script>



		<!-- Bootstrapped Forms -->
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-5 col-md-offset-0">
							<h3>
								INR Reading
							</h3>
							<form id="reading-form" action="{{ route('readings')}}" method="POST">
								{{csrf_field()}} Reading
								<br>
								<input type="number" name="INR_Reading" id="inr_reading_submit" required min="0" max="99"><br> Date
								<br>
								<input type="date" name="Reading_Date" id="inr_date_submit" required min='2017-01-01'><br>
								<input id="submit" onclick="inrsubmitFunction()" type="button" value="Submit">
							</form>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-5 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-5 col-md-offset-0">
							<h3>
								Medical Event
							</h3>
							<form id="medicalevent-form" action="{{route('medicalevent')}}" method="POST">
								{{csrf_field()}} Date
								<br>
								<input type="date" name="event_date" id="event_date_submit" required min='2017-01-01'><br> Event Type<br>
								<select name="event_type" id="event_type_submit" required>
              @foreach($medicalevents as $event)
              <option value={{$event['Medical_Event_Type']}}>{{$event['Event_Type_Name']}}</option>
              @endforeach
            </select><br>
								<input id="submit" onclick="medicaleventsubmitFunction()" type="button" value="Submit">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center">
	<!--Logout Section -->
			<h3>
				Dashboard (
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
     </a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
				)
			</h3>
	</div>

	<!-- Scripts -->
	<noscript>
		You need to enable JavaScript to run this app.
</body>
</html>