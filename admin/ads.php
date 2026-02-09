<?php
$pageTitle = 'Ads';
require __DIR__ . '/header.php';
$db = get_db();
$ads = $db->query('SELECT * FROM ads ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Ads Manager</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Placement</th>
        <th>Type</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($ads) === 0): ?>
        <tr><td colspan="4">No ads configured.</td></tr>
      <?php else: ?>
        <?php foreach ($ads as $ad): ?>
          <tr>
            <td><?= e($ad['name']) ?></td>
            <td><?= e($ad['placement']) ?></td>
            <td><?= e($ad['type']) ?></td>
            <td><?= $ad['is_active'] ? 'Active' : 'Paused' ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
