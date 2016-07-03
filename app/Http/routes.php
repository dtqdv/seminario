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

Route::post('/login' , [//accion login
	'as' => 'login' , 
	'uses' => 'Auth\AuthController@loginDtqdv'
]);

Route::get('/home', [
	'uses' => 'HomeController@index' ,
	'as' => 'home'
]);

Route::get('/login' , [
	'as' => 'login' ,
	'uses' => function()
	{
		return view('auth.login');
	}
]);

Route::get('/register' , [
	'as' => 'registro' ,
	'uses' => function()
	{
		return view('auth.register');
	}
]);

Route::get('/logout' , [
	'as' => 'logout' , 
	'uses' => 'Auth\AuthController@logoutDtqdv'
]);

Route::get('crear-torneo' , [
	'middleware' => ['auth'] ,//organizador
	'uses' => 'TorneosController@ViewCreate' ,
	'as' => 'crear-torneo'
]);

Route::post('crear-torneo' , [
	'middleware' => ['auth'] , //organizador
	'uses' => 'TorneosController@Add'
]);

Route::get('torneos' , [
	'middleware' => ['auth'] ,//organizador 
	'as' => 'torneos' ,
	'uses' => 'TorneosController@showAll'
]);

Route::get('torneos/{id}' , [
	'middleware' => 'auth' ,
	'as' => 'torneo' ,
	'uses' => 'TorneosController@showOne'
]);
Route::post('actualizar-torneo' , [
	'middleware' => ['auth'] ,
	'as' => 'actualizar-torneos' ,
	'uses' => 'TorneosController@actualizar'
]);