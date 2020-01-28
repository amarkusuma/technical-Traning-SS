<?php

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;
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

Route::post('login', 'API\UserController@login')->middleware('cors');
Route::post('register', 'API\UserController@register')->middleware('cors');
Route::get('GET/profile', 'API\ProfileController@index')->middleware('auth:api');

Route::put('profile', 'API\UserController@update')->middleware('auth:api');

// Route::group(['middleware' =>  ['cors'], 'auth:api'], function () {
//     Route::post('details', 'API\UserController@details');
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', 'API\UserController@details');
});

Route::get('users', 'UsersApiController@index')->middleware('cors');
Route::post('users', 'UsersApiController@create')->middleware('cors');
Route::get('users/{id}', 'UsersApiController@show')->middleware('cors');
Route::put('users/{id}', 'UsersApiController@update')->middleware('cors');
Route::delete('DELETE/users/{id}', 'UsersApiController@destroy')->middleware('cors');

// Route::get('/eloquent/GET/user', function () {
//     return UserResource::collection(User::get());
// });
// Route::post('/eloquent/POST/user', function () {
//     return UserResource::collection(User::all());
// });
// Route::get('/eloquent/GET/user/{id}', function ($id) {
//     return UserResource::collection(User::get()->where('id', $id));
// });
// Route::get('GET/coba1', 'UsersApiController@index')->middleware('cors');
// Route::post('/eloquent/PUT/user/{id}', function (Request $request, $id) {
//     $sample = User::get()->where('id', $id);
//     $sample->all();
//     return UserResource::collection($sample);
// });
