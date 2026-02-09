<?php
require __DIR__ . '/../includes/layout/header.php';
?>

<section class="category-block">
  <div class="section-header">
    <h2 class="section-title"><i class="fas fa-envelope"></i> Twandikire</h2>
  </div>
  <div class="two-column-layout">
    <div class="news-card" style="padding: 1.5rem;">
      <h3>Ohereza ubutumwa</h3>
      <form method="post" action="#">
        <div class="form-group">
          <label for="name">Amazina</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Ubutumwa</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button class="button" type="submit">Ohereza</button>
      </form>
    </div>
    <aside>
      <div class="sidebar-box">
        <h3 class="sidebar-title"><i class="fas fa-map-marker-alt"></i> Aderesi</h3>
        <p>KN 3 Ave, Kigali, Rwanda</p>
        <p>+250 788 123 456</p>
        <p>info@mountainrwanda.rw</p>
      </div>
    </aside>
  </div>
</section>

<?php require __DIR__ . '/../includes/layout/footer.php'; ?>
