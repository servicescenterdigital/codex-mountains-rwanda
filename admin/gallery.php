<?php
$pageTitle = 'Gallery';
require __DIR__ . '/header.php';
$db = get_db();
$gallery = $db->query('SELECT * FROM gallery ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Gallery</h1>
  <div class="admin-grid">
    <?php if (count($gallery) === 0): ?>
      <p>No gallery images yet.</p>
    <?php else: ?>
      <?php foreach ($gallery as $item): ?>
        <div class="admin-stat">
          <img src="<?= e($item['image_url']) ?>" alt="<?= e($item['title'] ?? 'Gallery') ?>">
          <p><?= e($item['title'] ?? '') ?></p>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php require __DIR__ . '/footer.php'; ?>
