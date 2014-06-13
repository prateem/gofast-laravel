<?php

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class AnnouncementController extends BaseController {

  protected $announcement;

  public function __construct(Announcement $announcement) {
    $this->announcement = $announcement;
    View::share('page', 'announcements');
  }

  public function index() {
    $announcements = $this->announcement->orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Announcements";
    $this->layout->content = View::make('announcements.index')->withAnnouncements($announcements);
  }

  public function show($slug) {

    try {
      $announcement = $this->announcement->whereSlug($slug)->firstOrFail();
      $this->layout->title = $announcement->title;
      $this->layout->content = View::make('announcements.show')->withAnnouncement($announcement);
    } catch (ModelNotFoundException $e) {
      return Redirect::route('announcements.index')->withError('Announcement not found.');
    }

  }

}