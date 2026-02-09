<?php
$posts = get_posts(['limit' => 12, 'category_id' => (int) $category['id']]);
require __DIR__ . '/../includes/layout/header.php';
?>

<section class="category-block">
  <div class="section-header" style="border-bottom-color: <?= e($category['color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
    <h2 class="section-title" style="color: <?= e($category['color'] ?: DEFAULT_CATEGORY_COLOR) ?>;"><i class="fas fa-folder"></i> <?= e($category['name']) ?></h2>
  </div>
  <div class="two-column-layout">
    <div>
      <div class="news-grid grid-3">
        <?php if (count($posts) === 0): ?>
          <div class="empty-state" style="grid-column: span 3;">Nta nkuru z'icyiciro cya <?= e($category['name']) ?> zirahari.</div>
        <?php else: ?>
          <?php foreach ($posts as $post): ?>
            <article class="news-card">
              <div class="news-card-img">
                <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=600') ?>" alt="<?= e($post['title']) ?>">
                <span class="card-category-badge" style="background: <?= e($category['color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
                  <?= e($category['name']) ?>
                </span>
              </div>
              <div class="card-content">
                <h3 class="card-title"><a href="<?= e(app_url('post/' . $post['slug'])) ?>"><?= e($post['title']) ?></a></h3>
                <p class="card-excerpt"><?= e($post['excerpt'] ?: 'Nta ncamake irahari.') ?></p>
              </div>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <aside>
      <div class="sidebar-box">
        <h3 class="sidebar-title"><i class="fas fa-info-circle"></i> Iby'icyiciro</h3>
        <p><?= e($category['description'] ?: 'Ongeraho ibisobanuro by'icyiciro mu buyobozi.') ?></p>
      </div>
      <div class="sidebar-box">
        <h3 class="sidebar-title"><i class="fas fa-tags"></i> Tags</h3>
        <div class="tag-cloud">
          <?php $tags = get_tags(); ?>
          <?php if (count($tags) === 0): ?>
            <div class="empty-state">Nta tags zihari.</div>
          <?php else: ?>
            <?php foreach ($tags as $tag): ?>
              <a href="<?= e(app_url('tag/' . $tag['slug'])) ?>">#<?= e($tag['name']) ?></a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/../includes/layout/footer.php'; ?>
