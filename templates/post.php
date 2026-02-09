<?php
require __DIR__ . '/../includes/layout/header.php';
?>

<section class="category-block">
  <div class="section-header" style="border-bottom-color: <?= e($post['category_color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
    <h2 class="section-title" style="color: <?= e($post['category_color'] ?: DEFAULT_CATEGORY_COLOR) ?>;"><i class="fas fa-newspaper"></i> <?= e($post['title']) ?></h2>
  </div>
  <div class="two-column-layout">
    <article class="news-card" style="padding: 1.5rem;">
      <div class="news-card-img" style="margin-bottom: 1rem;">
        <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=800') ?>" alt="<?= e($post['title']) ?>">
        <span class="card-category-badge" style="background: <?= e($post['category_color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
          <?= e($post['category_name'] ?: 'Amakuru') ?>
        </span>
      </div>
      <div class="card-meta" style="margin-bottom: 1rem;">
        <span><i class="far fa-clock"></i> <?= e($post['published_at'] ?: $post['created_at']) ?></span>
        <span><i class="far fa-user"></i> <?= e($post['author_name'] ?? 'Mountain Rwanda') ?></span>
      </div>
      <div class="card-excerpt" style="-webkit-line-clamp: unset;">
        <?= nl2br(e($post['body'])) ?>
      </div>
    </article>
    <aside>
      <div class="sidebar-box">
        <h3 class="sidebar-title"><i class="fas fa-share-alt"></i> Sangiza</h3>
        <p>Shyira iyi nkuru ku mbuga nkoranyambaga.</p>
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
