<?php $date = new DateTime(); ?>
<div class="row">
  <div class="small-12 columns">
    <div class="row">
      <div class="large-5 columns">
        <h1>Looking for work?</h1>
      </div>
      <div class="large-7 columns">
        <h1><small>Take a look at our open positions!</small></h1>
      </div>
    </div>

    <table>
      <thead>
      <tr>
        <th>Title</th>
        <th>Post Date</th>
        <th>Close Date</th>
        <th>Description</th>
        <th>Requirements</th>
      </tr>
      </thead>
      <tbody>

        @foreach($jobs as $job)
        <tr>
          <td>{{ link_to_route('jobs.show', $job->title, $job->id) }}</td>
          <td>
            <?php
              $date->modify($job->created_at);
              echo $date->format('Y-m-d');
            ?>
          </td>
          <td class="text-center">{{ ($job->closing ?: 'N/A') }}</td>
          <td>{{{ ((strlen($job->description) > 150) ? substr($job->description,0,150) . "..." : $job->description) }}}</td>
          <td>{{{ ((strlen($job->requirements) > 150) ? substr($job->requirements,0,150) . "..." : $job->requirements) }}}</td>
        </tr>
        @endforeach

      </tbody>
      @if($jobs->getLastPage() > 1)
      <tfoot>
        <tr>
          <td colspan="5" class="text-center">
            {{ $jobs->links() }}
          </td>
        </tr>
      </tfoot>
      @endif
    </table>
  </div>
</div>