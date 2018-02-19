@extends('layouts.app') @section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="{!! asset('js/userdata.js')!!}"></script>
<script type="text/javascript" src="{!! asset('js/homeforms.js') !!}"></script>
<div class="text-center">
  <h3>
    {{$firstname}} {{$lastname}} Dashboard (
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
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-0">
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="userGraph">
   
          </div>
          <!--<img src="http://imonitormy.com/wp-content/uploads/2014/12/graph-INR-example1.png" alt="Test Graph"> -->
          <script>
            Plotly.plot('userGraph', getGraphData(), getGraphLayout());
            window.onresize = function() {
              Plotly.Plots.resize(Plotly.d3.select('#userGraph').node());
            };
  </script>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-md-offset-0">
      <div class="row">
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
          <div class="col-md-5 col-md-offset-0 pull-right">
          <h3>
            Target INR
          </h3>
          <form id="bounds-form" action="{{ route('bounds')}}" method="POST">
            {{csrf_field()}} Upper Bound<br>
            <input type="number" name="UpperBound" id="upper_bound_submit" required min="0" max="99"><br> Lower Bound<br>
            <input type="number" name="LowerBound" id="lower_bound_submit" required min="0" max="99"><br>
            <input id="submit" onclick="boundsubmitFunction()" type="button" value="Submit">
          </form>
          </div>
        </div>
        </div>
      </div>
      <div class="row">
       <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-5 col-md-offset-0">
          <h3>
              Medication Dose
            </h3>
            <form id="dose-form" action="{{route('medicationdose')}}" method="POST">
              {{csrf_field()}} Amount
              <br>
              <input type="number" name="dose_amount" id="dose_amount_submit" required><br> Dose Date<br>
              <input type="date" name="dose_datetime" id="dose_datetime_submit" required min='2017-01-01'><br> Medication
              <br>
              <select name="medicine_id" id="medicine_id_submit" required>
              @foreach($medications as $medication)
                <option value={{$medication['Medicine_Id']}}>{{$medication['Medicine_Name']}}</option>
              @endforeach   
            </select><br>
              <input id="submit" onclick="dosesubmitFunction()" type="button" value="Submit">
            </form>
          </div>
          <div class="col-md-5 col-md-offset-0 pull-right">
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
</div>
    @endsection