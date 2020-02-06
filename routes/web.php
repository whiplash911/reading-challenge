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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/** Challenges */
Route::get('/challenges', 'ChallengeController@index');
Route::get('/challenges/create', 'ChallengeController@create');
Route::post('/challenges', 'ChallengeController@store');
Route::get('/challenges/{challenge}', 'ChallengeController@show');
Route::delete('/challenges/{challenge}', 'ChallengeController@destroy');

/** Books */
Route::get('/books/complete/{book}', 'BookController@complete');
