<?php $date = new DateTime(); ?>
<div class="row">
  <div class="small-12 columns">
    <br/>
    <div class="row">
    <div class="small-6 columns">
    <h1>Job Postings</h1></div>
    <div class="small-6 columns text-right">
    {{ link_to_route('admin.jobs.create', 'Post New Job', null, ['class' => 'button text-right']) }}
    </div>
    </div>
    <table>
      <thead>
      <tr>
        <th>Title</th>
        <th>Posted</th>
        <th>Closing</th>
        <th>Description</th>
        <th colspan="3">Requirements</th>
      </tr>
      </thead>
      <tbody>
      @foreach($jobs as $job)
      <tr>
        <td>{{ link_to_route('admin.jobs.show', $job->title, $job->id) }}</td>
        <td>
          <?php
          $date->modify($job->created_at);
          echo $date->format('Y-m-d');
          ?>
        </td>
        <td class="text-center">{{ ($job->closing ?: 'N/A') }}</td>
        <td>{{{ ((strlen($job->description) > 150) ? substr($job->description, 0, 150)."..." : $job->description) }}}</td>
        <td>{{{ ((strlen($job->requirements) > 150) ? substr($job->requirements, 0, 150)."..." : $job->requirements) }}}</td>
        <td>{{ link_to_route('admin.jobs.edit', 'Edit', $job->id, ['class' => 'button small secondary']) }}</td>
        <td>{{ link_to_route('admin.jobs.destroy', 'Delete', $job->id, ['data-method' => 'delete', 'class' => 'button small alert']) }}</td>
      </tr>
      @endforeach
      </tbody>
      @if($jobs->getLastPage() > 1)
      <tfoot>
      <tr>
        <td colspan="7" class="text-center">
          {{ $jobs->links() }}
        </td>
      </tr>
      </tfoot>
      @endif
    </table>
  </div>
</div>