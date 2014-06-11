<?php

$title = isset($title) ? $title : null;
$page = isset($page) ? $page : null;

$description = 'Go Fast Express Inc.';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>
    {{ $title }} - <?= $description ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>

  <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="icon"/>
  <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="shortcut icon"/>

  <link href="{{ asset('css/normalize.css') }}" type="text/css" rel="stylesheet"/>
  <link href="{{ asset('css/foundation.css') }}" type="text/css" rel="stylesheet"/>
  <link href="{{ asset('css/custom.css') }}" type="text/css" rel="stylesheet"/>
  <?php if ($title == 'Quotes'): ?>
  <link href="{{ asset('css/glDatePicker.flatwhite.css') }}" type="text/css" rel="stylesheet"/>
  <?php endif; ?>

  <script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>
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
        <h4 class="right">Your #1 Source for Transportation Services</h4>
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
            <ul class="right">
              <li <?php if ($title == 'Home') echo 'class="active"'; ?>><?= link_to('/', 'Home') ?></li>
              <li <?php if ($title == 'About') echo 'class="active"'; ?>><?= link_to('about', 'About Us') ?></li>
              <li <?php if ($title == 'Quotes') echo 'class="active"'; ?>><?= link_to('quotes', 'Quotes') ?></li>
              <li <?php if ($page == 'jobs') echo 'class="active"'; ?>><?= link_to('jobs', 'Jobs') ?></li>
              <?php if (Auth::check()): ?>
              <li><?= link_to('admin', 'Administration') ?></li>
              <li><?= link_to_route('logout', 'Logout') ?></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  {{ $content }}

</div>
<footer>
  <div class="row">
    <br/>
    <div class="small-4 columns">
      <ul class="no-bullet">
        <li><h4>Location</h4></li>
        <li>2828 Slough St.</li>
        <li>Mississauga, ON</li>
        <li>L4T 1G3</li>
      </ul>
    </div>
    <div class="small-4 columns">
      <ul class="no-bullet">
        <li><h4>Contact Us</h4></li>
        <li>gofastexpress@gmail.com</li>
        <li>905-488-3118 (7am - 7pm)</li>
      </ul>
    </div>
    <div class="small-4 columns">
    </div>
  </div>
  <div class="subfooter">
      <div class=" row">
        <small>©2014 Go Fast Express Inc. All Rights Reserved.</small>
        <small><a href="#">Privacy Policy</a></small>
      </div>
  </div>
</footer>
<script type="text/javascript" src="{{ asset('js/vendor/jquery.js') }}"></script>
<?php if ($title == 'Quotes'): ?><script type="text/javascript" src="{{ asset('js/glDatePicker.js') }}"></script><?php endif; ?>
<script type="text/javascript" src="{{ asset('js/fastclick.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/foundation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/foundation/foundation.dropdown.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/foundation/foundation.topbar.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    <?php if ($title == 'Quotes') { ?>
    $('.datepicker').glDatePicker({
      cssName: 'flatwhite'
    });
    <?php } ?>

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