<div class="row">
  <h1>Post New Announcement</h1>

  {{ Form::open(['action' => 'AdminAnnouncementController@doPost']) }}

  <div class="row">
    <div class="medium-6 columns">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', null, ['placeholder' => 'Title']) }}
    </div>
  </div>

  <div class="row">
    <div class="medium-10 columns">
      {{ Form::label('body', 'Content') }}
      {{ Form::textarea('body', null, ['placeholder' => 'Announcement details']) }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      {{ Form::submit('Submit', ['class' => 'button']) }}
    </div>
  </div>

  {{ Form::close() }}

</div>
