<?php
$pageTitle = 'Profile';
require __DIR__ . '/header.php';
$db = get_db();
$userId = $_SESSION['user_id'];
$user = $db->query('SELECT name, email FROM users WHERE id = ' . (int) $userId)->fetch(PDO::FETCH_ASSOC);
?>

<div class="admin-card">
  <h1>Profile</h1>
  <div class="form-group">
    <label>Name</label>
    <input type="text" value="<?= e($user['name'] ?? '') ?>" disabled>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" value="<?= e($user['email'] ?? '') ?>" disabled>
  </div>
  <div class="form-group">
    <label>Change Password</label>
    <input type="password" placeholder="New password">
  </div>
  <button class="button" type="button">Update</button>
</div>

<?php require __DIR__ . '/footer.php'; ?>
