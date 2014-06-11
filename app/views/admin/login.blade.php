<div class="row">
  <h2>Login</h2>

  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
  {{ Form::open(['route' => 'doLogin']) }}

  <div class="row">
    <div class="medium-6 columns">
      {{ Form::label('username', 'Username') }}
      {{ Form::text('username', null, ['placeholder' => 'Username']) }}
    </div>
  </div>

  <div class="row">
    <div class="medium-6 columns">
      {{ Form::label('password', 'Password') }}
      {{ Form::input('password', 'password', null, ['placeholder' => 'Password']) }}
    </div>
  </div>

  <div class="row">
    <div class="small-6 columns">
      {{ Form::submit('Submit', ['class' => 'button']) }}
    </div>
  </div>

  {{ Form::close() }}
</div>