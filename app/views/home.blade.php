<div id="slideshow">
  <div class="row">
    <div class="large-12 columns">
      <h1>Welcome to <span style="color:#ee6123;">Go Fast Express</span>!</h1>
      <h4 class="subheader">Got a load? We got you covered. Request a quote today!</h4>
    </div>
  </div>
  <div class="row show-for-medium-up">
    <div class="large-12 columns">
      <div class="orbit-container">
        <ul data-orbit>
          <li>
            <img src="http://placehold.it/1000x400&text=[%20img%201%20]" alt="slide 1" />
            <div class="orbit-caption">
              Caption One.
            </div>
          </li>
          <li class="active">
            <img src="http://placehold.it/1000x400&text=[%20img%202%20]" alt="slide 2" />
            <div class="orbit-caption">
              Caption Two.
            </div>
          </li>
          <li>
            <img src="http://placehold.it/1000x400&text=[%20img%203%20]" alt="slide 3" />
            <div class="orbit-caption">
              Caption Three.
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Three-up Content Blocks -->
<div class="row">
  <div class="small-12 columns">
    <h2>What's new</h2>
    <div class="row">
      @foreach($news as $announcement)
        <div class="medium-4 columns">
          <h4>{{ link_to_route('announcements.show', $announcement->title, $announcement->slug) }}</h4>
          <p>{{{ ((strlen($announcement->body) > 150) ? substr($announcement->body, 0, 150) . "..." : $announcement->body) }}}</p>
        </div>
      @endforeach
    </div>
    <hr/>
  </div>
</div>
<div class="row">
  <div class="large-4 columns">
    <img src="http://placehold.it/400x300&amp;text=[img]">
  </div>
  <div class="large-8 columns">
    <h4>This is a content section.</h4>
    <div class="row">
      <div class="large-6 columns">
      <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
      </div>
      <div class="large-6 columns">
      <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="large-8 columns">
    <h4>This is a content section.</h4>
    <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
    <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow. Nulla corned beef sunt ball tip, qui bresaola enim jowl. Capicola short ribs minim salami nulla nostrud pastrami.</p>
  </div>
  <div class="large-4 columns">
    <img src="http://placehold.it/400x300&amp;text=[img]">
  </div>
</div>