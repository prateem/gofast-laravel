<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminAnnouncementController extends AnnouncementController {

  protected $layout = 'layouts.admin';

  public function index() {
    $announcements = $this->announcement->orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Announcements";
    $this->layout->content = View::make('admin.announcements.index')->withAnnouncements($announcements);
  }

  public function create() {
    $this->layout->title = "Post New Announcement";
    $this->layout->content = View::make('admin.announcements.create');
  }

  public function store() {

    $input = Input::only('title',  'body');

    if ($this->announcement->fill($input)->isValid()) {
      $this->announcement->save();
      return Redirect::route('admin.announcements.index')->withMessage('Announcement successfully posted.');
    } else {
      return Redirect::back()->withInput()->withErrors($this->announcement->errors);
    }

  }

  public function show($slug) {

    try {
      $announcement = $this->announcement->whereSlug($slug)->firstOrFail();
      $this->layout->title = $announcement->title;
      $this->layout->content = View::make('admin.announcements.show')->withAnnouncement($announcement);
    } catch (ModelNotFoundException $e) {
      return Redirect::route('admin.announcements.index')->withError('Announcement not found.');
    }

  }

  public function edit($slug) {

    try {
      $announcement = $this->announcement->whereSlug($slug)->firstOrFail();
      $this->layout->title = "Edit Announcement";
      $this->layout->content = View::make('admin.announcements.edit')->withAnnouncement($announcement);
    } catch (ModelNotFoundException $e) {
      return Redirect::route('admin.announcements.index')->withError('Announcement not found.');
    }

  }

  public function update($slug) {
    $this->announcement = $this->announcement->whereSlug($slug)->first();
    $input = Input::only('title', 'body');

    if ($this->announcement->fill($input)->isValid()) {
      $this->announcement->save();
      return Redirect::route('admin.announcements.show', $slug)->withMessage('Announcement edited.');
    } else {
      return Redirect::back()->withInput()->withErrors($this->announcement->errors);
    }

  }

  public function destroy($slug) {
    $this->announcement->whereSlug($slug)->delete();
    return Redirect::route('admin.announcements.index')->withMessage('Announcement deleted.');
  }

}