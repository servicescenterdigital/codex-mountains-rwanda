<?php
$siteName = get_setting('site_name', SITE_NAME);
$categories = get_categories();
$tickerPosts = get_posts(['limit' => 10]);
?>
<!DOCTYPE html>
<html lang="rw">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= e($pageTitle ?? $siteName) ?></title>
  <meta name="description" content="<?= e($pageDescription ?? SITE_DESCRIPTION) ?>" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="<?= e(app_url('assets/styles.css')) ?>">
</head>
<body>

<div class="search-overlay" id="searchOverlay">
  <span class="search-close" onclick="document.getElementById('searchOverlay').classList.remove('active')">&times;</span>
  <div class="search-container">
    <div class="search-input-wrapper">
      <i class="fas fa-search"></i>
      <input type="text" placeholder="Shakira amakuru..." autofocus>
    </div>
    <div class="search-suggestions">
      <h4>Amakuru yihutirwa</h4>
      <div class="suggestion-tags">
        <?php foreach (array_slice($tickerPosts, 0, 6) as $post): ?>
          <a href="<?= e(app_url('post/' . $post['slug'])) ?>"><?= e($post['title']) ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<div class="top-bar">
  <div class="container-fluid">
    <div class="top-bar-content">
      <div class="top-bar-left">
        <span><i class="far fa-calendar"></i> <?= date('l, d F Y') ?></span>
        <span><i class="fas fa-cloud-sun"></i> Kigali 24°C</span>
        <span><i class="far fa-envelope"></i> info@mountainrwanda.rw</span>
      </div>
      <div class="top-bar-right">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="top-ad-slot ad-slot">
  <div>ADVERTISEMENT - 970×250 Header Banner</div>
</div>

<div class="news-ticker">
  <div class="container-fluid">
    <div class="ticker-wrapper">
      <span class="ticker-label"><i class="fas fa-bolt"></i> LIVE</span>
      <div class="ticker-content">
        <?php if (count($tickerPosts) === 0): ?>
          <span class="ticker-item"><a href="#"><i class="fas fa-circle"></i> Nta nkuru zashyizwe hanze.</a></span>
        <?php else: ?>
          <?php foreach ($tickerPosts as $post): ?>
            <span class="ticker-item"><a href="<?= e(app_url('post/' . $post['slug'])) ?>"><i class="fas fa-circle"></i> <?= e($post['title']) ?></a></span>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<header>
  <div class="container-fluid">
    <div class="navbar">
      <a href="<?= e(app_url()) ?>" class="logo">
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=200" alt="<?= e($siteName) ?>">
      </a>

      <nav class="desktop-nav">
        <ul>
          <li><a href="<?= e(app_url()) ?>" class="<?= ($activeNav ?? '') === 'home' ? 'active' : '' ?>"><i class="fas fa-home"></i> Ahabanza</a></li>
          <?php foreach ($categories as $category): ?>
            <li><a href="<?= e(app_url('category/' . $category['slug'])) ?>"><i class="fas fa-folder"></i> <?= e($category['name']) ?></a></li>
          <?php endforeach; ?>
          <li><a href="<?= e(app_url('contact')) ?>" class="<?= ($activeNav ?? '') === 'contact' ? 'active' : '' ?>"><i class="fas fa-envelope"></i> Twandikire</a></li>
        </ul>
      </nav>

      <div class="nav-actions">
        <span class="search-trigger" onclick="document.getElementById('searchOverlay').classList.add('active')">
          <i class="fas fa-search"></i>
        </span>
        <div class="hamburger" onclick="document.getElementById('sidebarNav').classList.add('active')">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </div>
  </div>
</header>

<div id="sidebarNav" class="sidebar-nav">
  <span class="sidebar-close" onclick="document.getElementById('sidebarNav').classList.remove('active')">&times;</span>
  <ul>
    <li><a href="<?= e(app_url()) ?>" class="<?= ($activeNav ?? '') === 'home' ? 'active' : '' ?>"><i class="fas fa-home"></i> Ahabanza</a></li>
    <?php foreach ($categories as $category): ?>
      <li><a href="<?= e(app_url('category/' . $category['slug'])) ?>"><i class="fas fa-folder"></i> <?= e($category['name']) ?></a></li>
    <?php endforeach; ?>
    <li><a href="<?= e(app_url('contact')) ?>"><i class="fas fa-envelope"></i> Twandikire</a></li>
  </ul>
</div>

<div class="container-fluid">
