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

Route::get('special_pages/visits', 'SpecialPagesController@allVisits');
Route::resource('special_pages', 'SpecialPagesController');
Route::get('special_pages/{slug}', 'SpecialPagesController@show');

Route::resource('levels', 'LevelsController');
Route::post('levels/{levels}/attempt', 'LevelsController@attempt');
Route::post('levels/{levels}/rate', 'LevelsController@rate');
Route::get('levels/{levels}/{slug}', 'LevelsController@show');

Route::get('users/count/{allOrActive}', 'UsersController@count');
Route::get('users/recent', 'UsersController@recent');
Route::get('users/{users}/test', 'UsersController@test');
Route::get('users/{users}/untest', 'UsersController@untest');

Route::get('ratings', 'RatingsController@index');

Route::get('attempts/count', 'AttemptsController@count');
Route::get('attempts', 'AttemptsController@index');

Route::get('admin', 'AdminController@index');
Route::get('admin/sendMail', 'AdminController@sendMail');
Route::get('admin/hints', 'AdminController@hints');



Route::get('{slug}', 'SpecialPagesController@show');