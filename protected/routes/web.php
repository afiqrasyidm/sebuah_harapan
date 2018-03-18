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


Route::get('/', 'HomeController@login_homepage');

Route::get('/userrr', 'PublicController@allUser');


Route::group(['middleware' => ['auth']], function () { 

	Route::get('/ask', 'PostController@ask');
	Route::get('/myquestion', 'PostController@show_post_uid');
	Route::post('/ask', 'PostController@ask_post');
	Route::post('post/upvote', 'PostController@up_vote');
		
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new', 'HomeController@new')->name('new');

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();
Route::post('post/{id}', 'PostController@comment_post');


Route::get('/test', 'HomeController@test');

Route::get('post/{id}', [ 
    'as' => 'show.single.post',
    'uses' =>'PostController@show',
])->where('id', '[0-9]+');