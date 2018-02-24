<?php

use Illuminate\Http\Request;
use App\User;
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
 });

 Route::group(['middleware' => 'auth:api'], function() {
	Route::get('posts', 'PostController@index');
	Route::get('posts/{id}', 'PostController@show');
	Route::get('posts/user', 'PostController@show_post_uid');
	Route::post('posts', 'PostController@store');
	Route::put('posts/{id}', 'PostController@update');
	Route::get('posts/delete/{id}', 'PostController@delete');
	
	
	Route::get('comments', 'CommentController@index');
	Route::get('comments/{id}', 'CommentController@show');
	Route::get('comments/post/{id}', 'CommentController@show_comment_pid');
	Route::post('comments', 'CommentController@store');
	Route::put('comments/{id}', 'CommentController@update');
	Route::get('comments/delete/{id}', 'CommentController@delete');
	
	
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');