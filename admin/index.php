<?php
$pageTitle = 'Dashboard';
require __DIR__ . '/header.php';
?>

<div class="admin-card">
  <h1>Dashboard</h1>
  <p>Welcome to Mountain Rwanda admin panel. Use the quick links to manage your site.</p>
</div>

<?php
$db = get_db();
$postCount = (int) $db->query('SELECT COUNT(*) FROM posts')->fetchColumn();
$categoryCount = (int) $db->query('SELECT COUNT(*) FROM categories')->fetchColumn();
$tagCount = (int) $db->query('SELECT COUNT(*) FROM tags')->fetchColumn();
?>

<div class="admin-grid">
  <div class="admin-stat"><strong>Posts</strong><p><?= $postCount ?></p></div>
  <div class="admin-stat"><strong>Categories</strong><p><?= $categoryCount ?></p></div>
  <div class="admin-stat"><strong>Tags</strong><p><?= $tagCount ?></p></div>
</div>

<?php require __DIR__ . '/footer.php'; ?>
