<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('leaderboard', 'LeaderboardController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('levels', 'LevelsController');
Route::post('levels/{levels}/attempt', 'LevelsController@attempt');
Route::post('levels/{levels}/rate', 'LevelsController@rate');
Route::get('levels/{levels}/{slug}', 'LevelsController@show');

Route::resource('users', 'UsersController');

Route::get('admin', 'AdminController@index');
Route::get('admin/sendMail', 'AdminController@sendMail');