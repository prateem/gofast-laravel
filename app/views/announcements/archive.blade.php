<div class="row">
  <div class="large-12 columns">
    <h1>All Announcements</h1>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    <table>
      <thead>
      <tr>
        <th width='175'>Title</th>
        <th width='100'>Date Posted</th>
        <th>Content</th>
      </tr>
      </thead>
      <tbody>

        <?php foreach ($announcements as $announcement): ?>
        <tr>
          <td><?= link_to('announcements/'. $announcement->slug, $announcement->title); ?></td>
          <td><?= $announcement->posted ?></td>
          <td>{{{ ((strlen($announcement->body) > 150) ? substr($announcement->body, 0, 150) . "..." : $announcement->body)  }}}</td>
        </tr>
        <?php endforeach; ?>

      </tbody>
      <?php if ($announcements->getLastPage() > 1): ?>
      <tfoot>
        <tr>
          <td colspan="3" class="text-center">
            <?= $announcements->links() ?>
          </td>
        </tr>
      </tfoot>
      <?php endif; ?>
    </table>
  </div>
</div>