<br>
<div class="row">
  <ul class="breadcrumbs large-12 columns">
    <li><?= link_to_route('adminHome', 'Home') ?></li>
    <li><?= link_to_route('adminAnnouncementsArchive', 'Announcements') ?></li>
    <li class="current">{{{ $announcement->title }}}</li>
  </ul>
</div>

<div class="row">
  <div class="small-12 columns">
    <h1>{{{ $announcement->title }}}</h1>
    <p class="right"><em>Date Posted: {{{ $announcement->created_at }}}</em></p>
    <hr/>

    <p>{{{ $announcement->body }}}</p>
    <ul class="button-group">
      <li><?= link_to_route('adminAnnouncementsArchive', 'View All', null, ['class' => 'button right']) ?></li>
      <li><?= link_to_route('editAnnouncement', 'Edit', ['slug' => $announcement->slug], ['class' => 'button right']) ?></li>
      <li><?= link_to_route('deleteAnnouncement', 'Delete', ['id' => $announcement->id], ['class' => 'button right']) ?></li>
    </ul>
  </div>
</div>