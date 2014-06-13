@extends('announcements.show')

@section('breadcrumbs')
  <ul class="breadcrumbs large-12 columns">
    <li>{{ link_to_route('admin.home', 'Home') }}</li>
    <li>{{ link_to_route('admin.announcements.index', 'Announcements') }}</li>
    <li class="current">{{{ $announcement->title }}}</li>
  </ul>
@overwrite

@section('links')
    <ul class="button-group">
      <li>{{ link_to_route('admin.announcements.index', 'View All', null, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.announcements.edit', 'Edit', $announcement->slug, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.announcements.destroy', 'Delete', $announcement->slug, ['class' => 'button right', 'data-method' => 'delete']) }}</li>
    </ul>
@overwrite