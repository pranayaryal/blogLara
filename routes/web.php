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

Route::get('/admin', 'PostsController@admin');

// Profiles
Route::get('profile', 'ProfileController@create')->middleware('auth');
Route::match(['put', 'post'], 'profile', 'ProfileController@store')->middleware('auth');
Route::get('profile/{slug}', 'ProfileController@show');

// Categories
Route::resource('category', 'CategoriesController')->middleware('auth')->except('show');
Route::get('category/{slug}', 'CategoriesController@show');

// Posts
Route::get('/', 'PostsController@index');
Route::get('/{slug}', 'PostsController@show');
Route::get('post', 'PostsController@create')->middleware('auth');
Route::post('post', 'PostsController@store')->middleware('auth');
Route::get('posts/{post}/edit', 'PostsController@edit')->middleware('auth');
Route::put('posts/{post}/edit', 'PostsController@store')->middleware('auth');
Route::delete('posts/{post}/delete', 'PostsController@delete')->middleware('auth');

// FileManager
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

// Search
Route::post('/search', 'SearchController@search')->name('search');

