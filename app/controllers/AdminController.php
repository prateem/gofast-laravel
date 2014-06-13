<?php

class AdminController extends BaseController {
  protected $layout = 'layouts.admin';
  protected $hidden = array('password', 'remember_token');
  protected $admin;

  public function __construct(Admin $admin) {
    $this->admin = $admin;
    View::share('page', 'home');
  }

  public function create() {
    $this->layout->title = "Add Admin";
    $this->layout->content = View::make('admin.create');
  }

  public function store() {
    $input = Input::all();

    if ($this->admin->fill($input)->isValid()) {
      $this->admin->password = Hash::make($this->admin->password);
      $this->admin->save();
      return Redirect::route('login');
    } else {
      return Redirect::back()->withInput()->withErrors($this->admin->getErrors());
    }
  }

  public function login() {
    if (Auth::check()) {
      return Redirect::route('admin.home');
    }
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
      return Redirect::back()->withInput()->withError('Invalid username and or password.');
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