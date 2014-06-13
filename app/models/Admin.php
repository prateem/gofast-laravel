<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

  use UserTrait, RemindableTrait;

  protected $table = 'admin';
  protected $fillable = ['username', 'password'];

  public $rules = [
    'username' => 'required|alpha|min:5',
    'password' => 'required|alpha_num|min:5'
  ];


}