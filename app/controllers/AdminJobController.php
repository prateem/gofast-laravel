<?php

class AdminJobController extends BaseController {

  protected $layout = 'layouts.admin';
  protected $rules = [
      'title' => 'required',
      'description' => 'required',
      'requirements' => 'required',
      'closing' => 'date_format:Y-m-d',
    ];

  public function __construct() {
    View::share('page', 'jobs');
  }

  public function index() {
    $jobs = Job::orderBy('created_at', 'DESC')->paginate(5);
    $this->layout->title = "Jobs";
    $this->layout->content = View::make('admin.jobs.index')->withJobs($jobs);
  }

  public function create() {
    $this->layout->title = "Post New Job";
    $this->layout->datepicker = true;
    $this->layout->content = View::make('admin.jobs.create');
  }

  public function store() {
    $data = [
        'title' => Input::get('title'),
        'description' => Input::get('description'),
        'requirements' => Input::get('requirements'),
        'closing' => Input::get('closing')
    ];

    $validator = Validator::make($data, $this->rules);

    if ($validator->passes()) {
      $job = new Job($data);
      $job->save();

      return Redirect::route('admin.jobs.index')->withMessage('Job successfully posted.');
    } else {
      return Redirect::route('admin.jobs.index')->withError('Job could not be posted.');
    }
  }

  public function show($id) {
    if ($job = Job::find($id)) {
      $this->layout->title = $job->title;
      $this->layout->content = View::make('admin.jobs.show')->withJob($job);
    } else {
      return Redirect::route('admin.jobs.index')->withError('Job not found.');
    }
  }

  public function edit($id) {
    if ($job = Job::find($id)) {
      $this->layout->title = 'Edit Job Posting';
      $this->layout->datepicker = true;
      $this->layout->content = View::make('admin.jobs.edit')->withJob($job);
    } else {
      Redirect::route('admin.jobs.index')->withError('Job posting not found.');
    }
  }

  public function update($id) {
    if ($job = Job::find($id)) {

      $data = [
          'title' => Input::get('title'),
          'description' => Input::get('description'),
          'requirements' => Input::get('requirements'),
          'closing' => Input::get('closing')
      ];

      $validator = Validator::make($data, $this->rules);

      if ($validator->passes()) {

        $job->title = $data['title'];
        $job->description = $data['description'];
        $job->requirements = $data['requirements'];
        $job->closing = $data['closing'];
        $job->save();

        return Redirect::route('admin.jobs.show', $id)->withMessage('Job edited.');
      } else {
        return Redirect::route('admin.jobs.edit', $id)->withErrors($validator)->withInput();
      }

    }
  }

  public function destroy($id) {
    $job = Job::find($id);
    $job->delete();
    return Redirect::route('admin.jobs.index')->withMessage('Job deleted.');
  }

}