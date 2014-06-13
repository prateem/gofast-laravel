<br>
<div class="row">
@section('breadcrumbs')
  <ul class="breadcrumbs small-12 columns">
    <li>{{ link_to_route('home', 'Home') }}</li>
    <li>{{ link_to_route('jobs.index', 'Jobs') }}</li>
    <li class="current">{{{ $job->title }}}</li>
  </ul>
@show
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

          if (!is_null($job->closing)) {
            echo " - Closing: " . $job->closing;
          }
        ?>
      </em>
    </p>

    <h3>Description</h3>
    <p>{{{ $job->description }}}</p>

    <h3>Requirements</h3>
    <p>{{{ $job->requirements }}}</p>
@section('links')
    <ul class="button-group">
      <li>{{ link_to_route('jobs.apply', 'Apply', $job->id, ['class' => 'button right']) }}</li>
      <li>{{ link_to_route('jobs.index', 'View All', null, ['class' => 'button right']) }}</li>
    </ul>
@show
  </div>
</div>