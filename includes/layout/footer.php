</div>

<footer>
  <div class="container-fluid">
    <div class="footer-grid">
      <div class="footer-col footer-about">
        <h4>Mountain Rwanda</h4>
        <p>Mountain Rwanda ni ikinyamakuru cy'ingenzi ku makuru y'u Rwanda. Tugezaho amakuru y'ukuri, yihuse kandi yizewe mu byerekeye Politiki, Imikino, Ubucuruzi, Ikoranabuhanga, Imibereho n'ibindi.</p>
      </div>
      <div class="footer-col">
        <h4>Ibyiciro</h4>
        <ul>
          <?php foreach (get_categories() as $category): ?>
            <li><a href="/category/<?= e($category['slug']) ?>"><i class="fas fa-chevron-right"></i> <?= e($category['name']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Ubufasha</h4>
        <ul>
          <li><a href="/"><i class="fas fa-chevron-right"></i> Ahabanza</a></li>
          <li><a href="/contact"><i class="fas fa-chevron-right"></i> Twandikire</a></li>
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
        <a href="/contact">Twandikire</a>
      </div>
      <p>&copy; <?= date('Y') ?> Mountain Rwanda. Amakuru yose yigenga. All rights reserved.</p>
    </div>
  </div>
</footer>

<button class="back-to-top" id="backToTop" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" style="position: fixed; bottom: 2rem; right: 2rem; width:45px; height:45px; background: var(--accent); color: white; border: none; border-radius: 50%; cursor: pointer; display: none; align-items: center; justify-content: center; font-size: 1.2rem; box-shadow: 0 4px 15px rgba(234,88,12,0.4); z-index: 999;">
  <i class="fas fa-arrow-up"></i>
</button>

<script>
  window.addEventListener('scroll', function() {
    const backToTop = document.getElementById('backToTop');
    if (window.pageYOffset > 300) {
      backToTop.style.display = 'flex';
    } else {
      backToTop.style.display = 'none';
    }
  });

  document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebarNav');
    const hamburger = document.querySelector('.hamburger');
    if (sidebar && hamburger && !sidebar.contains(e.target) && !hamburger.contains(e.target)) {
      sidebar.style.left = '-320px';
    }
  });

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      const overlay = document.getElementById('searchOverlay');
      if (overlay) {
        overlay.style.display = 'none';
      }
      const sidebar = document.getElementById('sidebarNav');
      if (sidebar) {
        sidebar.style.left = '-320px';
      }
    }
  });

  const sidebarNav = document.getElementById('sidebarNav');
  if (sidebarNav) {
    const originalToggle = document.querySelector('.hamburger');
    if (originalToggle) {
      originalToggle.addEventListener('click', () => {
        sidebarNav.style.left = '0';
      });
    }
  }

  const searchOverlay = document.getElementById('searchOverlay');
  const searchTrigger = document.querySelector('.search-trigger');
  if (searchTrigger && searchOverlay) {
    searchTrigger.addEventListener('click', () => {
      searchOverlay.style.display = 'flex';
    });
  }
</script>
</body>
</html>
