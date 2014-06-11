@section('content')
<br>
<div class="row">
  <ul class="breadcrumbs large-12 columns">
    <li><?= link_to('/', 'Home') ?></li>
    <li><?= link_to('announcements', 'Announcements') ?></li>
    <li class="current">{{{ $announcement->title }}}</li>
  </ul>
</div>

<div class="row">
  <div class="small-12 columns">
    <h1>{{{ $announcement->title }}}</h1>
    <p class="right"><em>Date Posted: <?= $announcement->posted ?></em></p>
    <hr/>

    <p>{{{ $announcement->body }}}</p>

    <?= link_to('announcements', 'View all', ['class'=>'button right']) ?>
  </div>
</div>
@stop