<?php

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class JobController extends BaseController {

  protected $job;

  public function __construct(Job $job) {
    $this->job = $job;
    View::share('page', 'jobs');
  }

  public function index() {
    $jobs = $this->job->orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Jobs";
    $this->layout->content = View::make('jobs.index')->withJobs($jobs);
  }

  public function show($id) {

    try {
      $job = $this->job->findOrFail($id);
      $this->layout->title = $job->title;
      $this->layout->content = View::make('jobs.show')->withJob($job);
    } catch (ModelNotFoundException $e) {
      return Redirect::route('jobs.index')->withError('Job posting not found.');
    }

  }

}