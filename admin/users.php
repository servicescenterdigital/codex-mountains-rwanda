<?php
$pageTitle = 'Users';
require __DIR__ . '/header.php';
$db = get_db();
$users = $db->query('SELECT id, name, email, role FROM users ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Users</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= e($user['name']) ?></td>
          <td><?= e($user['email']) ?></td>
          <td><?= e($user['role']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
