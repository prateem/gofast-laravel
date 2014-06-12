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
    if ($announcement = Announcement::whereSlug($slug)->first()) {
      $this->layout->title = $announcement->title;
      $this->layout->content = View::make('admin.announcements.view', ['announcement' => $announcement]);
    } else {
      return Redirect::route('adminAnnouncementsArchive')->with('error', 'Announcement not found.');
    }
  }

  public function getPost() {
    $this->layout->title = "Post New Announcement";
    $this->layout->content = View::make('admin.announcements.post');
  }

  public function saveAnnouncement() {

    $data = [
      'title' => Input::get('title'),
      'body' => Input::get('body'),
    ];

    if (Announcement::validate($data)) {
      $announcement = new Announcement($data);
      $announcement->save();

      return Redirect::route('adminAnnouncementsArchive')->with('message', 'Announcement successfully posted.');
    } else {
      return Redirect::route('adminAnnouncementsArchive')->with('error', 'Announcement could not be posted.');
    }
  }

  public function delete($id) {
    $announcement = Announcement::find($id);
    $announcement->delete();

    return Redirect::route('adminAnnouncementsArchive')->with('message', 'Announcement deleted.');
  }

  public function getEdit($slug) {
    if ($announcement = Announcement::whereSlug($slug)->first()) {
      $this->layout->title = "Edit Announcement";
      $this->layout->content = View::make('admin.announcements.edit', ['announcement' => $announcement]);
    } else {
      return Redirect::route('adminAnnouncementsArchive')->with('error', 'Announcement not found.');
    }
  }

  public function doEdit($slug) {
    if ($announcement = Announcement::where('slug', $slug)->first()) {

      $data = [
        'title' => Input::get('title'),
        'body' => Input::get('body'),
      ];

      $validator = Validator::make($data, $this->rules);

      if ($validator->passes()) {
        $announcement->title = $data->title;
        $announcement->body = $data->body;
        $announcement->save();

        return Redirect::route('adminViewAnnouncement', ['slug' => $announcement->slug])->with('message', 'Announcement edited.');
      } else {
        return Redirect::route('editAnnouncement', ['slug' => $announcement->slug])
            ->withErrors($validator)->withInput();
      }

    }
  }
}