<?php

class AnnouncementController extends BaseController {

  public function archive() {
    $announcements = Announcement::orderBy('posted', 'DESC')->paginate(5);
    $this->layout->content = View::make('announcements.archive', ['announcements' => $announcements]);
  }

  public function view($slug) {
    if ($announcement = Announcement::where('slug', $slug)->firstOrFail()) {
      $this->layout->content = View::make('announcements.view', ['announcement' => $announcement]);
    }
  }

}