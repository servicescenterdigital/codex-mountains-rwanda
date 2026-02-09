<?php
$pageTitle = 'Dashboard';
require __DIR__ . '/header.php';
?>

<div class="admin-card">
  <h1>Dashboard</h1>
  <p>Welcome to Mountain Rwanda admin panel. Use the quick links to manage your site.</p>
</div>

<div class="admin-grid">
  <div class="admin-stat"><strong>Posts</strong><p><?= count(get_posts(['limit' => 1000])) ?></p></div>
  <div class="admin-stat"><strong>Categories</strong><p><?= count(get_categories()) ?></p></div>
  <div class="admin-stat"><strong>Tags</strong><p><?= count(get_tags()) ?></p></div>
</div>

<?php require __DIR__ . '/footer.php'; ?>
