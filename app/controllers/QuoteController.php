<?php

class QuoteController extends BaseController {

  public function index() {
    $this->layout->title = "Quotes";
    $this->layout->datepicker = true;
    $this->layout->content = View::make('quotes');
  }

  public function process() {

  }

}