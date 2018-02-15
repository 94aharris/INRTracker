@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                  <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                 </li>
                  <h3>
                    Reading Test Form
                  </h3>
                  <form id="reading-form" action="{{ route('readings')}}" method="POST">
                    {{csrf_field()}}
                      Reading<br>
                      <input type="number" name="INR_Reading"><br>
                      Date<br>
                      <input type="date" name="Reading_Date"><br>
                      <input type="submit" value="Submit"> 
                  </form>
                  
                  <h3>
                    INRBounds Test Form
                  </h3>
                  <form id="reading-form" action="{{ route('bounds')}}" method="POST">
                    {{csrf_field()}}
                      UpperBound<br>
                      <input type="number" name="UpperBound"><br>
                      LowerBound<br>
                      <input type="number" name="LowerBound"><br>
                      <input type="submit" value="Submit"> 
                  </form>
                  
                  <h3>
                    Medication Test Form
                  </h3>
                  
                  <h3>
                    Medical Event Test Form
                  </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
