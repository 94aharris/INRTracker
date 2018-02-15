<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
**Basic Routes for a RESTful service:
**Route::get($uri, $callback);
**Route::post($uri, $callback);
**Route::put($uri, $callback);
**Route::delete($uri, $callback);
**
*/
 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('userid', 'INRReadingController@userid');

//Route::get('readings', 'INRReadingController@index');
 
//Route::get('readings/{reading}','INRReadingController@show');

//Route::get('readings/user/{userid}', 'INRReadingController@showuser');
  
 
//Route::post('readings', function() {
//    return  response()->json([
//            'message' => 'Create success'
//        ], 201);
//});
 
//Route::put('readings/{reading}', function() {
//    return  response()->json([
//            'message' => 'Update success'
//        ], 200);
//});
 
//Route::delete('readings/{reading}',function() {
//    return  response()->json(null, 204);
//});