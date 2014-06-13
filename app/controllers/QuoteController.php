<?php

class QuoteController extends BaseController {

  protected $quote;

  public function __construct(Quote $quote) {
    $this->quote = $quote;
  }

  public function index() {
    $this->layout->title = "Quotes";
    $this->layout->datepicker = true;
    $this->layout->content = View::make('quotes');
  }

  public function request() {
    $input = Input::all();
    $validation = Validator::make($input, $this->quote->rules);

    if ($validation->passes()) {
      return "No email logic yet #lol";
      Mail::send(['text' => 'emails.quote'], $input, function($message) {
        $message->to('gofastquotes@gmail.com', 'GoFast')->subject('A quote has been requested!');
      });
    } else {
      return Redirect::back()->withInput()->withErrors($validation->messages());
    }
  }

}