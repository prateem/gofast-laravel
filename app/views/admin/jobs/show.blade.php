@extends('jobs.show')

@section('breadcrumbs')
  <ul class="breadcrumbs small-12 columns">
    <li>{{ link_to_route('admin.home', 'Home') }}</li>
    <li>{{ link_to_route('admin.jobs.index', 'Jobs') }}</li>
    <li class="current">{{{ $job->title }}}</li>
  </ul>
@overwrite

@section('links')
    <ul class="button-group">
      <li>{{ link_to_route('admin.jobs.index', 'View All', null, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.jobs.edit', 'Edit', $job->id, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.jobs.destroy', 'Delete', $job->id, ['class' => 'button right', 'data-method' => 'delete']) }}</li>
    </ul>
@overwrite