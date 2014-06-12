<div class="row">
  <h1>Edit Announcement "{{{ $announcement->title }}}"</h1>

  {{ Form::model($announcement, ['route' => ['admin.announcements.update', $announcement->slug], 'method' => 'put']) }}

  <div class="row">
    <div class="medium-6 columns">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title') }}
    </div>
  </div>

  <div class="row">
    <div class="medium-10 columns">
      {{ Form::label('body', 'Content') }}
      {{ Form::textarea('body') }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      {{ Form::submit('Submit', ['class' => 'button']) }}
    </div>
  </div>

  {{ Form::close() }}

</div>
