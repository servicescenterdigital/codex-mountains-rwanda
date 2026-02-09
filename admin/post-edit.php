<?php
$pageTitle = 'New Post';
require __DIR__ . '/header.php';

$db = get_db();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $excerpt = trim($_POST['excerpt'] ?? '');
    $body = trim($_POST['body'] ?? '');
    $categoryId = $_POST['category_id'] ?? null;
    $status = $_POST['status'] ?? 'draft';
    $featuredImage = trim($_POST['featured_image'] ?? '');

    $slug = generate_unique_slug($db, 'posts', slugify($title));

    $stmt = $db->prepare('INSERT INTO posts (title, slug, excerpt, body, featured_image, status, category_id, author_id, published_at) VALUES (:title, :slug, :excerpt, :body, :featured_image, :status, :category_id, :author_id, :published_at)');
    $stmt->execute([
        ':title' => $title,
        ':slug' => $slug,
        ':excerpt' => $excerpt,
        ':body' => $body,
        ':featured_image' => $featuredImage,
        ':status' => $status,
        ':category_id' => $categoryId ?: null,
        ':author_id' => $_SESSION['user_id'],
        ':published_at' => $status === 'published' ? date('Y-m-d H:i:s') : null,
    ]);

    $message = 'Post saved successfully.';
}

$categories = get_categories();
?>

<div class="admin-card">
  <h1>Create Post</h1>
  <?php if ($message): ?>
    <p style="color: #059669;"><?= e($message) ?></p>
  <?php endif; ?>
  <form method="post">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
      <label for="excerpt">Excerpt</label>
      <textarea id="excerpt" name="excerpt" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="body">Content</label>
      <textarea id="body" name="body" rows="8"></textarea>
    </div>
    <div class="form-group">
      <label for="category_id">Category</label>
      <select id="category_id" name="category_id">
        <option value="">Uncategorized</option>
        <?php foreach ($categories as $category): ?>
          <option value="<?= e($category['id']) ?>"><?= e($category['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="featured_image">Featured Image URL</label>
      <input type="text" id="featured_image" name="featured_image">
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select id="status" name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
    </div>
    <button class="button" type="submit">Save</button>
  </form>
</div>

<?php require __DIR__ . '/footer.php'; ?>
