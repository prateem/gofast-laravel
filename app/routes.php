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
Route::get('about', 'HomeController@about');

Route::get('quotes', 'QuoteController@index');

Route::get('jobs', 'JobController@listings');
Route::get('jobs/view/{id}', 'JobController@view');

Route::get('announcements', 'AnnouncementController@archive');
Route::get('announcements/{slug}', 'AnnouncementController@view');