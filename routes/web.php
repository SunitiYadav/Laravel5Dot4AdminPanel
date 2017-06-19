<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){

	Route::get('/CountryStateCity','AdminController@index');
	Route::get('/get-state-list','AdminController@getStateList');
	Route::get('/get-city-list','AdminController@getCityList');

});