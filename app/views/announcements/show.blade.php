<br>
<div class="row">
  <ul class="breadcrumbs large-12 columns">
    <li>{{ link_to_route('home', 'Home') }}</li>
    <li>{{ link_to_route('announcements.index', 'Announcements') }}</li>
    <li class="current">{{{ $announcement->title }}}</li>
  </ul>
</div>

<div class="row">
  <div class="small-12 columns">
    <h1>{{{ $announcement->title }}}</h1>
    <p class="right">
      <em>
        <?php
          $date = new DateTime($announcement->created_at);
          $posted = $date->format('Y-m-d');
          echo "Date Posted: " . $posted;
        ?>
      </em>
    </p>
    <hr/>

    <p>{{{ $announcement->body }}}</p>

    {{ link_to_route('announcements.index', 'View all', null, ['class'=>'button right']) }}
  </div>
</div>