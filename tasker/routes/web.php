<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['middleware'=>'web'], function (){


	Route::get('/{author?}', [
	'uses'=>'TaskController@getIndex',
	'as'=>'index'
	]);


	Route::post('/new', [
	'uses' =>'TaskController@postTask',
	'as'=> 'create'
	]);

	Route::get('/delete/{task_id}',[
		'uses' => 'TaskController@getDeleteTask',
		'as' => 'delete'
	]);

	Route::get('/admin/login',[
		'uses'=>'AdminController@getLogin',
		'as'	=>'admin.login'

		]);

	Route::post('/admin/login',[
		'uses'=>'AdminController@postLogin',
		'as'	=>'admin.login'

		]);

	Route::get('/admin/dashboard',[
		'uses'=>'AdminController@getDashboard',
		'as'	=>'admin.dashboard'

		]);
});