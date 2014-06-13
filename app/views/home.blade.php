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
  </div>
</div>