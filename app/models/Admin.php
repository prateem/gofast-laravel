<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  protected $table = 'admin';
  protected $fillable = ['username', 'password'];
  protected $errors;
  protected $rules = [
    'username' => 'required|alpha|min:5',
    'password' => 'required|alpha_num|min:5'
  ];

  public function isValid() {
    $validation = Validator::make($this->getAttributes(), $this->rules);

    if ($validation->fails()) {
      $this->errors = $validation->messages();
      return false;
    }
    return true;
  }

  public function getErrors() {
    return $this->errors;
  }
}