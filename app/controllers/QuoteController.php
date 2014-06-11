<?php

class QuoteController extends BaseController {

  public function index() {
    $this->layout->content = View::make('quotes');
  }

}