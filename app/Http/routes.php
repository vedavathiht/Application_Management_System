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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/summary', 'HomeController@summary');


Route::resource('/workstation', 'WorkstationController');


Route::get('/application', 'ApplicationController@index');
Route::post('/app_del/', 'ApplicationController@app_del');
Route::post('/app_update/', 'ApplicationController@app_update');
Route::post('/app_insert/', 'ApplicationController@app_insert');
//Route::get('/deletews', 'WorkstationController@delws');

 Route::get('/appuser', 'AppuserController@index');
 Route::post('/appuser_insert/', 'AppuserController@appuser_insert');
 Route::post('/appuser_del/', 'AppuserController@appuser_del');
 Route::post('/appuser_update/', 'AppuserController@appuser_update');
//Route::delete('/workstation/{id}', 'WorkstationController@Destroy');
