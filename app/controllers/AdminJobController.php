<?php
use Job;

class AdminJobController extends BaseController {

  protected $layout = 'layouts.admin';
  protected $rules = [
      'title' => 'required',
      'description' => 'required',
      'requirements' => 'required',
      'closing' => 'date_format:Y-m-d',
    ];

  public function __construct(Job $job) {
    $this->job = $job;
    View::share('page', 'jobs');
  }

  public function listJobs() {
    $jobs = Job::orderBy('closing', 'DESC')->paginate(5);
    $this->layout->title = "Jobs";
    $this->layout->content = View::make('admin.jobs.list', ['jobs' => $jobs]);
  }

  public function getView($id) {
    if ($job = Job::get($id)) {
      $this->layout->title = $job->title;
      $this->layout->content = View::make('admin.jobs.view', ['job' => $job]);
    } else {
      return Redirect::route('adminJobList')->with('error', 'Job not found.');
    }
  }

  public function getPost() {
    $this->layout->title = "Post New Job";
    $this->layout->content = View::make('admin.jobs.post');
  }

  public function saveJob() {
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

      return Redirect::route('adminJobList')->with('message', 'Job successfully posted.');
    } else {
      return Redirect::route('adminJobList')->with('error', 'Job could not be posted.');
    }
  }

  public function getEdit($id) {
    if ($job = Job::get($id)) {
      $this->layout->title = 'Edit Job Posting';
      $this->layout->content = View::make('admin.jobs.edit', ['job' => $job]);
    } else {
      Redirect::route('adminJobList')->with('error', 'Job posting not found.');
    }
  }

  public function doEdit($id) {
    $data = [
      'title' => Input::get('title'),
      'description' => Input::get('description'),
      'requirements' => Input::get('requirements'),
      'closing' => Input::get('closing')
    ];

    $validator = Validator::make($data, $rules);

    if ($validator->passes()) {
      $job = Job::find($id);

      $job->title = $data['title'];
      $job->description = $data['description'];
      $job->requirements = $data['requirements'];
      $job->closing = $data['closing'];
      $job->save();

      return Redirect::route('adminViewJob', ['id' => $job->id])->with('message', 'Job edited.');
    } else {
      return Redirect::route('editJob', ['id' => $job->id])->withErrors($validator)->withInput();
    }
  }

  public function delete($id) {

  }

}