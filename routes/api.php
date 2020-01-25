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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('GET/profile', 'API\ProfileController@index')->middleware('auth:api');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('store', 'GuzzlePostController@store');
Route::get('index', 'GuzzlePostController@index');
Route::get('GET/countries', 'CountriesApiController@index');
Route::post('POST/users','UsersApiController@create');
Route::get('GET/users/{id}','UsersApiController@show');
Route::put('PUT/users/{id}','UsersApiController@update');
Route::delete('DELETE/users/{id}','UsersApiController@destroy');
