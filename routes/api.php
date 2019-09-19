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

Route::group(['prefix' => 'v1'], function() {
    Route::get('users', 'UsersController@index');
    
    // Route::resource('users/register', [
    //     'uses' => 'AuthController@store'
    // ]);
    
    Route::post('users/sigin', [
        'uses' => 'AuthController@sigin'
    ]);

    Route::get('category', 'CategoriesController@index');

    Route::get('events', 'EventController@index');
});
