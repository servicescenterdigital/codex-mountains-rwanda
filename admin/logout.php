<?php
require_once __DIR__ . '/../includes/functions.php';
session_destroy();
header('Location: ' . app_url('admin/login.php'));
exit;
