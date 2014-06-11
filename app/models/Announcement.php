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

} 