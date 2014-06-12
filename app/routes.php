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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@about']);

Route::get('quotes', ['as' => 'quotes', 'uses' => 'QuoteController@index']);
Route::post('quotes', ['as' => 'requestQuote', 'uses' => 'QuoteController@process']);

Route::get('jobs', 'JobController@listings');
Route::get('jobs/view/{id}', 'JobController@view');

Route::get('announcements', 'AnnouncementController@archive');
Route::get('announcements/{slug}', 'AnnouncementController@view');

Route::group(['before' => 'auth'], function() {

  // Home page
  // -------------------------------------------
  Route::get('admin', ['as' => 'adminHome', 'uses' => 'AdminController@index']);

  // Announcements
  // -------------------------------------------
  Route::get('admin/announcements',               ['as' => 'adminAnnouncementsArchive', 'uses' => 'AdminAnnouncementController@archive']);
  Route::get('admin/announcements/view/{slug}',   ['as' => 'adminViewAnnouncement', 'uses' => 'AdminAnnouncementController@getView']);
  Route::get('admin/announcements/delete/{id}',   ['as' => 'deleteAnnouncement', 'uses' => 'AdminAnnouncementController@delete']);

  Route::get('admin/announcements/post',          ['as' => 'newAnnouncement', 'uses' => 'AdminAnnouncementController@getPost']);
  Route::post('admin/announcements/post',         ['as' => 'submitAnnouncement', 'uses' => 'AdminAnnouncementController@saveAnnouncement']);

  Route::get('admin/announcements/edit/{slug}',   ['as' => 'editAnnouncement', 'uses' => 'AdminAnnouncementController@getEdit']);
  Route::post('admin/announcements/edit/{slug}',  ['as' => 'submitAnnouncementEdit', 'uses' => 'AdminAnnouncementController@doEdit']);

  // Job Postings
  // -------------------------------------------
  Route::get('admin/jobs',              ['as' => 'adminJobList', 'uses' => 'AdminJobController@listJobs']);
  Route::get('admin/jobs/view/{id}',    ['as' => 'adminJobView', 'uses' => 'AdminJobController@getView']);
  Route::get('admin/jobs/delete/{id}',  ['as' => 'deleteJob', 'uses' => 'AdminJobController@delete']);

  Route::get('admin/jobs/post',         ['as' => 'newJob', 'uses' => 'AdminJobController@getPost']);
  Route::post('admin/jobs/post',        ['as' => 'submitJob', 'uses' => 'AdminJobController@saveJob']);

  Route::get('admin/jobs/edit/{id}',    ['as' => 'editJob', 'uses' => 'AdminJobController@getEdit']);
  Route::post('admin/jobs/edit/{id}',   ['as' => 'submitJobEdit', 'uses' => 'AdminJobController@doEdit']);

  // Can't log out if you aren't logged in.
  // -------------------------------------------
  Route::get('admin/logout', ['as' => 'logout', 'uses' => 'AdminController@logout']);
});
Route::get('admin/add', 'AdminController@add');
Route::post('admin/add',    ['as' => 'add', 'uses' => 'AdminController@addAdmin']);
Route::get('admin/login',   ['as' => 'login', 'uses' => 'AdminController@login']);
Route::post('admin/login',  ['as' => 'doLogin', 'uses' => 'AdminController@doLogin']);