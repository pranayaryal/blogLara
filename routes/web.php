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

Auth::routes();

// Posts
Route::get('/', 'PostsController@index');
Route::get('posts/{slug}', 'PostsController@show');
Route::get('post', 'PostsController@create')->middleware('auth');
Route::post('post', 'PostsController@store')->middleware('auth');
Route::get('posts/{post}/edit', 'PostsController@edit')->middleware('auth');
Route::put('posts/{post}/edit', 'PostsController@store')->middleware('auth');
Route::delete('posts/{post}/delete', 'PostsController@delete')->middleware('auth');
Route::get('/admin', 'PostsController@admin');

// Categories
Route::resource('category', 'CategoriesController')->middleware('auth')->except('show');
Route::get('category/{slug}', 'CategoriesController@show');

// Profiles
Route::get('profile', 'ProfileController@create')->middleware('auth');
Route::match(['put', 'post'], 'profile', 'ProfileController@store')->middleware('auth');
Route::get('profile/{slug}', 'ProfileController@show');

// FileManager
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

// Search
Route::get('/search/{query}', 'SearchController@search');

