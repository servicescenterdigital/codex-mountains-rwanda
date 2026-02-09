<?php
$siteName = get_setting('site_name', 'Mountain Rwanda');
$categories = get_categories();
?>
<!DOCTYPE html>
<html lang="rw">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= e($pageTitle ?? $siteName) ?></title>
  <meta name="description" content="<?= e($pageDescription ?? "Ikinyamakuru cy'ingenzi ku makuru y'u Rwanda.") ?>" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>

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

<header>
  <div class="container-fluid">
    <div class="navbar">
      <a href="/" class="logo">
        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=200" alt="<?= e($siteName) ?>">
      </a>
      <nav class="desktop-nav">
        <ul>
          <li><a href="/" class="<?= ($activeNav ?? '') === 'home' ? 'active' : '' ?>"><i class="fas fa-home"></i> Ahabanza</a></li>
          <?php foreach ($categories as $category): ?>
            <li><a href="/category/<?= e($category['slug']) ?>"><i class="fas fa-folder"></i> <?= e($category['name']) ?></a></li>
          <?php endforeach; ?>
          <li><a href="/contact" class="<?= ($activeNav ?? '') === 'contact' ? 'active' : '' ?>"><i class="fas fa-envelope"></i> Twandikire</a></li>
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

<div class="sidebar-nav" id="sidebarNav" style="position: fixed; top:0; left:-320px; width:300px; height:100%; background: var(--primary); transition:left 0.4s ease; z-index:9999; padding: 4rem 1.5rem 2rem; overflow-y:auto;">
  <span class="sidebar-close" onclick="document.getElementById('sidebarNav').classList.remove('active')" style="position:absolute; top:0.8rem; right:1rem; font-size:2rem; color:white; cursor:pointer;">&times;</span>
  <ul style="list-style:none;">
    <li><a href="/"><i class="fas fa-home"></i> Ahabanza</a></li>
    <?php foreach ($categories as $category): ?>
      <li><a href="/category/<?= e($category['slug']) ?>"><i class="fas fa-folder"></i> <?= e($category['name']) ?></a></li>
    <?php endforeach; ?>
    <li><a href="/contact"><i class="fas fa-envelope"></i> Twandikire</a></li>
  </ul>
</div>

<div class="search-overlay" id="searchOverlay" style="position: fixed; inset: 0; background: rgba(15,23,42,0.95); z-index: 10000; display:none; align-items:center; justify-content:center; padding:2rem;">
  <span class="search-close" onclick="document.getElementById('searchOverlay').classList.remove('active')" style="position:absolute; top:2rem; right:2rem; color:white; font-size:2rem; cursor:pointer;">&times;</span>
  <div class="search-container" style="width:100%; max-width:700px;">
    <div style="position: relative;">
      <i class="fas fa-search" style="position:absolute; left:1.5rem; top:50%; transform: translateY(-50%); color:#94a3b8; font-size:1.2rem;"></i>
      <input type="text" placeholder="Shakira amakuru..." autofocus style="width:100%; padding:1.2rem 1.5rem 1.2rem 3.5rem; font-size:1.1rem; border:2px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.05); color:white; border-radius:8px;">
    </div>
  </div>
</div>

<div class="container-fluid">
