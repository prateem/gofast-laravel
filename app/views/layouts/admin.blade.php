<?php

if (!isset($page)) {
  $page = null;
}

$description = 'Go Fast Express Inc.';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <title>
    <?= $description ?>
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
  <?php if ($page == 'quotes'): ?>
    <link href="{{ asset('css/glDatePicker.flatwhite.css') }}" type="text/css" rel="stylesheet"/>
  <?php endif; ?>

  <script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>
</head>
<body>
  <header>
    <div class="row">
      <div class="large-4 columns">
        <h1><a href="{{ URL::to('/') }}"><img src="{{ asset('img/logo.png') }}" width="250" height="250" alt="GoFast Express Logo"/></a></h1>
      </div>
      <div class="large-8 columns">
        <br>
        <h4 class="right">Administration Panel</h4>
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
              <li <?php if ($page == 'home') echo 'class="active"'; ?>><?= link_to('admin', 'Cpanel Home') ?></li>
              <?php if (Auth::check()): ?>
              <li <?php if ($page == 'announcements') echo 'class="active"'; ?>><?= link_to_route('adminAnnouncementsArchive', 'Announcements') ?></li>
              <li <?php if ($page == 'jobs') echo 'class="active"'; ?>><?= link_to_route('adminJobListing', 'Job Postings') ?></li>
              <li><?= link_to_route('logout', 'Logout') ?></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  {{ $content }}


  <script type="text/javascript" src="{{ asset('js/vendor/jquery.js') }}"></script>
  <?php if ($page == 'quotes'): ?><script type="text/javascript" src="{{ asset('js/glDatePicker.js') }}"></script><?php endif; ?>
  <script type="text/javascript" src="{{ asset('js/fastclick.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/foundation.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/foundation/foundation.dropdown.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/foundation/foundation.topbar.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      <?php if ($page == 'quotes') { ?>
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