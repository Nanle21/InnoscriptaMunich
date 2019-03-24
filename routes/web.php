<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function(){
	Route::get('/', [ 'uses' => 'Controller@index', 'as' => 'index' ]);

	Route::post('/add_user', ['uses' => 'Controller@addUser', 'as' => 'add_user']);

	Route::get('/questions', ['uses' => 'Controller@Question', 'as' => 'questions'])->middleware('auth');

	Route::post('/submit_answer',  ['uses' => 'Controller@submitAns', 'as' => 'submit_answer'])->middleware('auth');

	Route::get('/result', ['uses' => 'Controller@viewResult', 'as' => 'result'])->middleware('auth');


	Route::get('/get_excel', [
		'uses' => 'Controller@export',
		'as' => 'get_excel'
	])->middleware('auth');

	Route::get('/about', [
		'uses' => 'Controller@About',
		'as' => 'about'
	]);

	Route::get('/logout', [
		'uses' => 'Controller@Logout',
		'as' => 'logout'
	]);

});