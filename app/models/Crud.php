<?php

class Crud extends Eloquent {
  protected $errors;
  protected $rules;

  public static function boot() {

    parent::boot();

    static::saving(function($model)
    {
      if (!$model->validates()) return false;
    });

  }

  public function validates() {

    $validation = Validator::make($this->getAttributes(), $this->rules);

    if ($validation->fails())
    {
      $this->errors = $validation->messages();
      return false;
    }

    return true;

  }

  public function getErrors() {
    return $this->errors;
  }
}