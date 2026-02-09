<?php
$pageTitle = 'Posts';
require __DIR__ . '/header.php';
$posts = get_posts(['limit' => 50]);
?>

<div class="admin-card">
  <h1>Posts</h1>
  <p>Manage all posts, quick edit, bulk actions, and filters.</p>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Category</th>
        <th>Published</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($posts) === 0): ?>
        <tr><td colspan="4">No posts available.</td></tr>
      <?php else: ?>
        <?php foreach ($posts as $post): ?>
          <tr>
            <td><?= e($post['title']) ?></td>
            <td><?= e($post['status']) ?></td>
            <td><?= e($post['category_name'] ?: 'Uncategorized') ?></td>
            <td><?= e($post['published_at'] ?: '-') ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
