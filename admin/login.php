<?php
require_once __DIR__ . '/../includes/functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $db = get_db();
    $stmt = $db->prepare('SELECT id, password_hash FROM users WHERE email = :email');
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: /admin/index.php');
        exit;
    }

    $error = 'Invalid login credentials.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="/assets/styles.css">
</head>
<body style="display:flex; align-items:center; justify-content:center; min-height:100vh; background:#f8fafc;">
  <form class="admin-card" method="post" style="width: 100%; max-width: 420px;">
    <h2>Admin Login</h2>
    <?php if ($error): ?>
      <p style="color: #dc2626;"><?= e($error) ?></p>
    <?php endif; ?>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group" style="flex-direction: row; align-items:center; gap: 0.5rem;">
      <input type="checkbox" id="remember" name="remember">
      <label for="remember">Remember me</label>
    </div>
    <button class="button" type="submit">Login</button>
  </form>
</body>
</html>
