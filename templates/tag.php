<?php
$posts = get_posts_by_tag($tag);
require __DIR__ . '/../includes/layout/header.php';
?>

<section class="category-block">
  <div class="section-header">
    <h2 class="section-title"><i class="fas fa-tag"></i> Tag: <?= e($tag) ?></h2>
  </div>
  <div class="news-grid grid-3">
    <?php if (count($posts) === 0): ?>
      <div class="empty-state" style="grid-column: span 3;">Nta nkuru zifite iyi tag.</div>
    <?php else: ?>
      <?php foreach ($posts as $post): ?>
        <article class="news-card">
          <div class="news-card-img">
            <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=600') ?>" alt="<?= e($post['title']) ?>">
            <span class="card-category-badge" style="background: <?= e($post['category_color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
              <?= e($post['category_name'] ?: 'Amakuru') ?>
            </span>
          </div>
          <div class="card-content">
            <h3 class="card-title"><a href="/post/<?= e($post['slug']) ?>"><?= e($post['title']) ?></a></h3>
            <p class="card-excerpt"><?= e($post['excerpt'] ?: 'Nta ncamake irahari.') ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<?php require __DIR__ . '/../includes/layout/footer.php'; ?>
