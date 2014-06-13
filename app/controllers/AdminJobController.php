<?php

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminJobController extends JobController {

  protected $layout = 'layouts.admin';

  public function index() {
    $jobs = $this->job->orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Jobs";
    $this->layout->content = View::make('admin.jobs.index')->withJobs($jobs);
  }

  public function create() {
    $this->layout->title = "Post New Job";
    $this->layout->datepicker = true;
    $this->layout->content = View::make('admin.jobs.create');
  }

  public function store() {
    $input = Input::only('title', 'description', 'requirements', 'closing');

    if ($this->job->fill($input)->isValid()) {
      $this->job->save();
      return Redirect::route('admin.jobs.index')->withMessage('Job successfully posted.');
    } else {
      return Redirect::route('admin.jobs.index')->withErrors($this->job->errors);
    }

  }

  public function show($id) {

    try {
      $job = $this->job->findOrFail($id);
      $this->layout->title = $job->title;
      $this->layout->content = View::make('admin.jobs.show')->withJob($job);
    } catch (ModelNotFoundException $e) {
      return Redirect::route('admin.jobs.index')->withError('Job not found.');
    }

  }

  public function edit($id) {

    try {
      $job = $this->job->findOrFail($id);
      $this->layout->title = 'Edit Job Posting';
      $this->layout->datepicker = true;
      $this->layout->content = View::make('admin.jobs.edit')->withJob($job);
    } catch (ModelNotFoundException $e) {
      return Redirect::route('admin.jobs.index')->withError('Job posting not found.');
    }

  }

  public function update($id) {
    $this->job = $this->job->find($id);
    $input = Input::only('title', 'description', 'requirements', 'closing');

    if ($this->job->fill($input)->isValid()) {
      $this->job->save();
      return Redirect::route('admin.jobs.show', $id)->withMessage('Job edited.');
    } else {
      return Redirect::back()->withInput()->withErrors($this->job->errors);
    }

  }

  public function destroy($id) {
    $this->job->delete($id);
    return Redirect::route('admin.jobs.index')->withMessage('Job deleted.');
  }

}