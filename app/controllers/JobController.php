<?php

class JobController extends BaseController {

  public function listings() {
    $jobs = Job::orderBy('posted', 'DESC')->paginate(5);
    $this->layout->content = View::make('jobs.listings', ['jobs' => $jobs]);
  }

  public function view($id) {
    if ($job = Job::find($id)) {
      $this->layout->content = View::make('jobs.view', ['job' => $job]);
    } else {
      return Redirect::action('JobController@listings')->with('error', 'Job posting not found.');
    }
  }
}