<!doctype html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>{{ $fullName }} has applied to {{ $job }}</h2>
    <h3>Phone: {{ $phone }} Email: {{ HTML::mailto($email) }}</h3>

    @if($attachment === false)
      <hr/>
      <p>Submitted text-resume:</p>
      <pre>{{ $resumeText }}</pre>
    @else
      <p>Please see the attached file for the applicant's resume.</p>
    @endif
  </body>
</html>