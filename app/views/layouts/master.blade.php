<?php

$title = isset($title) ? $title : null;
$page = isset($page) ? $page : null;

$description = 'Go Fast Express Inc.';
date_default_timezone_set('America/New_York');
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>
    {{ $title }} - {{ $description }}
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>

  <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon"/>
  <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="shortcut icon"/>

  {{ HTML::style('css/normalize.css') }}
  {{ HTML::style('css/foundation.css') }}
  {{ HTML::style('css/custom.css') }}
  @if (isset($datepicker))
    {{ HTML::style('css/glDatePicker.flatwhite.css') }}
  @endif
  {{ HTML::script('js/modernizr.js') }}

</head>
<body>
  <div class="page-wrap">
    <header>
      <div class="row">
        <div class="large-4 columns">
          <h1><a href="{{ URL::to('/') }}"><img src="{{ asset('img/logo.png') }}" width="250" height="250" alt="GoFast Express Logo"/></a></h1>
        </div>
        <div class="large-8 columns">
          <br>
            <h4 class="right">
              @section('header')
                Your #1 Source for Transportation Services
              @show
            </h4>
        </div>
      </div>
      <div class="contain-to-grid sticky">
        <nav class="top-bar" data-topbar>
          <!-- Right Nav Section -->
          <div class="row">
            <div class="large-12 columns">
              <ul class="title-area">
                <li class="name">
                  <h1><a href="#"></a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
              </ul>
              @section('nav')
                <ul class="right">
                  <li <?php if ($title == 'Home') echo 'class="active"'; ?>>{{ link_to_route('home', 'Home') }}</li>
                  <li <?php if ($title == 'About') echo 'class="active"'; ?>>{{ link_to_route('about', 'About') }}</li>
                  <li <?php if ($title == 'Quotes') echo 'class="active"'; ?>>{{ link_to_route('quotes', 'Quotes') }}</li>
                  <li <?php if ($page == 'jobs') echo 'class="active"'; ?>>{{ link_to_route('jobs.index', 'Jobs') }}</li>
                  @if (Auth::check())
                  <li>{{ link_to_route('admin.home', 'Administration') }}</li>
                  <li>{{ link_to_route('logout', 'Logout') }}</li>
                  @endif
                </ul>
              @show
            </div>
          </div>
        </nav>
      </div>
    </header>

    {{ $content }}

  </div>

@section('footer')
  <footer>
    <div class="footercallout show-for-medium-up">
      <div class="row text-center">
        Interested? {{ link_to_route('quotes', 'Request a Quote', null, ['class'=>'button footer-button']) }} Or contact us by one of the ways below.
      </div>
    </div>
    <div class="row">
      <br/>
      <div class="small-12 medium-4 columns">
        <ul class="no-bullet text-center">
          <li>905-488-3118 (7am - 7pm)</li>
          <li>2828 Slough St.</li>
          <li>Mississauga, ON</li>
          <li>L4T 1G3</li>
        </ul>
      </div>
      <div class="small-12 medium-4 columns">
        <ul class="no-bullet text-center">
          <li>{{ HTML::mailto('gofastexpress@gmail.com') }}</li>
          <li>facebook link</li>
        </ul>
      </div>
      <div class="small-12 medium-4 columns">
        <ul class="no-bullet text-center show-for-medium-up">
          <li <?php if ($title == 'Home') echo 'class="active"'; ?>>{{ link_to_route('home', 'Home') }}</li>
          <li <?php if ($title == 'About') echo 'class="active"'; ?>>{{ link_to_route('about', 'About') }}</li>
          <li <?php if ($title == 'Quotes') echo 'class="active"'; ?>>{{ link_to_route('quotes', 'Quotes') }}</li>
          <li <?php if ($page == 'jobs') echo 'class="active"'; ?>>{{ link_to_route('jobs.index', 'Jobs') }}</li>
        </ul>
      </div>
    </div>
    <div class="subfooter">
        <div class=" row">
          <small>©2014 Go Fast Express Inc. All Rights Reserved.</small>
          <small><a href="#">Privacy Policy</a></small>
        </div>
    </div>
  </footer>
@show

  {{ HTML::script('js/vendor/jquery.js') }}
  @if (isset($datepicker))
    {{ HTML::script('js/glDatePicker.js') }}
  @endif
  @section('restdelete')

  @show
  {{ HTML::script('js/fastclick.js') }}
  {{ HTML::script('js/foundation.min.js') }}
  {{ HTML::script('js/foundation/foundation.dropdown.js') }}
  {{ HTML::script('js/foundation/foundation.topbar.js') }}

  <script type="text/javascript">
    $(document).ready(function(){
      <?php if(isset($datepicker)): ?>
      $('.datepicker').glDatePicker({
        cssName: 'flatwhite'
      });
      <?php endif; ?>

      $(document).foundation({
        topbar: {
          is_hover: false,
          mobile_show_parent_link: true
        }
      });
    });
  </script>
</body>
</html>