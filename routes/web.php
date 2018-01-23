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

// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Profiles
Route::get('profile', 'ProfileController@create')->middleware('auth');
Route::match(['put', 'post'], 'profile', 'ProfileController@store')->middleware('auth');
Route::get('profile/{slug}', 'ProfileController@show');
Route::get('profiles/{profile}/edit', 'ProfileController@edit')->middleware('auth');

// Categories
Route::resource('category', 'CategoriesController')->middleware('auth')->except('show');
Route::get('category/{slug}', 'CategoriesController@show');

// Privacy Policy
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

// Posts
Route::get('/admin', 'PostsController@admin')->middleware('auth');
Route::get('/posts', function () { return redirect('/'); });
Route::get('/', 'PostsController@index')->name('home');
Route::get('post', 'PostsController@create')->middleware('auth');
Route::post('post', 'PostsController@store')->middleware('auth');
Route::get('/{slug}', 'PostsController@show');
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

