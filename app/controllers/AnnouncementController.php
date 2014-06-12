<?php

class AnnouncementController extends BaseController {

  public function archive() {
    $announcements = Announcement::orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Announcements";
    $this->layout->content = View::make('announcements.archive', ['announcements' => $announcements]);
  }

  public function view($slug) {
    if ($announcement = Announcement::whereSlug($slug)->first()) {
      $this->layout->title = $announcement->title;
      $this->layout->content = View::make('announcements.view', ['announcement' => $announcement]);
    } else {
      Redirect::to('announcements')->with('error', 'Announcement not found.');
    }
  }

}