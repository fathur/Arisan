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

Route::get('/', ['as' => 'home', 'uses' => 'KocokController@getIndex']);

Route::get('login', array('as' => 'auth.login', 'uses' => 'AuthenticationController@login'));
Route::post('login', array('as' => 'auth.login', 'uses' => 'AuthenticationController@postLogin'));
Route::get('logout', array('as' => 'auth.logout', 'uses' => 'AuthenticationController@logout'));
Route::get('register', array('as' => 'auth.register', 'uses' => 'AuthenticationController@register'));

Route::post('members/search', ['as' => 'members.search' , 'uses' => 'MembersController@postSearch']);
Route::get('undian/search', ['as' => 'undian.getSearch' , 'uses' => 'UndiansController@getSearch']);
Route::post('undian/search', ['as' => 'undian.search' , 'uses' => 'UndiansController@postSearch']);
Route::get('search', ['as' => 'search.index' , 'uses' => 'SearchController@getIndex']);
Route::post('search', ['as' => 'search.result' , 'uses' => 'SearchController@postResult']);


Route::resource('users', 'UsersController');
Route::resource('members', 'MembersController');
Route::resource('undian', 'UndiansController');

Route::get('import', array('as'=>'import.form','uses'=>'ImportController@getUpload'));
Route::post('import', array('as'=>'import.upload','uses'=>'ImportController@postUpload'));

Route::get('kocok', ['as' => 'kocok.index', 'uses' => 'KocokController@getIndex']);
Route::get('kocok/random', ['as' => 'kocok.random', 'uses' => 'KocokController@getRandom']);