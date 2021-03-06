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

// Routes where looking up language:
Route::group(['middleware' => 'language'], function () {

  Auth::routes(['verify' => true]); //verify email

  // After login -> Home -> Redirects to profile/username
  Route::get('/', 'HomeController@index')->name('home');
  
  // Route language /en to /
  Route::get('/en', function(){
	  return redirect('/');
  });

  Route::get('/home', 'HomeController@index')->name('language::back');
  Route::get('/last-exchanges', 'HomeController@lastExchanges')->name('lastExchanges');

  Route::get('/profile/{username}', 'ProfileViewController@index')->name('profileView');
  Route::get('/profile/{username}/edit', 'ProfileEditController@index')->name('profileEdit')->middleware('verified');

  Route::get('/exchange-view/{id}', 'ExchangeViewController@index')->name('exchangeView')->middleware('verified');

  Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
  Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

  Route::get('search', 'SearchController@index')->name('search');
  Route::get('show-all-users', 'SearchController@all')->name('showAllUsers');

  Route::post('/save-user-data', 'ProfileSaveController@index')->middleware('verified');

  Route::resource('exchange', 'ExchangeController')->middleware('verified');
  Route::put('comment-exchange/{id}', 'CommentController')->middleware('verified');

});

// Clear session exception
Route::get('/clear-session', function(){
  Cookie::queue(Cookie::forget(strtolower(config('app.name')) . '_session'));
  return redirect('/');
});

// Artisan Controller
Route::get('/exec2020', 'ArtisanController');
Route::get('/mailwork', 'ArtisanController@mailWork');
