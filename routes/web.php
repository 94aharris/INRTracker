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

//History Controller Route
Route::get('/history', "HistoryController@index")->name('history');

//Food Dashboard Controller Route
Route::get('/fooddashboard',"FooddashboardController@index")->name('fooddashboard');

//Test Pages, Delete Later
Route::get('/react',function() {
  return view('reacttest');
});

//Routes for INRReadings
Route::get('readings', 'INRReadingController@showuser');
Route::post('readings', array('as' => 'readings', 'uses' => 'INRReadingController@store'));
Route::post('readings/update', array('as' => 'readingsupdate', 'uses' => "INRReadingController@update"));
Route::post('readings/delete', array('as' => 'readingsdelete', 'uses' => "INRReadingController@delete"));

//Routes for INRBounds
Route::get('bounds', 'INRBoundsController@index');
Route::post('bounds', array('as' => 'bounds', 'uses' => 'INRBoundsController@update'));
Route::post('bounds/lower', array('as' => 'boundslower', 'uses' => 'INRBoundsController@updateLower'));
Route::post('bounds/upper', array('as' => 'boundsupper', 'uses' => 'INRBoundsController@updateUpper'));

//Medication Types
Route::get('medications', 'MedicationTypeController@show');
Route::post('medications/add', 'MedicationTypeController@store');
Route::post('medicationdose',array('as' => 'medicationdose', 'uses' => 'MedicationDoseController@store'));

//Medical Event Types
Route::get('medicalevents','MedicalEventTypeController@show');
Route::get('medicalevent','MedicalEventController@index');
Route::post('medicalevent',array('as' => 'medicalevent', 'uses' => 'MedicalEventController@store'));
Route::post('medicalevent/delete',array('as' => 'medicaleventdelete', 'uses' => 'MedicalEventController@delete'));

//Routes for Food Items
Route::post('food/search', array('as' => 'foodsearch', 'uses' => 'FoodItemController@apiStringSearch'));
Route::post('food/nutr', array('as' => 'foodnutr', 'uses' => 'FoodItemController@apiFoodNutr'));
Route::post('food/addeaten', array('as' => 'foodaddeaten', 'uses' => 'FoodEatenController@addEaten'));

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
