</div>

<footer>
  <div class="container-fluid">
    <div class="footer-grid">
      <div class="footer-col footer-about">
        <h4><?= e(get_setting('site_name', SITE_NAME)) ?></h4>
        <p><?= e(get_setting('site_description', SITE_DESCRIPTION)) ?></p>
        <div class="footer-social">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Ibyiciro</h4>
        <ul>
          <?php foreach (get_categories() as $category): ?>
            <li><a href="<?= e(app_url('category/' . $category['slug'])) ?>"><i class="fas fa-chevron-right"></i> <?= e($category['name']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Ubufasha</h4>
        <ul>
          <li><a href="<?= e(app_url()) ?>"><i class="fas fa-chevron-right"></i> Ahabanza</a></li>
          <li><a href="<?= e(app_url('contact')) ?>"><i class="fas fa-chevron-right"></i> Twandikire</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Tuvugane</h4>
        <ul>
          <li><a href="#"><i class="fas fa-map-marker-alt"></i> KN 3 Ave, Kigali</a></li>
          <li><a href="#"><i class="fas fa-phone"></i> +250 788 123 456</a></li>
          <li><a href="#"><i class="fas fa-envelope"></i> info@mountainrwanda.rw</a></li>
          <li><a href="#"><i class="fas fa-globe"></i> www.mountainrwanda.rw</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="footer-bottom-links">
        <a href="#">Amapolisi</a>
        <a href="#">Ibisobanuro</a>
        <a href="#">Cookies</a>
        <a href="<?= e(app_url('contact')) ?>">Twandikire</a>
      </div>
      <p>&copy; <?= date('Y') ?> <?= e(get_setting('site_name', SITE_NAME)) ?>. Amakuru yose yigenga. All rights reserved.</p>
    </div>
  </div>
</footer>

<button class="back-to-top" id="backToTop" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
  <i class="fas fa-arrow-up"></i>
</button>

<script>
  window.addEventListener('scroll', function() {
    const backToTop = document.getElementById('backToTop');
    if (window.pageYOffset > 300) {
      backToTop.classList.add('visible');
    } else {
      backToTop.classList.remove('visible');
    }
  });

  document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebarNav');
    const hamburger = document.querySelector('.hamburger');
    if (sidebar && hamburger && !sidebar.contains(e.target) && !hamburger.contains(e.target)) {
      sidebar.classList.remove('active');
    }
  });

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      document.getElementById('searchOverlay').classList.remove('active');
      document.getElementById('sidebarNav').classList.remove('active');
    }
  });
</script>

</body>
</html>
