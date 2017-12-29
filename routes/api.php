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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Posts
Route::get('/all-posts', 'PostsController@allPosts');
Route::get('/published-posts', 'PostsController@publishedPosts')->middleware('guest');
Route::get('/category/{id}', 'PostsController@getCategory');
Route::get('/post/{id}', 'PostsController@getPost');
Route::post('/save-post', 'PostsController@savePost');
Route::put('/update-post', 'PostsController@updatePost');
Route::delete('/post-delete/{id}', 'PostsController@delete');

Route::get('/categories', 'PostsController@getCategories');
Route::get('/statuses', 'PostsController@getStatuses');

// Profile
Route::get('/profile', 'ProfileController@getProfile');
Route::post('/save-profile', 'ProfileController@saveProfile');

// Mailing list
Route::post('/subscriber', function () {
    try {
        $sub = App\Subscriber::firstOrNew([
            'name' => request('name'),
            'email' => request('email')]
        );

        if (!empty($sub->id)) {
            return response()->json('This email is already subscribed, thanks for the enthusiasm though.');    
        }

        $sub->name = request('name');
        $sub->email = request('email');

        if ($sub->save()) {
            return response()->json('You have successfully registered.');
        }

    } catch (Exception $e) {
        return response()->json('There was an error.');
    }
});
