<?php
$pageTitle = 'Tags';
require __DIR__ . '/header.php';
$db = get_db();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    if ($name) {
        $slug = generate_unique_slug($db, 'tags', slugify($name));
        $stmt = $db->prepare('INSERT INTO tags (name, slug) VALUES (:name, :slug)');
        $stmt->execute([':name' => $name, ':slug' => $slug]);
        $message = 'Tag added.';
    }
}

$tags = get_tags();
?>

<div class="admin-card">
  <h1>Tags</h1>
  <?php if ($message): ?>
    <p style="color: #059669;"><?= e($message) ?></p>
  <?php endif; ?>
  <form method="post" style="margin-bottom: 1rem;">
    <div class="form-group">
      <label for="name">Tag name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <button class="button" type="submit">Add Tag</button>
  </form>
  <div class="admin-card">
    <?php if (count($tags) === 0): ?>
      <p>No tags yet.</p>
    <?php else: ?>
      <?php foreach ($tags as $tag): ?>
        <span style="display:inline-block; background:#f1f5f9; padding:0.4rem 0.8rem; border-radius: 20px; margin: 0.2rem;">#<?= e($tag['name']) ?></span>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php require __DIR__ . '/footer.php'; ?>
