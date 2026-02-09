<?php
$pageTitle = 'Comments';
require __DIR__ . '/header.php';
$db = get_db();
$comments = $db->query('SELECT * FROM comments ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Comments</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Message</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($comments) === 0): ?>
        <tr><td colspan="4">No comments yet.</td></tr>
      <?php else: ?>
        <?php foreach ($comments as $comment): ?>
          <tr>
            <td><?= e($comment['name']) ?></td>
            <td><?= e($comment['message']) ?></td>
            <td><?= e($comment['status']) ?></td>
            <td><?= e($comment['created_at']) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
