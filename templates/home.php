<?php
$activeNav = 'home';
$posts = get_posts(['limit' => 20]);
$categories = get_categories();
$db = get_db();
$videos = $db->query('SELECT * FROM videos ORDER BY created_at DESC LIMIT 6')->fetchAll();
$gallery = $db->query('SELECT * FROM gallery ORDER BY created_at DESC LIMIT 5')->fetchAll();
$authors = $db->query('SELECT * FROM authors ORDER BY created_at DESC LIMIT 4')->fetchAll();
require __DIR__ . '/../includes/layout/header.php';
?>

<section class="hero-section">
  <div class="live-premium">
    <div class="live-badge">LIVE TV</div>
    <iframe src="https://www.youtube.com/embed/uOUvoS4uOkA?rel=0" allowfullscreen></iframe>
    <div class="live-overlay">
      <div class="live-title"><?= e(get_setting('live_title', 'Mountain Rwanda Live')) ?></div>
      <div class="live-subtitle"><?= e(get_setting('live_subtitle', "Amakuru y'uyu munsi mu buryo bwihuse | Kuri Television y'u Rwanda")) ?></div>
    </div>
  </div>

  <div class="hero-news-grid">
    <?php if (count($posts) === 0): ?>
      <div class="empty-state" style="grid-column: span 2;">Nta nkuru zashyizwe hanze.</div>
    <?php else: ?>
      <?php foreach (array_slice($posts, 0, 4) as $post): ?>
        <div class="hero-news-card">
          <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=600') ?>" alt="<?= e($post['title']) ?>">
          <div class="hero-news-overlay">
            <div class="hero-news-cat" style="color: <?= e($post['category_color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
              <?= e($post['category_name'] ?: 'Amakuru') ?>
            </div>
            <div class="hero-news-title"><a href="<?= e(app_url('post/' . $post['slug'])) ?>" style="color:white;"><?= e($post['title']) ?></a></div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<div class="breaking-strip">
  <span class="breaking-label"><i class="fas fa-bolt"></i> Amakuru agezweho</span>
  <span class="breaking-text">
    <?php if (count($posts) > 0): ?>
      <?= e($posts[0]['title']) ?> — <a href="<?= e(app_url('post/' . $posts[0]['slug'])) ?>">Soma byose</a>
    <?php else: ?>
      Nta makuru agezweho.
    <?php endif; ?>
  </span>
</div>

<div class="updates-strip">
  <div class="section-header" style="margin-bottom: 0.5rem;">
    <h3 class="section-title"><i class="fas fa-clock"></i> Amakuru agezweho</h3>
  </div>
  <?php if (count($posts) === 0): ?>
    <div class="empty-state">Nta makuru agezweho.</div>
  <?php else: ?>
    <?php foreach (array_slice($posts, 0, 5) as $post): ?>
      <div class="update-item">
        <span class="update-time"><?= e(date('H:i', strtotime($post['published_at'] ?: $post['created_at']))) ?></span>
        <span class="update-text"><a href="<?= e(app_url('post/' . $post['slug'])) ?>"><?= e($post['title']) ?></a></span>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<?php if (count($categories) === 0): ?>
  <section class="category-block">
    <div class="section-header">
      <h2 class="section-title"><i class="fas fa-folder"></i> Ibyiciro</h2>
    </div>
    <div class="empty-state">Nta byiciro birahari. Ongeramo ibyiciro mu buyobozi.</div>
  </section>
<?php else: ?>
  <?php foreach ($categories as $index => $category): ?>
    <?php $categoryPosts = get_posts(['limit' => 4, 'category_id' => (int) $category['id']]); ?>
    <section class="category-block">
      <div class="section-header" style="border-bottom-color: <?= e($category['color'] ?: DEFAULT_CATEGORY_COLOR) ?>;">
        <h2 class="section-title" style="color: <?= e($category['color'] ?: DEFAULT_CATEGORY_COLOR) ?>;"><i class="fas fa-folder"></i> <?= e($category['name']) ?></h2>
        <a href="<?= e(app_url('category/' . $category['slug'])) ?>" class="view-all">Reba byose <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="news-grid grid-4">
        <?php if (count($categoryPosts) === 0): ?>
          <div class="empty-state" style="grid-column: span 4;">Nta nkuru z'icyiciro cya <?= e($category['name']) ?> zirahari.</div>
        <?php else: ?>
          <?php foreach ($categoryPosts as $postIndex => $post): ?>
            <article class="news-card <?= $postIndex === 0 ? 'featured-card' : '' ?>">
              <div class="news-card-img">
                <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?w=800') ?>" alt="<?= e($post['title']) ?>">
                <span class="card-category-badge" style="background: <?= e($category['color'] ?: DEFAULT_CATEGORY_COLOR) ?>;"><?= e($category['name']) ?></span>
              </div>
              <div class="card-content">
                <h3 class="card-title"><a href="<?= e(app_url('post/' . $post['slug'])) ?>"><?= e($post['title']) ?></a></h3>
                <p class="card-excerpt"><?= e($post['excerpt'] ?: 'Nta ncamake irahari.') ?></p>
                <div class="card-meta">
                  <span><i class="far fa-clock"></i> <?= e($post['published_at'] ?: $post['created_at']) ?></span>
                  <span><i class="far fa-eye"></i> <?= e($post['views'] ?? '0') ?></span>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </section>

    <?php if ($index === 0): ?>
      <div class="mid-ad-slot ad-slot">
        <div>ADVERTISEMENT - 728×90 Leaderboard</div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>

<div class="two-column-layout">
  <div class="main-content">
    <section class="category-block">
      <div class="section-header">
        <h2 class="section-title"><i class="fas fa-video"></i> Amavidewo</h2>
        <a href="#" class="view-all">Reba byose <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="video-grid">
        <?php if (count($videos) === 0): ?>
          <div class="empty-state" style="grid-column: span 3;">Nta videwo zihari.</div>
        <?php else: ?>
          <?php foreach ($videos as $video): ?>
            <div class="video-card">
              <img src="https://img.youtube.com/vi/<?= e($video['youtube_id']) ?>/hqdefault.jpg" alt="<?= e($video['title']) ?>">
              <div class="play-button"><i class="fas fa-play"></i></div>
              <span class="video-duration"><?= e($video['duration'] ?: '00:00') ?></span>
              <div class="video-title"><?= e($video['title']) ?></div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </section>
  </div>

  <aside>
    <div class="sidebar-box" style="padding: 0; overflow: hidden;">
      <div class="weather-widget">
        <div class="weather-main">
          <div class="weather-icon"><i class="fas fa-cloud-sun"></i></div>
          <div>
            <div class="weather-temp">24°C</div>
            <div class="weather-desc">Hejuru y'ibicu</div>
            <div class="weather-location"><i class="fas fa-map-marker-alt"></i> Kigali, Rwanda</div>
          </div>
        </div>
        <div class="weather-details">
          <div><i class="fas fa-tint"></i> 65% Uruhu</div>
          <div><i class="fas fa-wind"></i> 12 km/h</div>
          <div><i class="fas fa-eye"></i> 10 km</div>
        </div>
      </div>
    </div>

    <div class="sidebar-box">
      <h3 class="sidebar-title"><i class="fas fa-fire"></i> Amakuru yihutirwa</h3>
      <div class="trending-list">
        <?php if (count($posts) === 0): ?>
          <div class="empty-state">Nta nkuru zihari.</div>
        <?php else: ?>
          <?php foreach (array_slice($posts, 0, 5) as $rank => $post): ?>
            <div class="trending-item">
              <span class="trending-rank"><?= $rank + 1 ?></span>
              <div class="trending-content">
                <h4><a href="<?= e(app_url('post/' . $post['slug'])) ?>"><?= e($post['title']) ?></a></h4>
                <span class="trending-meta"><i class="far fa-clock"></i> <?= e(date('H:i', strtotime($post['published_at'] ?: $post['created_at']))) ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="ad-slot sidebar-ad">
      <div>300×250 Ad</div>
    </div>
  </aside>
</div>

<div class="quote-section">
  <i class="fas fa-quote-left"></i>
  <p class="quote-text">"U Rwanda rukwiye kuba igihugu kizira amacakubiri, aho buri wese aba afite amahirwe angana."</p>
  <p class="quote-author">- Perezida Paul Kagame</p>
</div>

<section class="category-block">
  <div class="section-header" style="border-bottom-color: var(--accent);">
    <h2 class="section-title" style="color: var(--accent);"><i class="fas fa-images"></i> Amafoto</h2>
    <a href="#" class="view-all">Reba byose <i class="fas fa-arrow-right"></i></a>
  </div>
  <div class="gallery-grid">
    <?php if (count($gallery) === 0): ?>
      <div class="empty-state" style="grid-column: span 4;">Nta mafoto ahari.</div>
    <?php else: ?>
      <?php foreach ($gallery as $item): ?>
        <div class="gallery-item">
          <img src="<?= e($item['image_url']) ?>" alt="<?= e($item['title'] ?: 'Gallery') ?>">
          <div class="gallery-overlay"><i class="fas fa-expand"></i></div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section class="trending-numbers-section">
  <div class="section-header" style="justify-content: center;">
    <h2 class="section-title" style="font-size: 1.5rem;"><i class="fas fa-fire-alt"></i> Trending News</h2>
  </div>
  <div class="two-column-layout">
    <ol class="numbered-list">
      <?php foreach (array_slice($posts, 0, 5) as $rank => $post): ?>
        <li class="numbered-item">
          <span class="rank-number"><?= $rank + 1 ?></span>
          <div class="rank-content">
            <h3><a href="<?= e(app_url('post/' . $post['slug'])) ?>"><?= e($post['title']) ?></a></h3>
            <p class="rank-excerpt"><?= e($post['excerpt'] ?: 'Nta ncamake irahari.') ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
    <ol class="numbered-list" start="6">
      <?php foreach (array_slice($posts, 5, 5) as $rank => $post): ?>
        <li class="numbered-item">
          <span class="rank-number"><?= $rank + 6 ?></span>
          <div class="rank-content">
            <h3><a href="<?= e(app_url('post/' . $post['slug'])) ?>"><?= e($post['title']) ?></a></h3>
            <p class="rank-excerpt"><?= e($post['excerpt'] ?: 'Nta ncamake irahari.') ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="category-block">
  <div class="section-header" style="border-bottom-color: var(--accent);">
    <h2 class="section-title" style="color: var(--accent);"><i class="fas fa-podcast"></i> Podcasts</h2>
    <a href="#" class="view-all">Reba byose <i class="fas fa-arrow-right"></i></a>
  </div>
  <div class="news-grid grid-3">
    <?php if (count($posts) === 0): ?>
      <div class="empty-state" style="grid-column: span 3;">Nta podcast zihari.</div>
    <?php else: ?>
      <?php foreach (array_slice($posts, 0, 3) as $post): ?>
        <div class="podcast-card">
          <img src="<?= e($post['featured_image'] ?: 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?w=200') ?>" alt="Podcast" class="podcast-cover">
          <div class="podcast-info">
            <h4><?= e($post['title']) ?></h4>
            <p><?= e($post['excerpt'] ?: "Episode y'uyu munsi") ?></p>
            <div class="podcast-controls">
              <button class="play-btn"><i class="fas fa-play"></i></button>
              <div class="podcast-progress"><div class="podcast-progress-fill"></div></div>
              <span class="podcast-time">12:45</span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section class="category-block">
  <div class="section-header" style="border-bottom-color: var(--accent);">
    <h2 class="section-title" style="color: var(--accent);"><i class="fas fa-calendar-alt"></i> Ibikorwa</h2>
    <a href="#" class="view-all">Reba byose <i class="fas fa-arrow-right"></i></a>
  </div>
  <div class="two-column-layout">
    <div class="sidebar-box">
      <h3 class="sidebar-title"><i class="fas fa-calendar-day"></i> Ibikorwa biri imbere</h3>
      <div class="event-item">
        <div class="event-date">
          <div class="day">15</div>
          <div class="month">Gashy</div>
        </div>
        <div class="event-info">
          <h5>Inama y'Abakuru b'Ibigo by'Amabanki</h5>
          <p><i class="fas fa-map-marker-alt"></i> Kigali Convention Centre</p>
        </div>
      </div>
      <div class="event-item">
        <div class="event-date">
          <div class="day">20</div>
          <div class="month">Gashy</div>
        </div>
        <div class="event-info">
          <h5>Igikombe cya Shampiyona mu Basketball</h5>
          <p><i class="fas fa-map-marker-alt"></i> BK Arena</p>
        </div>
      </div>
      <div class="event-item">
        <div class="event-date">
          <div class="day">25</div>
          <div class="month">Gashy</div>
        </div>
        <div class="event-info">
          <h5>Inteko Rusange ya FERWAFA</h5>
          <p><i class="fas fa-map-marker-alt"></i> Hotel des Mille Collines</p>
        </div>
      </div>
      <div class="event-item">
        <div class="event-date">
          <div class="day">01</div>
          <div class="month">Weru</div>
        </div>
        <div class="event-info">
          <h5>Umukino wa Amavubi na Mozambique</h5>
          <p><i class="fas fa-map-marker-alt"></i> Stade Amahoro</p>
        </div>
      </div>
    </div>

    <div class="sidebar-box">
      <h3 class="sidebar-title"><i class="fas fa-users"></i> Abanyamakuru bacu</h3>
      <?php if (count($authors) === 0): ?>
        <div class="empty-state">Nta banyamakuru bahari.</div>
      <?php else: ?>
        <?php foreach ($authors as $author): ?>
          <div class="author-card">
            <img src="<?= e($author['avatar_url'] ?: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100') ?>" alt="Author" class="author-avatar">
            <div class="author-info">
              <h5><?= e($author['name']) ?></h5>
              <p><?= e($author['role'] ?: 'Umwanditsi') ?></p>
              <span class="articles"><i class="fas fa-pen"></i> <?= e($author['articles'] ?? '0') ?> articles</span>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<div class="mid-ad-slot ad-slot">
  <div>ADVERTISEMENT - 970×250 Billboard</div>
</div>

<?php require __DIR__ . '/../includes/layout/footer.php'; ?>
