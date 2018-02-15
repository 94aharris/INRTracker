<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['auth']], function() {
    //Put routes here that should redirect to the login page if the user is not logged in
});

//View Routes
Route::get('/', function () {
    return view('welcome');
});

//Home Controller Route
Route::get('/home', 'HomeController@index')->name('home');

//Test Pages, Delete Later
Route::get('/react',function() {
  return view('reacttest');
});
Route::get('readingstest', 'INRReadingController@testShowUser');

//Routes for INRReadings
Route::get('readings', 'INRReadingController@showuser');
Route::post('readings', array('as' => 'readings', 'uses' => 'INRReadingController@store'));

//Routes for INRBounds
Route::get('bounds', 'INRBoundsController@index');
Route::post('bounds', array('as' => 'bounds', 'uses' => 'INRBoundsController@update'));
Route::get('boundstest', 'INRBoundsController@indextest');
Route::post('boundstest', array('as' => 'boundstest', 'uses' => 'INRBoundsController@updatetest'));

// Authentication Routes...
Auth::routes();

//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');
