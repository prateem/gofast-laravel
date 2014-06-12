<?php

class Job extends Crud {
  protected $fillable = ['title', 'closing', 'description', 'requirements'];

  public $rules = [
      'title' => 'required',
      'description' => 'required',
      'requirements' => 'required',
      'closing' => 'date_format:Y-m-d',
  ];

} 