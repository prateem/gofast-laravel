@extends('layouts.master')

@section('header')
Administration Panel
@overwrite

@section('nav')
            <ul class="right">
              <li <?php if ($page == 'home') echo 'class="active"'; ?>>{{ link_to_route('admin.home', 'Cpanel Home') }}</li>
              @if(Auth::check())
                <li <?php if ($page == 'announcements') echo 'class="active"'; ?>>{{ link_to_route('admin.announcements.index', 'Announcements') }}</li>
                <li <?php if ($page == 'jobs') echo 'class="active"'; ?>>{{ link_to_route('admin.jobs.index', 'Job Postings') }}</li>
                <li>{{ link_to_route('logout', 'Logout') }}</li>
              @endif
            </ul>
@overwrite

@section('footer')

@overwrite

@section('restdelete')
  {{ HTML::script('js/restdelete.js') }}
@overwrite