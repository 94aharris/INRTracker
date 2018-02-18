<?php

namespace INRTracker\Http\Controllers;

use Illuminate\Http\Request;
use INRTracker\MedicationType;
use INRTracker\MedicalEventType;
use View;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medications = MedicationType::all();
        $medicalevents = MedicalEventType::all();
        $firstname = Auth::user()->firstname;
        $lastname = Auth::user()->lastname;
        return View::make('home',compact('medications','medicalevents','firstname','lastname'));
    }
}
