<?php

class Job extends Crud {
  protected $fillable = ['title', 'closing', 'description', 'requirements'];

  protected $rules = [
      'title' => 'required',
      'description' => 'required',
      'requirements' => 'required',
      'closing' => 'date_format:Y-m-d',
  ];

  public function setClosingAttribute($value) {

    $this->attributes['closing'] = ($value ?: null);

  }

} 