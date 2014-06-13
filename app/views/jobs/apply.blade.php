<br>
<div class="row">
  <ul class="breadcrumbs small-12 columns">
    <li>{{ link_to_route('home', 'Home') }}</li>
    <li>{{ link_to_route('jobs.index', 'Jobs') }}</li>
    <li>{{ link_to_route('jobs.show', $job->title, $job->id) }}</li>
    <li class="current">Apply</li>
  </ul>
</div>
<div class="row">
  <div class="small-12 columns">
    <h1>Apply for {{{ $job->title }}}</h1>

    <ul>
      @foreach($errors->all() as $e)
      <li>{{ $e }}</li>
      @endforeach
    </ul>

    {{ Form::open(['route' => 'jobs.submit']) }}
    <div class="row">
      <div class="small-6 columns">
        {{ Form::label('firstName', 'First Name') }}
        {{ Form::text('firstName', null, ['placeholder' => 'John']) }}
      </div>
      <div class="small-6 columns">
        {{ Form::label('lastName', 'Last Name') }}
        {{ Form::text('lastName', null, ['placeholder' => 'Smith']) }}
      </div>
    </div>
    <div class="row">
      <div class="small-6 columns">
        {{ Form::label('phone', 'Phone Number') }}
        {{ Form::input('tel', 'phone', null, ['placeholder' => '4168889989']) }}
      </div>
      <div class="small-6 columns">
        {{ Form::label('email', 'E-mail') }}
        {{ Form::text('email', null, ['placeholder' => 'you@email.com']) }}
      </div>
    </div>
    <div class="row">
      <div class="small-12 columns">
        {{ Form::label('resumeText', 'Resume (if not attaching)') }}
        {{ Form::textarea('resumeText', null, ['placeholder' => 'Write or paste your resume here']) }}
      </div>
    </div>
    <div class="row">
      <div class="small-12 columns">
        {{ Form::label('resume', 'Attach Resume (.pdf, .docx, .doc)') }}
        {{ Form::file('resume') }}
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