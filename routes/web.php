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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('coba', 'userController@index')->name('coba');

// Route::get('coba/edit', 'userController@update');

Route::resource('user', 'UserController');
Route::resource('country', 'CountryController');
Route::get('dataTable.user', 'UserController@dataTable')->name('dataTable.user');
Route::get('dataTable.country', 'CountryController@dataTableCountry')->name('dataTable.country');
Route::get('admin', 'AdminController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::post('update/{id}', 'ProfileController@update')->name('profile.update');
});

Route::get('user/create', 'UserController@create');
Route::post('user', 'UserController@store')->name('user.create');
