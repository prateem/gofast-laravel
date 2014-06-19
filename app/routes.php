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

Route::get('jobs/{id}/apply',       ['as' => 'jobs.apply', 'uses' => 'JobApplicationController@show']);
Route::post('jobs/{id}/apply',      ['as' => 'jobs.application.submit', 'uses' => 'JobApplicationController@send']);

Route::get('announcements',         ['as' => 'announcements.index', 'uses' => 'AnnouncementController@index']);
Route::get('announcements/{slug}',  ['as' => 'announcements.show', 'uses' => 'AnnouncementController@show']);

// All routes in this group belong to the /admin/ url.
Route::group(['prefix' => 'admin'], function() {
  // Must be logged in to access these routes.
  Route::group(['before' => 'auth'], function() {

    // Home page
    // -------------------------------------------
    Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@index']);

    // Announcements
    // -------------------------------------------
    Route::resource('announcements', 'AdminAnnouncementController');
    Route::resource('jobs', 'AdminJobController');

    // Can't log out if you aren't logged in.
    // -------------------------------------------
    Route::get('logout', ['as' => 'logout', 'uses' => 'AdminController@logout']);
  });

  Route::get('create',  ['as' => 'admin.create', 'uses' => 'AdminController@create']);
  Route::post('create', ['as' => 'admin.store', 'uses' => 'AdminController@store']);
  Route::get('login',   ['as' => 'login', 'uses' => 'AdminController@login']);
  Route::post('login',  ['as' => 'doLogin', 'uses' => 'AdminController@doLogin']);
});
