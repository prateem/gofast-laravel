@section('content')
<br>
<div class="row">
  <ul class="breadcrumbs small-12 columns">
    <li><?= link_to('/', 'Home') ?></li>
    <li><?= link_to('jobs', 'Jobs') ?></li>
    <li class="current">{{{ $job->title }}}</li>
  </ul>
</div>

<div class="row">
  <div class="small-12 columns">
    <h1>{{{ $job->title }}}</h1>

    <p class="right">
      <em><?= "Date Posted: " . $job->posted . " - Closing: " . $job->closing ?></em>
    </p>

    <h3>Description</h3>
    <p>{{{ $job->description }}}</p>

    <h3>Requirements</h3>
    <p>{{{ $job->requirements }}}</p>

    <?= link_to('jobs', 'View All', ['class' => 'button right']) ?>
  </div>
</div>
@stop