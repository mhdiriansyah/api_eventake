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

Route::group(['prefix' => 'v1', 'middleware' => 'cors'], function() {
    
    // users route
    Route::get('users', 'UsersController@index');
    Route::post('user/register', 'AuthController@store');
    Route::post('user/signin', 'AuthController@sigin');

    // event route
    Route::get('events', 'EventController@index');
    Route::get('event/{id}', 'EventController@show');
    Route::post('event', 'EventController@store');
    Route::put('event', 'EventController@store');
    Route::delete('event/{id}', 'EventController@destroy');

    // categories route
    Route::get('categories', 'CategoriesController@index');
    Route::get('category/{id}', 'CategoriesController@show');
    Route::post('category', 'CategoriesController@store');
    Route::put('category', 'CategoriesController@store');
    Route::delete('category/{id}', 'CategoriesController@destroy');
    Route::get('categories/trash', 'CategoriesController@trash');
    Route::get('category/restore/{id}', 'CategoriesController@restore');

});
