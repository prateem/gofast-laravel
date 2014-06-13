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

Route::get('/',                     ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('about',                 ['as' => 'about', 'uses' => 'PagesController@about']);

Route::get('quotes',                ['as' => 'quotes', 'uses' => 'QuoteController@index']);
Route::post('quotes',               ['as' => 'quotes.request', 'uses' => 'QuoteController@request']);

Route::get('jobs',                  ['as' => 'jobs.index', 'uses' => 'JobController@index']);
Route::get('jobs/{id}',             ['as' => 'jobs.show', 'uses' => 'JobController@show']);
Route::get('jobs/{id}/apply',       ['as' => 'jobs.apply', 'uses' => 'JobController@apply']);

Route::get('announcements',         ['as' => 'announcements.index', 'uses' => 'AnnouncementController@index']);
Route::get('announcements/{slug}',  ['as' => 'announcements.show', 'uses' => 'AnnouncementController@show']);


// Must be logged in to access these routes.
Route::group(['before' => 'auth'], function() {

  // Home page
  // -------------------------------------------
  Route::get('admin', ['as' => 'admin.home', 'uses' => 'AdminController@index']);

  // Announcements
  // -------------------------------------------
  Route::resource('admin/announcements', 'AdminAnnouncementController');
  Route::resource('admin/jobs', 'AdminJobController');

  // Can't log out if you aren't logged in.
  // -------------------------------------------
  Route::get('admin/logout', ['as' => 'logout', 'uses' => 'AdminController@logout']);
});

Route::get('admin/create',  ['as' => 'admin.create', 'uses' => 'AdminController@create']);
Route::post('admin/create', ['as' => 'admin.store', 'uses' => 'AdminController@store']);
Route::get('admin/login',   ['as' => 'login', 'uses' => 'AdminController@login']);
Route::post('admin/login',  ['as' => 'doLogin', 'uses' => 'AdminController@doLogin']);