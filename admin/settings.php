<?php
$pageTitle = 'Settings';
require __DIR__ . '/header.php';
?>

<div class="admin-card">
  <h1>Site Settings</h1>
  <div class="form-group">
    <label>Site Name</label>
    <input type="text" value="Mountain Rwanda">
  </div>
  <div class="form-group">
    <label>SEO Description</label>
    <textarea rows="3">Ikinyamakuru cy'ingenzi ku makuru y'u Rwanda.</textarea>
  </div>
  <div class="form-group">
    <label>Social Links</label>
    <input type="text" placeholder="Facebook URL">
    <input type="text" placeholder="Twitter URL">
  </div>
  <button class="button" type="button">Save Settings</button>
</div>

<?php require __DIR__ . '/footer.php'; ?>
