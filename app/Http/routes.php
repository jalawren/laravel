<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/



Route::get('/', ['as' => 'SESSION_MANAGER', 'uses' => 'HomeController@index']);


Route::get('borealis', ['as' => 'ZVD00', 'uses' => 'PriceController@index']);


Route::get('filemanager', ['as' => 'ZFM00', 'uses' => 'FileManagerController@index']);

/*
 * Auth Routes
 */
Route::group(['prefix' => 'auth'], function () {


    Route::get('login', ['as' => 'SO00', 'uses' => 'Auth\AuthController@getLogin']);

    Route::post('login',  ['as' => 'SO01', 'uses' => 'Auth\AuthController@postLogin']);

    Route::get('logout', ['as' => 'SO99', 'uses' =>  'Auth\AuthController@getLogout']);
});

/*
 * Customers
 */
Route::group(['prefix' => 'customers'], function () {

    Route::get('/{id}', ['as' => 'XD03', 'uses' =>  'CustomerController@show']);
});

/*
 * Customers
 */
Route::group(['prefix' => 'cmir'], function () {

    Route::get('/{customer}/{material}', ['as' => 'XD03', 'uses' =>  'CustomerController@cmir']);
});

/*
 * Materials
 */
Route::group(['prefix' => 'materials'], function () {
//    Route::get('/', ['as' => 'MM60', 'uses' => 'MaterialController@index']);

    Route::get('customer/{id}', ['as' => 'MM00C', 'uses' =>  'MaterialController@getByCustomer']);

    Route::get('/{id}', ['as' => 'MM03', 'uses' =>  'MaterialController@show']);
});

/*
 * Boms
 */
Route::group(['prefix' => 'boms'], function () {

    Route::get('/{id}', ['as' => 'CS03', 'uses' =>  'BomController@show']);
});

/*
 * Price
 */
Route::group(['prefix' => 'prices'], function () {

    Route::get('/{id}', ['as' => 'XP03', 'uses' =>  'PriceController@scale']);
});

/*
 * Files
 */
Route::group(['prefix' => 'files'], function () {

    Route::get('/', ['as' => 'FM00', 'uses' => 'FileController@index']);

//    Route::get('import', ['as' => 'FM06', 'uses' => 'FileController@import']);

    Route::post('import', ['as' => 'FM07', 'uses' => 'FileController@move']);
});