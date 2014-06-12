<?php

class AdminAnnouncementController extends BaseController {

  protected $layout = 'layouts.admin';
  protected $rules = [
      'title' => 'required',
      'body' => 'required',
    ];

  public function __construct() {
    View::share('page', 'announcements');
  }

  public function index() {
    $announcements = Announcement::orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Announcements";
    $this->layout->content = View::make('admin.announcements.index')->withAnnouncements($announcements);
  }

  public function create() {
    $this->layout->title = "Post New Announcement";
    $this->layout->content = View::make('admin.announcements.create');
  }

  public function store() {

    $data = [
        'title' => Input::get('title'),
        'body' => Input::get('body'),
    ];

    $validator = Validator::make($data, $this->rules);

    if ($validator->passes()) {
      $announcement = new Announcement($data);
      $announcement->save();

      return Redirect::route('admin.announcements.index')->withMessage('Announcement successfully posted.');
    } else {
      return Redirect::route('admin.announcements.index')->withError('Announcement could not be posted.');
    }
  }

  public function show($slug) {
    if ($announcement = Announcement::whereSlug($slug)->first()) {
      $this->layout->title = $announcement->title;
      $this->layout->content = View::make('admin.announcements.show')->withAnnouncement($announcement);
    } else {
      return Redirect::route('admin.announcements.index')->withError('Announcement not found.');
    }
  }

  public function edit($slug) {
    if ($announcement = Announcement::whereSlug($slug)->first()) {
      $this->layout->title = "Edit Announcement";
      $this->layout->content = View::make('admin.announcements.edit')->withAnnouncement($announcement);
    } else {
      return Redirect::route('admin.announcements.index')->withError('Announcement not found.');
    }
  }

  public function update($slug) {
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

        return Redirect::route('admin.announcements.show', $slug)->withMessage('Announcement edited.');
      } else {
        return Redirect::route('admin.announcements.edit', $slug)->withErrors($validator)->withInput();
      }

    }
  }

  public function destroy($slug) {
    $announcement = Announcement::where('slug', $slug)->first();
    $announcement->delete();

    return Redirect::route('admin.announcements.index')->withMessage('Announcement deleted.');
  }

}