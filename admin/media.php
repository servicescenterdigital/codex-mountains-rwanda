<?php
$pageTitle = 'Media';
require __DIR__ . '/header.php';
$db = get_db();
$media = $db->query('SELECT * FROM media ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Media Library</h1>
  <p>Drag and drop uploads and copy URLs.</p>
  <div class="admin-grid">
    <?php if (count($media) === 0): ?>
      <p>No media uploaded yet.</p>
    <?php else: ?>
      <?php foreach ($media as $item): ?>
        <div class="admin-stat">
          <img src="<?= e($item['file_url']) ?>" alt="<?= e($item['title'] ?? 'Media') ?>">
          <p><?= e($item['file_url']) ?></p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php require __DIR__ . '/footer.php'; ?>
