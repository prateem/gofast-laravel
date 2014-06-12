<div class="row">
  <h2>Administration Control Panel</h2>
  <hr/>

  <h3>{{ link_to_route('admin.announcements.create', 'Post New Announcement') }}</h3>

  <p>Most Recent Announcements</p>
  <table>
    <thead>
      <th>Title</th>
      <th>Posted</th>
      <th>Contents</th>
    </thead>
    <tbody>
      @foreach($announcements as $announcement)
        <tr>
          <td>{{ link_to_route('admin.announcements.show', $announcement->title, $announcement->slug) }}</td>
          <td>
            <?php
              $date = new DateTime($announcement->created_at);
              echo $date->format('Y-m-d');
            ?>
          </td>
          <td>{{{ ((strlen($announcement->body) > 150) ? substr($announcement->body, 0, 150)."..." : $announcement->body) }}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <hr/>

  <h3>{{ link_to_route('admin.jobs.create', 'Post New Job') }}</h3>

  <p>Most Recent Job Postings</p>
  <table>
    <thead>
      <th>Title</th>
      <th>Posted</th>
      <th>Closing</th>
      <th>Description</th>
      <th>Requirements</th>
    </thead>
    <tbody>
      @foreach($jobs as $job)
        <tr>
          <td>{{ link_to_route('admin.jobs.show', $job->title, $job->id) }}</td>
          <td>
            <?php
              $date = new DateTime($job->created_at);
              echo $date->format('Y-m-d');
            ?>
          </td>
          <td>
            @if($job->closing != '0000-00-00')
              {{ $job->closing }}
            @endif
          </td>
          <td>{{{ ((strlen($job->description) > 150) ? substr($job->description, 0, 150)."..." : $job->description) }}}</td>
          <td>{{{ ((strlen($job->requirements) > 150) ? substr($job->requirements, 0, 150)."..." : $job->requirements) }}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>