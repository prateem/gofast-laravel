<br>
<div class="row">
  <ul class="breadcrumbs small-12 columns">
    <li>{{ link_to_route('admin.home', 'Home') }}</li>
    <li>{{ link_to_route('admin.jobs.index', 'Jobs') }}</li>
    <li class="current">{{{ $job->title }}}</li>
  </ul>
</div>

<div class="row">
  <div class="small-12 columns">
    <h1>{{{ $job->title }}}</h1>

    <p class="right">
      <em>
        <?php
          $date = new DateTime($job->created_at);
          $posted = $date->format('Y-m-d');
          echo "Date Posted: " . $posted;

          if ($job->closing != '0000-00-00') {
            echo " - Closing: " . $job->closing;
          }
        ?>
      </em>
    </p>

    <h3>Description</h3>
    <p>{{{ $job->description }}}</p>

    <h3>Requirements</h3>
    <p>{{{ $job->requirements }}}</p>

    <ul class="button-group">
      <li>{{ link_to_route('admin.jobs.index', 'View All', null, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.jobs.edit', 'Edit', $job->id, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('admin.jobs.destroy', 'Delete', $job->id, ['class' => 'button right', 'data-method' => 'delete']) }}</li>
    </ul>

  </div>
</div>