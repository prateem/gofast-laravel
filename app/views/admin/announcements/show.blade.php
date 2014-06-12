<br>
<div class="row">
  <ul class="breadcrumbs large-12 columns">
    <li>{{ link_to_route('admin.home', 'Home') }}</li>
    <li>{{ link_to_route('admin.announcements.index', 'Announcements') }}</li>
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
    <ul class="button-group">
      <li>{{ link_to_route('admin.announcements.index', 'View All', null, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.announcements.edit', 'Edit', $announcement->slug, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.announcements.destroy', 'Delete', $announcement->slug, ['class' => 'button right', 'data-method' => 'delete']) }}</li>
    </ul>
  </div>
</div>