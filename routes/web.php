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

Route::get('login', 'LoginController@getLogin');
Route::post('login', ['uses' => 'LoginController@postLogin', 'as' => 'login']);
Route::get('logout', ['uses' => 'LoginController@getLogout', 'as' => 'logout']);

Route::middleware(['checkLogin'])->group(function() {
	Route::get('dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);
	Route::resource('users', 'UsersController')->only('index');
	Route::resource('favourites', 'FavouritesController')->only('index');
	Route::resource('jobs', 'JobsController');
	Route::resource('categories', 'CategoriesController');
	Route::resource('fboders', 'FbodersController');
});
