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

Route::get('/', 'PostsController@index');
Route::get('posts/{post}', 'PostsController@show');
Route::get('post', 'PostsController@create')->middleware('auth');
Route::post('post', 'PostsController@store')->middleware('auth');
Route::get('posts/{post}/edit', 'PostsController@edit')->middleware('auth');
Route::put('posts/{post}/edit', 'PostsController@store')->middleware('auth');
Route::delete('posts/{post}/delete', 'PostsController@delete')->middleware('auth');
Route::get('/admin', 'PostsController@admin');
// Posts by category
Route::get('category/{id}', function ($id) {
    $posts = App\Post::where('category_id', $id)->get();
    $category_name = App\Category::where('id', $id)->pluck('name')->first();
    return view('posts.index', compact('posts', 'by_category', 'category_name'));
});

Route::get('profile/{profile}', 'ProfileController@show');
Route::get('profile', 'ProfileController@create')->middleware('auth');
Route::match(['put', 'post'], 'profile', 'ProfileController@store')->middleware('auth');
