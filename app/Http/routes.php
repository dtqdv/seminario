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

//vistas//
Route::auth();
Route::get('/', [
	'as' => 'home' , 
	'uses' => function()
	{
		return view('sections.home');
	}
]);

Route::get('/torneos' , [
	'as' => 'torneos' ,
	'uses' => function()
	{
		return 'torneos';
	}
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

Route::get('torneos/crear' , [
	'middleware' => ['auth'] ,//organizador
	'uses' => 'TorneosController@ViewCreate' ,
	'as' => 'crear_torneo'
]);

Route::get('/mis_torneos' , [
	'middleware' => ['auth'] ,//organizador 
	'as' => 'mis_torneos' ,
	'uses' => 'TorneosController@showAll'
]);

Route::get('torneos/{id}' , [
	'middleware' => 'auth' ,
	'as' => 'torneo' ,
	'uses' => 'TorneosController@showOne'
]);


//vistas//

//acciones//
Route::post('/login' , [//accion login
	'as' => 'login_action' , 
	'uses' => 'Auth\AuthController@loginDtqdv'
]);

Route::get('/logout' , [
	'as' => 'logout' , 
	'uses' => 'Auth\AuthController@logoutDtqdv'
]);

Route::post('torneos/crear' , [
	'as' => 'crear_torneo_action' , 
	'middleware' => ['auth'] , //organizador
	'uses' => 'TorneosController@Add'
]);

Route::post('actualizar-torneo' , [
	'middleware' => ['auth'] ,
	'as' => 'actualizar-torneos' ,
	'uses' => 'TorneosController@actualizar'
]);

Route::get('/eliminar/torneo/{id}' , [
	'middleware' => ['auth'] ,
	'as' => 'eliminar' ,
	'uses' => 'TorneosController@eliminar'
]);
//acciones//
/*
Route::get('/home', [
	'uses' => 'HomeController@index' ,
	'as' => 'home'
]);*/