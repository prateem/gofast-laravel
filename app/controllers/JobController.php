<?php

class JobController extends BaseController {

  public function __construct() {
    View::share('page', 'jobs');
  }

  public function index() {
    $jobs = Job::orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Jobs";
    $this->layout->content = View::make('jobs.index')->withJobs($jobs);
  }

  public function show($id) {
    if ($job = Job::find($id)) {
      $this->layout->title = $job->title;
      $this->layout->content = View::make('jobs.show')->withJob($job);
    } else {
      return Redirect::route('jobs.index')->withError('Job posting not found.');
    }
  }
  public function apply($id){
  if ($job = Job::find($id)) {
      $this->layout->title = $job->title;
      $this->layout->content = View::make('jobs.apply')->withJob($job);
    } else {
      return Redirect::route('jobs.index')->withError('Job posting not found.');
    }
  }
}