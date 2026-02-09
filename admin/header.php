<?php
require_once __DIR__ . '/../includes/functions.php';
require_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle ?? 'Admin Panel') ?></title>
  <link rel="stylesheet" href="<?= e(app_url('assets/styles.css')) ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="admin-wrapper">
  <aside class="admin-sidebar">
    <h2>Mountain Admin</h2>
    <nav>
      <a href="<?= e(app_url('admin/index.php')) ?>"><i class="fas fa-chart-pie"></i> Dashboard</a>
      <a href="<?= e(app_url('admin/posts.php')) ?>"><i class="fas fa-newspaper"></i> Posts</a>
      <a href="<?= e(app_url('admin/post-edit.php')) ?>"><i class="fas fa-pen"></i> New Post</a>
      <a href="<?= e(app_url('admin/categories.php')) ?>"><i class="fas fa-folder"></i> Categories</a>
      <a href="<?= e(app_url('admin/tags.php')) ?>"><i class="fas fa-tags"></i> Tags</a>
      <a href="<?= e(app_url('admin/comments.php')) ?>"><i class="fas fa-comments"></i> Comments</a>
      <a href="<?= e(app_url('admin/media.php')) ?>"><i class="fas fa-photo-film"></i> Media</a>
      <a href="<?= e(app_url('admin/ads.php')) ?>"><i class="fas fa-bullhorn"></i> Ads</a>
      <a href="<?= e(app_url('admin/live.php')) ?>"><i class="fas fa-video"></i> Live</a>
      <a href="<?= e(app_url('admin/videos.php')) ?>"><i class="fas fa-play"></i> Videos</a>
      <a href="<?= e(app_url('admin/gallery.php')) ?>"><i class="fas fa-images"></i> Gallery</a>
      <a href="<?= e(app_url('admin/authors.php')) ?>"><i class="fas fa-user-pen"></i> Authors</a>
      <a href="<?= e(app_url('admin/users.php')) ?>"><i class="fas fa-users"></i> Users</a>
      <a href="<?= e(app_url('admin/profile.php')) ?>"><i class="fas fa-id-card"></i> Profile</a>
      <a href="<?= e(app_url('admin/settings.php')) ?>"><i class="fas fa-gear"></i> Settings</a>
      <a href="<?= e(app_url('admin/logout.php')) ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
  </aside>
  <main class="admin-main">
