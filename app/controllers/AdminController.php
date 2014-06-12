<?php

class AdminController extends BaseController {
  protected $layout = 'layouts.admin';
  protected $hidden = array('password', 'remember_token');

  public function __construct() {
    View::share('page', 'home');
  }

  public function create() {
    $this->layout->title = "Add Admin";
    $this->layout->content = View::make('admin.create');
  }

  public function store() {
    $admin = new Admin;
    $validator = Validator::make(Input::all(), $admin->rules);

    if ($validator->passes()) {
      $admin->username = Input::get('username');
      $admin->password = Hash::make(Input::get('password'));
      $admin->save();

      return Redirect::route('login');
    } else {
      unset($admin);
      return Redirect::route('admin.create')->withErrors($validator)->withInput();
    }
  }

  public function login() {
    $this->layout->title = "Login";
    $this->layout->content = View::make('admin.login');
  }

  public function doLogin() {
    $userdata = [
      'username' => Input::get('username'),
      'password' => Input::get('password')
    ];

    if (Auth::attempt($userdata, true)) {
      return Redirect::route('admin.home');
    } else {
      return Redirect::route('login')
          ->withError('Invalid username and or password.')
          ->withInput();
    }
  }

  public function index() {
    $announcements = Announcement::orderBy('created_at', 'DESC')->take(3)->get();
    $jobs = Job::orderBy('created_at', 'DESC')->take(3)->get();
    $this->layout->title = "Admin Home";
    $this->layout->content = View::make('admin.index')->withJobs($jobs)->withAnnouncements($announcements);
  }

  public function logout() {
    Auth::logout();
    return Redirect::route('login');
  }
}