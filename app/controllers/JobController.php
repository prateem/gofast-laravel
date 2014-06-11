<?php

class JobController extends BaseController {

  public function __construct() {
    View::share('page', 'jobs');
  }

  public function listings() {
    $jobs = Job::orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Jobs";
    $this->layout->content = View::make('jobs.listings', ['jobs' => $jobs]);
  }

  public function view($id) {
    if ($job = Job::find($id)) {
      $this->layout->title = $job->title;
      $this->layout->content = View::make('jobs.view', ['job' => $job]);
    } else {
      return Redirect::to('jobs')->with('error', 'Job posting not found.');
    }
  }
}