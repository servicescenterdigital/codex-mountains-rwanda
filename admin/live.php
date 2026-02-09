<?php
$pageTitle = 'Live Stream';
require __DIR__ . '/header.php';
?>

<div class="admin-card">
  <h1>YouTube Live</h1>
  <p>Manage live stream embed links and go-live toggle.</p>
  <div class="form-group">
    <label for="live_url">YouTube Live URL</label>
    <input type="text" id="live_url" name="live_url" value="https://www.youtube.com/embed/uOUvoS4uOkA">
  </div>
  <button class="button">Go Live</button>
</div>

<?php require __DIR__ . '/footer.php'; ?>
