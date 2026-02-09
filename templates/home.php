<?php
$activeNav = 'home';
$posts = get_posts(['limit' => 8]);
$categories = get_categories();
require __DIR__ . '/../includes/layout/header.php';
?>

<section class="hero-section">
  <div class="news-card" style="padding: 1.5rem;">
    <h2>Amakuru y'uyu munsi</h2>
    <p>Shakisha amakuru agezweho, ibyiciro byihariye n'inkuru zidasanzwe z'uyu munsi.</p>
    <div class="card-meta">
      <span><i class="far fa-clock"></i> <?= date('H:i') ?></span>
      <span><i class="far fa-eye"></i> <?= count($posts) ?> inkuru</span>
    </div>
  </div>
  <div class="hero-news-grid">
    <?php if (count($posts) === 0): ?>
      <div class="empty-state" style="grid-column: span 2;">Nta nkuru zashyizwe hanze. Tangira wandike inkuru nshya mu buyobozi.</div>
    <?php else: ?>
      <?php foreach (array_slice($posts, 0, 4) as $post): ?>
        <div class="hero-news-card">
          <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=600') ?>" alt="<?= e($post['title']) ?>">
          <div class="hero-news-overlay">
            <div class="hero-news-cat" style="color: <?= e($post['category_color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
              <?= e($post['category_name'] ?: 'Amakuru') ?>
            </div>
            <div class="hero-news-title"><a href="/post/<?= e($post['slug']) ?>" style="color:white;"><?= e($post['title']) ?></a></div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section class="category-block">
  <div class="section-header">
    <h2 class="section-title"><i class="fas fa-layer-group"></i> Ibyiciro</h2>
    <a href="#" class="view-all">Reba byose <i class="fas fa-arrow-right"></i></a>
  </div>
  <div class="news-grid grid-4">
    <?php if (count($categories) === 0): ?>
      <div class="empty-state" style="grid-column: span 4;">Nta byiciro birahari. Ongera ibyiciro kugirango ubitandukanye neza.</div>
    <?php else: ?>
      <?php foreach ($categories as $category): ?>
        <article class="news-card">
          <div class="card-content">
            <h3 class="card-title"><a href="/category/<?= e($category['slug']) ?>"><?= e($category['name']) ?></a></h3>
            <p class="card-excerpt"><?= e($category['description'] ?: 'Nta bisobanuro bihari. Ongeraho ibisobanuro by'icyiciro mu buyobozi.') ?></p>
            <span class="card-category-badge" style="background: <?= e($category['color'] ?: DEFAULT_CATEGORY_COLOR) ?>; position: static; display: inline-block; margin-top: 0.6rem;">Shakisha</span>
          </div>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section class="category-block">
  <div class="section-header">
    <h2 class="section-title"><i class="fas fa-bolt"></i> Amakuru mashya</h2>
  </div>
  <div class="news-grid grid-4">
    <?php if (count($posts) === 0): ?>
      <div class="empty-state" style="grid-column: span 4;">Nta nkuru zihari.</div>
    <?php else: ?>
      <?php foreach ($posts as $post): ?>
        <article class="news-card">
          <div class="news-card-img">
            <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600') ?>" alt="<?= e($post['title']) ?>">
            <span class="card-category-badge" style="background: <?= e($post['category_color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
              <?= e($post['category_name'] ?: 'Amakuru') ?>
            </span>
          </div>
          <div class="card-content">
            <h3 class="card-title"><a href="/post/<?= e($post['slug']) ?>"><?= e($post['title']) ?></a></h3>
            <p class="card-excerpt"><?= e($post['excerpt'] ?: 'Nta ncamake irahari.') ?></p>
            <div class="card-meta">
              <span><i class="far fa-clock"></i> <?= e($post['published_at'] ?: $post['created_at']) ?></span>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section class="category-block">
  <div class="section-header">
    <h2 class="section-title"><i class="fas fa-tag"></i> Tags</h2>
  </div>
  <div class="sidebar-box">
    <div class="tag-cloud" style="display:flex; flex-wrap: wrap; gap: 0.5rem;">
      <?php $tags = get_tags(); ?>
      <?php if (count($tags) === 0): ?>
        <div class="empty-state">Nta tags zihari.</div>
      <?php else: ?>
        <?php foreach ($tags as $tag): ?>
          <a href="/tag/<?= e($tag['slug']) ?>" style="background:#f1f5f9; padding:0.4rem 0.8rem; border-radius: 20px;">#<?= e($tag['name']) ?></a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/layout/footer.php'; ?>
