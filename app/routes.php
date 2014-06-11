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
Route::post('quotes', 'QuoteController@process');

Route::get('jobs', 'JobController@listings');
Route::get('jobs/view/{id}', 'JobController@view');

Route::get('announcements', 'AnnouncementController@archive');
Route::get('announcements/{slug}', 'AnnouncementController@view');

Route::group(['before' => 'auth'], function() {

  // Home page
  Route::get('admin', ['as' => 'adminHome', 'uses' => 'AdminController@index']);

  // Announcements
  Route::get('admin/announcements', 'AdminAnnouncementController@index');
  Route::get('admin/announcements/post', 'AdminAnnouncementController@post');
  Route::get('admin/announcements/delete', 'AdminAnnouncementController@delete');
  Route::get('admin/announcements/edit', 'AdminAnnouncementController@edit');

  // Job Postings
  Route::get('admin/jobs', 'AdminJobController@index');
  Route::get('admin/jobs/post', 'AdminJobController@post');
  Route::get('admin/jobs/edit', 'AdminJobController@edit');
  Route::get('admin/jobs/delete', 'AdminJobController@delete');

  // Can't log out if you aren't logged in.
  Route::get('admin/logout', ['as' => 'logout', 'uses' => 'AdminController@logout']);
});
Route::get('admin/add', 'AdminController@add');
Route::post('admin/add', ['as' => 'add', 'uses' => 'AdminController@addAdmin']);
Route::get('admin/login', ['as' => 'login', 'uses' => 'AdminController@login']);
Route::post('admin/login', ['as' => 'doLogin', 'uses' => 'AdminController@doLogin']);