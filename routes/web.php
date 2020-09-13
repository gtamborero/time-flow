<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]); //verify email

// After login -> Home -> Redirects to profile/username
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/last-exchanges', 'HomeController@lastExchanges')->name('lastExchanges');

Route::get('/profile/{username}', 'ProfileViewController@index')->name('profileView');
Route::get('/profile/{username}/edit', 'ProfileEditController@index')->middleware('verified');
Route::post('/save-user-data', 'ProfileSaveController@index')->middleware('verified');
Route::post('/save-user-location', 'ProfileSaveController@location')->middleware('verified');

Route::get('/exchange-view/{id}', 'ExchangeViewController@index')->name('exchangeView')->middleware('verified');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('search', 'SearchController@index')->name('search');

Route::resource('exchange', 'ExchangeController')->middleware('verified');

Route::put('comment-exchange/{id}', 'CommentController')->middleware('verified');
