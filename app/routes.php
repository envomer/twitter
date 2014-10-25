<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

// Important User Routes
Route::get('register', 'UsersController@create');
Route::post('register', 'UsersController@store');

Route::get('/user/{username}', 'UsersController@show');

// Sessions Routes - Handle the login/logout
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');

// Tweet Routes
Route::resource('tweet', 'TweetsController');
Route::get('tweets/search', 'SearchController@tweets');

// Following Routes
Route::get('/user/{username}/following', 'FollowsController@index');
Route::get('/user/{username}/followers', 'FollowsController@followers');
Route::delete('follow/{id}', 'FollowsController@destroy');
Route::post('follow', 'FollowsController@store');
