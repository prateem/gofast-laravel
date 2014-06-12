<div class="row">
  <h1>Edit "{{ $job->title }}" Posting</h1>

  {{ Form::open(['route' => ['admin.jobs.update', $job->id], 'method' => 'put']) }}

  <div class="row">
    <div class="small-12 medium-6 columns">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', $job->title, ['placeholder' => 'Title']) }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-10 columns">
      {{ Form::label('description', 'Description') }}
      {{ Form::textarea('description', $job->description, ['placeholder' => 'The job description goes here.']) }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-10 columns">
      {{ Form::label('requirements', 'Requirements') }}
      {{ Form::textarea('requirements', $job->requirements, ['placeholder' => 'The requirements to be qualified for the job go here.']) }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 medium-4 columns">
      {{ Form::label('closing', 'Close Date (yyyy-mm-dd)') }}
      {{ Form::input('date', 'closing', $job->closing, ['placeholder' => '1992-05-22', 'class' => 'datepicker']) }}
    </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      {{ Form::submit('Submit', ['class' => 'button']) }}
    </div>
  </div>

  {{ Form::close() }}

</div>