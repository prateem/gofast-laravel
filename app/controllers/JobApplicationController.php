<?php

class JobApplicationController extends BaseController {

  protected $rules = [
    'firstName' => 'required',
    'lastName' => 'required',
    'phone' => 'required|digits:10',
    'email' => 'required|email',
    'resumeText' => 'required_without:resume',
    'resume' => 'mimes:doc,docx,pdf'
  ];

  public function show($id) {
    if ($job = Job::find($id)) {
      $this->layout->title = $job->title;
      $this->layout->content = View::make('jobs.apply')->withJob($job);
    } else {
      return Redirect::route('jobs.index')->withError('Job posting not found.');
    }
  }

  public function store() {
    $input = Input::all();
    $validation = Validator::make($input, $this->rules);

    if ($validation->passes()) {
      return "lol ok yer hired";
    } else {
      return Redirect::back()->withInput()->withErrors($validation->messages());
    }
  }
}