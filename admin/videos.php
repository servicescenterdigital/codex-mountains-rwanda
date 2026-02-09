<?php
$pageTitle = 'Videos';
require __DIR__ . '/header.php';
$db = get_db();
$videos = $db->query('SELECT * FROM videos ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Videos</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>YouTube ID</th>
        <th>Duration</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($videos) === 0): ?>
        <tr><td colspan="3">No videos added.</td></tr>
      <?php else: ?>
        <?php foreach ($videos as $video): ?>
          <tr>
            <td><?= e($video['title']) ?></td>
            <td><?= e($video['youtube_id']) ?></td>
            <td><?= e($video['duration'] ?: '-') ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
