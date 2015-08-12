<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/



Route::get('/', ['as' => 'SESSION_MANAGER', 'uses' => 'HomeController@index']);


Route::get('app', ['as' => 'ZD00', 'uses' => 'PriceController@index']);

/*
 * Auth Routes
 */
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', ['as' => 'SO00', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login',  ['as' => 'SO01', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('logout', ['as' => 'SO99', 'uses' =>  'Auth\AuthController@getLogout']);
});

/*
 * Materials
 */
Route::group(['prefix' => 'materials'], function () {
    Route::get('/', ['as' => 'MM60', 'uses' => 'MaterialController@index']);
    Route::get('import', ['as' => 'MM00', 'uses' =>  'MaterialController@excel']);
    Route::get('/{id}', ['as' => 'MM03', 'uses' =>  'MaterialController@show']);
});

/*
 * Boms
 */
Route::group(['prefix' => 'boms'], function () {
    Route::get('/', ['as' => 'CS05', 'uses' => 'BomController@index']);
//    Route::get('/{id}', ['as' => 'MM03', 'uses' =>  'MaterialController@show']);
});

/*
 * Files
 */
Route::group(['prefix' => 'files'], function () {
    Route::get('/', ['as' => 'FM00', 'uses' => 'FileController@index']);
    Route::get('import', ['as' => 'FM06', 'uses' => 'FileController@import']);
    Route::post('import', ['as' => 'FM07', 'uses' => 'FileController@store']);
//    Route::get('/{id}', ['as' => 'MM03', 'uses' =>  'MaterialController@show']);
});