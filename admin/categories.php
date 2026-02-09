<?php
$pageTitle = 'Categories';
require __DIR__ . '/header.php';
$db = get_db();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $color = trim($_POST['color'] ?? DEFAULT_CATEGORY_COLOR);
    $description = trim($_POST['description'] ?? '');

    if ($name) {
        $slug = generate_unique_slug($db, 'categories', slugify($name));
        $stmt = $db->prepare('INSERT INTO categories (name, slug, color, description) VALUES (:name, :slug, :color, :description)');
        $stmt->execute([
            ':name' => $name,
            ':slug' => $slug,
            ':color' => $color,
            ':description' => $description,
        ]);
        $message = 'Category added.';
    }
}

$categories = get_categories();
?>

<div class="admin-card">
  <h1>Categories</h1>
  <?php if ($message): ?>
    <p style="color: #059669;"><?= e($message) ?></p>
  <?php endif; ?>
  <form method="post" style="margin-bottom: 1rem;">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="color">Color</label>
      <input type="color" id="color" name="color" value="#ea580c">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea id="description" name="description" rows="3"></textarea>
    </div>
    <button class="button" type="submit">Add Category</button>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Slug</th>
        <th>Color</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($categories) === 0): ?>
        <tr><td colspan="3">No categories yet.</td></tr>
      <?php else: ?>
        <?php foreach ($categories as $category): ?>
          <tr>
            <td><?= e($category['name']) ?></td>
            <td><?= e($category['slug']) ?></td>
            <td><span style="background: <?= e($category['color']) ?>; padding: 0.2rem 0.6rem; border-radius: 12px; color: white;"><?= e($category['color']) ?></span></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/footer.php'; ?>
