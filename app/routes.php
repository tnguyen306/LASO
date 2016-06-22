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

Route::get('/diff/{i1}/{i2}', 'DiffController@diff');
Route::get('/legislator/{id}', 'AuthorController@index');
Route::get('/legislators/', 'AllLegController@index');
Route::get('/legislators/{state}', 'AllLegController@bystate');

//favorites 
Route::get('/favrm/{id}', 'FavController@rmfav');
Route::get('billadd/{id}/{bid}', 'BillController@favadd');
Route::get('legadd/{id}', 'AuthorController@favadd');
Route::get('qadd/{query}', 'SearchController@favadd');

//doc compare thing?
Route::get('/mdc', 'CompareController@lazy');
Route::get('/docs/', 'CustomDocController@landing');
Route::get('/docs/show/{id}', 'CustomDocController@show');
Route::get('/docs/edit/{id}', 'CustomDocController@edit');
Route::post('/docs/edit/{id}', 'CustomDocController@edit_post');
Route::get('/docs/new', 'CustomDocController@create');
Route::post('/docs/new', 'CustomDocController@create_post');
Route::get('/docs/compare/{id1}/{id2}', 'CustomDocController@compare');
Route::get('/docs/select/{id}', 'CustomDocController@select_compare');
Route::get('/docs/del/{id}', 'CustomDocController@delete');
Route::post('/docs/del/{id}', 'CustomDocController@delete_post');

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
Route::get('db', 'UserController@index');

//landing
Route::get('/', 'SearchController@landing');

//find bills
Route::get('/search', 'SearchController@index');
Route::post('/find', 'SearchController@find');
Route::post('/compare/{id}','CompareController@find');
Route::get('/compare/{id}','CompareController@index');

//api stuff
Route::get('/api/docs', 'ApiController@docs');
Route::get('/api/doc/{id}', 'ApiController@doc');
Route::get('/api/legs', 'ApiController@legislators');
Route::get('/api/leg/{id}', 'ApiController@legislator');
Route::get('/api/bills/{low}/{size}', 'ApiController@bills');
Route::get('/api/bill/{id}', 'ApiController@bill');

//expose the public directory
Route::get('/public/{slug}',function($slug)
{
    return File::get(public_path() . '/public/' . $slug);
});
