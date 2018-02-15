<?php

namespace INRTracker\Http\Controllers;

use Illuminate\Http\Request;
use INRTracker\INRReading;
use Auth;

class INRReadingController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
  
    public function index()
    {
      if (Auth::check())
      {
        $userid = Auth::user()->id;
        return response()->json(INRReading::where('UserId','LIKE',$userid)->get(), 200);
      }
      
      // Return error back to user if not logged in
      return response('Not Logged In',403);
    }
  
    public function showuser()
    {
      // Return results back to user that match their user Id
      if (Auth::check())
      {
        $userid = Auth::user()->id;
        return response()->json(INRReading::where('UserId','LIKE',$userid)->get(), 200);
      }
      
      // Return error back to user if not logged in
      return response('Not Logged In',403);
    }
  
    public function testShowUser() {
      return response()->json(INRReading::where('UserId','LIKE',1)->get(), 200);
    }
  
  // Need to create validator...  
  public function store(Request $request)
    {
        if(Auth::check())
        {
                    
          $data = array(
            "UserId" => Auth::user()->id,
            "INR_Reading" => $request->INR_Reading,
            "Reading_Date" => $request->Reading_Date
          );
          
          $reading = INRReading::create($data);
          return response()->json($reading, 201);
        }
        
        return response('Not Logged In',403);
        
    }
  
}
