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

  public function send() {
    $data = Input::only('job', 'firstName', 'lastName', 'phone', 'email', 'resume', 'resumeText');
    $validation = Validator::make($data, $this->rules);

    if ($validation->passes()) {
      $data['fullName'] = $data['firstName'].' '.$data['lastName'];
      $data['attachment'] = (($resume = Input::file('resume')) ? false : true);

      Mail::send('emails.application', $data, function($message) use ($data, $resume) {
        $message->to('gofastquotes@gmail.com');
        $message->from('no-reply@gofast.com', 'GoFast Webmaster');
        $message->subject($data['fullName'] . ' has applied for ' . $data['job']);

        if ($data['attachment'] === true) {
          $message->attach($resume->getRealPath(), ['as' => $data['firstName'].$data['lastName'].'.'.$resume->getClientOriginalExtension(), 'mime' => $resume->getMimeType()]);
        }
      });
      return Redirect::route('jobs.index')->withMessage('Job application sent.');
    } else {
      return Redirect::back()->withInput()->withErrors($validation->messages());
    }
  }
}