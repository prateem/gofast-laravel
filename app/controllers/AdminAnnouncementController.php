<?php

class AdminAnnouncementController extends BaseController {

  protected $layout = 'layouts.admin';

  public function __construct() {
    View::share('page', 'announcements');
  }

  public function archive() {
    $announcements = Announcement::orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Announcements";
    $this->layout->content = View::make('admin.announcements.archive', ['announcements' => $announcements]);
  }

  public function getView($slug) {
    if ($announcement = Announcement::where('slug', $slug)->first()) {
      $this->layout->title = h($announcement->title);
      $this->layout->content = View::make('admin.announcements.view', ['announcement' => $announcement]);
    } else {
      return Redirect::to('admin/announcements')->with('error', 'Announcement not found.');
    }
  }

  public function getPost() {
    $this->layout->title = "Post New Announcement";
    $this->layout->content = View::make('admin.announcements.post');
  }

  public function doPost() {
    $announcement = new Announcement;
    $validator = Validator::make(Input::all(), $announcement->rules);

    if ($validator->passes()) {
      $announcement->title = Input::get('title');
      $announcement->body = Input::get('body');
      $announcement->save();
    }
  }

  public function delete($id) {
    $announcement = Announcement::find($id);
    $announcement->delete();

    return Redirect::to('admin/announcements')->with('message', 'Announcement deleted.');
  }

  public function getEdit($slug) {
    if ($announcement = Announcement::where('slug', $slug)->first()) {
      $this->layout->title = "Edit Announcement";
      $this->layout->content = View::make('admin.announcements.edit', ['announcement' => $announcement]);
    } else {
      return Redirect::to('admin/announcements')->with('error', 'Announcement not found.');
    }
  }

  public function doEdit($slug) {
    if ($announcement = Announcement::where('slug', $slug)->first()) {
      $announcement->title = Input::get('title');
      $announcement->body = Input::get('body');
      $announcement->save();

      return Redirect::to('admin/announcements')->with('message', 'Announcement edited.');
    }
  }
}