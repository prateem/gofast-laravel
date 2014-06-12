<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Announcement extends Eloquent implements SluggableInterface {

  use SluggableTrait;

  protected $fillable = ['title', 'body'];
  protected $sluggable = [
    'build_from' => 'title',
    'save_to' => 'slug',
    'on_update' => true,
  ];

  protected $rules = [
      'title' => 'required',
      'body' => 'required',
  ];

  public function validate($data) {
    $validator = Validator::make($data, $this->rules);

    return $validator->passes();
  }

}