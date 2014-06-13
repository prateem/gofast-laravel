<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Announcement extends Crud implements SluggableInterface {

  use SluggableTrait;

  public $errors;

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

}