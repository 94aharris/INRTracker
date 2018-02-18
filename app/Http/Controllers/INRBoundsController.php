<?php

namespace INRTracker\Http\Controllers;

use Illuminate\Http\Request;
use INRTracker\INRBounds;
use Auth;
use Validator;

class INRBoundsController extends Controller
{
    public function index()
    {
      if (Auth::check())
      {
        $userid = Auth::user()->id;
        return response()->json(INRBounds::where('UserId','LIKE',$userid)->get(), 200);
      }
      
      // Return error back to user if not logged in
      return response('Not Logged In',403);
    }
  
  //Test Function
  public function indextest()
    {
      $userid = 1;
      return response()->json(INRBounds::where('UserId','LIKE',$userid)->get(), 200);
    }
  
  // Need to create validator...  
  public function update(Request $request)
    {
    
        if(Auth::check())
        {
          $UserId = Auth::user()->id;
          
          // Validation Documentation https://laravel.com/docs/5.6/validation 
          $validator = Validator::make($request->all(), [
              'UpperBound' => 'required|integer|min:0|max:99',
              'LowerBound' => 'required|integer|min:0|max:99'
          ]);

          // Modify to iterate through all the errors
          if ($validator->fails()) {
              return response()->json($validator->errors(),400);
          }
          
          $bounds = INRBounds::updateOrCreate(
              ['UserId'=>$UserId], ['UpperBound'=>$request->UpperBound,'LowerBound'=>$request->LowerBound]
           );
          return response()->json($bounds, 201);
        }
        
        return response('Not Logged In',403);
        
    }
  
  //Test Function
  public function updatetest(Request $request)
  {
    
          $UserId = 1;
          $bounds = INRBounds::updateOrCreate(
              ['UserId'=>$UserId], ['UpperBound'=>$request->UpperBound,'LowerBound'=>$request->LowerBound]
           );
          return response()->json($bounds, 201);
        
  }
}
