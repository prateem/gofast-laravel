<?php

class AnnouncementController extends BaseController {

  public function index() {
    $announcements = Announcement::orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Announcements";
    $this->layout->content = View::make('announcements.index')->withAnnouncements($announcements);
  }

  public function show($slug) {
    if ($announcement = Announcement::whereSlug($slug)->first()) {
      $this->layout->title = $announcement->title;
      $this->layout->content = View::make('announcements.show')->withAnnouncement($announcement);
    } else {
      Redirect::route('announcements.index')->withError('Announcement not found.');
    }
  }

}