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

//Route::get('/', function () {
////    return view('belimbing/home');
//});

Route::get('/', 'PublicController@index');

Route::group(['middleware' => ['auth']], function () { 
	Route::get('posts', 'PostController@index');
	Route::get('posts/{id}', 'PostController@show');
	Route::post('posts', 'PostController@store');
	Route::put('posts/{id}', 'PostController@update');
	Route::delete('posts/{id}', 'PostController@delete');
		
});

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'HomeController@test');

Route::get('post/{id}', [ 
    'as' => 'show.single.post',
    'uses' =>'PostController@show',
])->where('id', '[0-9]+');