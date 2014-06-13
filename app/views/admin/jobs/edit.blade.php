<div class="row">
  <div class="small-12 columns">
    <h1>Edit "{{ $job->title }}" Posting</h1>

    {{ Form::model($job, ['route' => ['admin.jobs.update', $job->id], 'method' => 'put']) }}

    <ul>
      @foreach($errors as $e)
      <li>{{ $e }}</li>
      @endforeach
    </ul>

    <div class="row">
      <div class="small-12 medium-6 columns">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
      </div>
    </div>

    <div class="row">
      <div class="small-12 medium-10 columns">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description') }}
      </div>
    </div>

    <div class="row">
      <div class="small-12 medium-10 columns">
        {{ Form::label('requirements', 'Requirements') }}
        {{ Form::textarea('requirements') }}
      </div>
    </div>

    <div class="row">
      <div class="small-12 medium-4 columns">
        {{ Form::label('closing', 'Close Date (yyyy-mm-dd)') }}
        {{ Form::input('date', 'closing', null, ['class' => 'datepicker']) }}
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        {{ Form::submit('Submit', ['class' => 'button']) }}
      </div>
    </div>

    {{ Form::close() }}
  </div>
</div>