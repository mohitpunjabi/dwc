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

use Illuminate\Support\Facades\Auth;

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('feedback',function() {
    return redirect(url('users/' . Auth::user()->id . '/rank'));
});

Route::get('admins',function() {
     return view('admins');
 });
Route::get('leaderboard', 'LeaderboardController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('special_pages/visits', 'SpecialPagesController@allVisits');
Route::resource('special_pages', 'SpecialPagesController');
Route::get('special_pages/{slug}', 'SpecialPagesController@show');

Route::resource('levels', 'LevelsController');
Route::get('levels/{levels}/attempts', 'LevelsController@attempts');
Route::get('levels/{levels}/attempts/top', 'LevelsController@attemptsTop');
Route::post('levels/{levels}/attempt', 'LevelsController@attempt');
Route::post('levels/{levels}/rate', 'LevelsController@rate');
Route::get('levels/{levels}/{slug}', 'LevelsController@show');

Route::get('users/count/{allOrActive}', 'UsersController@count');
Route::post('users/{users}/feedback', 'UsersController@feedback');
Route::post('users/{users}/send', 'UsersController@send');
Route::get('users/{users}/chats', 'UsersController@chats');
Route::get('users/{users}/test', 'UsersController@test');
Route::get('users/{users}/untest', 'UsersController@untest');
Route::get('users/{users}/attempts', 'UsersController@attempts');
Route::get('users/{users}/ratings', 'UsersController@ratings');
Route::get('users/{users}/rank', 'UsersController@rank');
Route::get('users/recent', 'UsersController@recent');

Route::resource('users', 'UsersController');


Route::get('ratings', 'RatingsController@index');

Route::get('attempts/count', 'AttemptsController@count');
Route::get('attempts', 'AttemptsController@index');

Route::get('admin', 'AdminController@index');
Route::get('admin/sendMail', 'AdminController@sendMail');
Route::get('admin/hints', 'AdminController@hints');



Route::get('{slug}', 'SpecialPagesController@show')->where('slug', '[-A-Za-z0-9]+');;