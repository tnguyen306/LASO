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


//bills, etc

Route::get('/fav/{id}', 'FavController@fav');
Route::get('bill/{id}', 'BillController@bill');
Route::get('billrm/{id}/{bid}', 'BillController@favrm');
Route::get('billadd/{id}/{bid}', 'BillController@favadd');
Route::get('db', 'UserController@index');
Route::get('/diff/{i1}/{i2}', 'DiffController@diff');
Route::get('/search', 'SearchController@index');
Route::get('/', 'SearchController@index');
Route::get('/compare/{id}', 'CompareController@index');
Route::get('/legislator/{id}', 'AuthorController@index');
Route::get('/legislators/', 'AllLegController@index');

//login stuff
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');
Route::get('/logout', 'LoginController@logout');

//admin functions
Route::get('edit/{id}', 'AdminController@billmenu');
Route::post('edit/{id}', 'AdminController@edittext');
Route::get('admin', 'AdminController@index');
Route::get('adminlogin', 'AdminController@adminloginpage');
Route::post('adminlogin', 'AdminController@adminlogin');
Route::get('adminlogout', 'AdminController@adminlogout');

