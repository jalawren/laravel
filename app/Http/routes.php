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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', ['as' => 'SESSION_MANAGER', 'uses' => 'HomeController@index']);


Route::group(['prefix' => 'auth'], function () {
    Route::get('login', ['as' => 'SU00', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login',  ['as' => 'SU00P', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('logout', ['as' => 'SU00O', 'uses' =>  'Auth\AuthController@getLogout']);
});




//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);