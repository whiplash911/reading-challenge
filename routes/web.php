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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

/** Challenges */
Route::get('/challenges', 'ChallengeController@index')->name('challenges');
Route::get('/challenges/create', 'ChallengeController@create')->name('challenges_create');
Route::get('/challenges/{challenge}', 'ChallengeController@show')->name('challenges_show');
Route::post('/challenges', 'ChallengeController@store');
Route::delete('/challenges/{challenge}', 'ChallengeController@destroy');

/** Books */
Route::patch('/books/complete/{book}', 'BookController@complete');

/** Profile */
Route::get('/profile/{user}', 'ProfileController@profile')->name('profile');
