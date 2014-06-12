<?php

class Crud extends Eloquent {
  public $errors;
  public $rules;
  
  public function isValid() {
    $validation = Validator::make($this->attributes, $this->rules);

    if ($validation->fails()) {
      $this->errors = $validation->messages();
      return false;
    }

    return true;
  }
}