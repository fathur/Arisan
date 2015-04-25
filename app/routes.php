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

Route::get('members/search', ['as' => 'members.search' , 'uses' => 'MembersController@getSearch']);
Route::get('members/truncate', ['as' => 'members.truncate' , 'uses' => 'MembersController@getTruncate']);

Route::get('undian', ['as' => 'undian.all' , 'uses' => 'UndiansController@getAll']);
Route::get('undian/generate/{member_number}', ['as' => 'undian.generate' , 'uses' => 'UndiansController@getGenerate']);
Route::get('undian/search', ['as' => 'undian.getSearch' , 'uses' => 'UndiansController@getSearch']);
Route::get('undian/Search:Results', ['as' => 'undian.search' , 'uses' => 'UndiansController@getResults']);
Route::get('undian/undo/{id}', ['as' => 'undian.undo' , 'uses' => 'UndiansController@getUndo']);

Route::get('search', ['as' => 'search.index' , 'uses' => 'SearchController@getIndex']);
Route::get('search::Results', ['as' => 'search.result' , 'uses' => 'SearchController@getResult']);
Route::get('search/{member_number}', ['as' => 'search.member' , 'uses' => 'SearchController@getMember']);

Route::resource('users', 'UsersController');
Route::resource('members', 'MembersController');
Route::resource('members.undian', 'UndiansController', ['only' => ['destroy']]);

Route::get('import', array('as'=>'import.form','uses'=>'ImportController@getUpload'));
Route::post('import', array('as'=>'import.upload','uses'=>'ImportController@postUpload'));

Route::get('kocok', ['as' => 'kocok.index', 'uses' => 'KocokController@getIndex']);
Route::get('kocok/acak', ['as' => 'kocok.acak', 'uses' => 'KocokController@getAcak']);
Route::get('kocok/undian', ['as' => 'kocok.undian', 'uses' => 'KocokController@getNomorUndian']);
Route::get('kocok/menang/{nomor_undian}', ['as' => 'kocok.menang', 'uses' => 'KocokController@getMenang']);


Route::get('test', function() {
	$undian = Undian::where('undian_number','=',232699)->get();
	dd(count($undian));
});