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

// Global lang param for nl-BE and nl_BE
Route::pattern('lang', '^[a-z]{2}[-|_][A-Z]{2}$');

// *****************************************************

// Filters
Route::filter('check_lang', 'LangFilter');

Route::when('*', 'check_lang');

// *****************************************************

Route::get('', 'HomeController@get_lang');
Route::get('{lang}', 'HomeController@get_index');
/* Uncomment if needed
Route::group(array('prefix' => 'iControl'), function() {
  Route::get('', 'AdminController@get_index');

  Route::get('login', 'AdminController@get_login');
  Route::post('login', 'AdminController@post_login');

  Route::get('logout', 'AdminController@get_logout');
});
*/
