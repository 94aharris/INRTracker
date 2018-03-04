<?php

namespace INRTracker\Http\Controllers;

use Illuminate\Http\Request;
use INRTracker\INRReading;
use Auth;
use Validator;

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
        $data = INRReading::where('UserId','LIKE',$userid)->orderBy('Reading_Date')->get();
        
        
        return response()->json($data, 200);
      }
      
      // Return error back to user if not logged in
      return response('Not Logged In',403);
    }
  
  // Full Store Request  
  public function store(Request $request)
    {
        if(Auth::check())
        {
                    
        // Validation Documentation https://laravel.com/docs/5.6/validation 
        $validator = Validator::make($request->all(), [
            'INR_Reading' => 'required|integer|min:0|max:99',
            'Reading_Date' => 'date|before:tomorrow|after:"2017-01-01"'
        ]);
        
        // Modify to iterate through all the errors
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }
          
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
  
    //Update Reading
    public function update(Request $request)
    {
    
        if(Auth::check())
        {
          $UserId = Auth::user()->id;
          
          // Validation Documentation https://laravel.com/docs/5.6/validation 
          $validator = Validator::make($request->all(), [
              'INR_Reading' => 'required|min:0|max:99',
              'INR_ID' => 'required|integer|min:0'
          ]);
          
          // Modify to iterate through all the errors
          if ($validator->fails()) {
              return response()->json($validator->errors(),400);
          }
          
          $getReading = INRReading::where('INR_Reading_ID', $request->INR_ID)->first();
          
          if ($getReading->UserId != $UserId) {
              return response('Unauthorized',403);
          }
          
          $updatedINR = $getReading->update(
            ['INR_Reading'=>$request->INR_Reading]
           );
          return response()->json($updatedINR, 201);
        }
        
        return response('Not Logged In',403);
        
    }
  
    //Delete Reading
    public function delete(Request $request)
    {
      
      if (Auth::check())
      {
        $UserId = Auth::user()->id;
        
        //Validation
        $validator = Validator::make($request->all(), [
          'INR_ID' => 'required|integer|min:0'
        ]);
        
        if ($validator->fails()) {
          return response()->json($validator->errors(),400);
        }
        
        $getReading = INRReading::where("INR_Reading_ID", $request->INR_ID)->first();
        
        if ($getReading->UserId != $UserId) {
          return response('Unauthorized',403);
        }
        
        $deleteOutcome = $getReading->delete();
        return response()->json($deleteOutcome,201);
      }
      
      return respone('Not Logged In',403);
    }
  
}
