<?php

class QuoteController extends BaseController {

  protected $rules = [
      'companyName' => 'required',
      'contactName' => 'required',
      'phone' => 'required|digits:10',
      'email' => 'required|email',
      'pickupDate' => 'date_format:Y-m-d',
      'pickupStreet' => 'required',
      'pickupCity' => 'required',
      'pickupRegion' => 'required',
      'pickupCode' => 'required|postcode',
      'deliveryDate' => 'date_format:Y-m-d',
      'deliveryStreet' => 'required',
      'deliveryCity' => 'required',
      'deliveryRegion' => 'required',
      'deliveryCode' => 'required|postcode',
      'skids' => 'required|integer',
      'weight' => 'integer',
      'weightUnits' => 'in:pounds,kilos',
  ];

  public function index() {
    $this->layout->title = "Quotes";
    $this->layout->datepicker = true;
    $this->layout->content = View::make('quotes');
  }

  public function request() {
    $input = Input::all();
    $validation = Validator::make($input, $this->rules);

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