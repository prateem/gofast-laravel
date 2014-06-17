<div id="slideshow">
  <div class="row">
    <div class="large-12 columns">
      <h1>Welcome to <span style="color:#ee6123;">Go Fast Express</span>!</h1>
      <h4 class="subheader">Got a load? We got you covered. Request a quote now!</h4>
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
    <h4>We're Go Fast Express.</h4>
      <p>Go Fast is a truck based shipping company situated in the GTA. Founded in 2004 by a single driver with a single truck, we've grown to a fleet of trucks and trailers with over 15 experienced employees.</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="large-8 columns">
    <h4>Services</h4>
    <h5>Truckload Service</h5><p>We provide truck load service for both short and long haul requirements. Our seasoned drivers and well maintained equipment ensures that requested deliveries are made as promised. We ensure: <ul><li>All safety, maintenance and security requirements in place to reduce delays.</li><li> 24/7 centralized dispatch and in cab communications with drivers</li></ul></p>
    <h5>Less than Truckload Service</h5><p>We utilize trusted cross dock facilities that deliver a host of benefits to our customers including services across Canada and on time performance.</p>
  </div>
  <div class="large-4 columns">
    <img src="http://placehold.it/400x300&amp;text=[img]">
  </div>
</div>