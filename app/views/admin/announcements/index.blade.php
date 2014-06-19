<?php $date = new DateTime(); ?>
<div class="row">
  <div class="small-12 columns">
    <br/>
    <div class="row">
    <div class="small-6 columns">
    <h1>All Announcements</h1></div>
    <div class="small-6 columns text-right">
    {{ link_to_route('admin.announcements.create', 'Post New Announcement', null, ['class' => 'button text-right']) }}
    </div>
    </div>
    <table>
      <thead>
      <tr>
        <th width='175'>Title</th>
        <th width='100'>Date Posted</th>
        <th colspan="3">Content</th>
      </tr>
      </thead>
      <tbody>
      @foreach($announcements as $announcement)
        <tr>
          <td>{{ link_to_route('admin.announcements.show', $announcement->title, $announcement->slug); }}</td>
          <td>
            <?php
              $date->modify($announcement->created_at);
              echo $date->format('Y-m-d');
            ?>
          </td>
          <td>{{{ ((strlen($announcement->body) > 150) ? substr($announcement->body, 0, 150) . "..." : $announcement->body)  }}}</td>
          <td>{{ link_to_route('admin.announcements.edit', 'Edit', $announcement->slug, ['class' => 'button small secondary']) }}</td>
          <td>{{ link_to_route('admin.announcements.destroy', 'Delete', $announcement->slug, ['class' => 'button small alert', 'data-method' => 'delete']) }}</td>
        </tr>
      @endforeach
      </tbody>
      @if($announcements->getLastPage() > 1)
      <tfoot>
      <tr>
        <td colspan="5" class="text-center">
          {{ $announcements->links() }}
        </td>
      </tr>
      </tfoot>
      @endif
    </table>
  </div>
</div>