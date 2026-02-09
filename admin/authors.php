<?php
$pageTitle = 'Authors';
require __DIR__ . '/header.php';
$db = get_db();
$authors = $db->query('SELECT * FROM authors ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Authors</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Social</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($authors) === 0): ?>
        <tr><td colspan="3">No authors yet.</td></tr>
      <?php else: ?>
        <?php foreach ($authors as $author): ?>
          <tr>
            <td><?= e($author['name']) ?></td>
            <td><?= e($author['role'] ?? '-') ?></td>
            <td><?= e($author['twitter'] ?? '-') ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
