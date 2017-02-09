<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Posts
Route::get('/all-posts', 'PostsController@allPosts');
Route::get('/published-posts', 'PostsController@publishedPosts')->middleware('guest');
Route::post('/save-post', 'PostsController@savePost');
Route::put('/update-post', 'PostsController@updatePost');
Route::get('/categories', 'PostsController@getCategories');
Route::get('/statuses', 'PostsController@getStatuses');

// Profile
Route::get('/profile', 'ProfileController@getProfile');
Route::post('/save-profile', 'ProfileController@saveProfile');
