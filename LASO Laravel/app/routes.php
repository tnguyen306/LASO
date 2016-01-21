<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/fav/{id}', 'FavController@fav');
Route::get('bill/{id}', 'BillController@bill');
Route::get('billrm/{id}/{bid}', 'BillController@favrm');
Route::get('billadd/{id}/{bid}', 'BillController@favadd');
Route::get('db', 'UserController@index');
Route::get('/diff/{i1}/{i2}', 'DiffController@diff');
Route::get('/search', 'SearchController@index');
Route::get('/', 'SearchController@index');
Route::get('/compare/{id}', 'CompareController@index');