<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::get('/logout' , function(){
	Auth::logout();
});*/

Route::get('/', function () {
    return view('sections.home');
});


Route::auth();
Route::post('/login' , 'Auth\AuthController@loginDtqdv');
Route::get('/home', 'HomeController@index');

Route::get('crear-torneo' , [
	'middleware' => ['auth' , 'organizador'] ,
	'uses' => 'TorneosController@ViewCreate'
]);

Route::post('crear-torneo' , [
	'middleware' => ['auth' , 'organizador'] , 
	'uses' => 'TorneosController@Add'
]);

