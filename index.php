<?php
require_once __DIR__ . '/includes/functions.php';

$path = request_path();
$segments = $path === '' ? [] : explode('/', $path);

$route = $segments[0] ?? '';
$pageTitle = SITE_NAME;
$pageDescription = SITE_DESCRIPTION;
$activeNav = 'home';

if ($route === 'contact') {
    $pageTitle = 'Twandikire - ' . SITE_NAME;
    $activeNav = 'contact';
    require __DIR__ . '/templates/contact.php';
    exit;
}

if ($route === 'post' && !empty($segments[1])) {
    $post = get_post_by_slug($segments[1]);
    if (!$post) {
        http_response_code(404);
        require __DIR__ . '/templates/404.php';
        exit;
    }
    $pageTitle = $post['title'] . ' - ' . SITE_NAME;
    $pageDescription = $post['excerpt'] ?: $pageDescription;
    require __DIR__ . '/templates/post.php';
    exit;
}

if ($route === 'category' && !empty($segments[1])) {
    $category = get_category_by_slug($segments[1]);
    if (!$category) {
        http_response_code(404);
        require __DIR__ . '/templates/404.php';
        exit;
    }
    $pageTitle = $category['name'] . ' - ' . SITE_NAME;
    $activeNav = '';
    require __DIR__ . '/templates/category.php';
    exit;
}

if ($route === 'tag' && !empty($segments[1])) {
    $tag = $segments[1];
    $pageTitle = 'Tag: ' . $tag . ' - ' . SITE_NAME;
    require __DIR__ . '/templates/tag.php';
    exit;
}

if ($route !== '') {
    http_response_code(404);
    require __DIR__ . '/templates/404.php';
    exit;
}

require __DIR__ . '/templates/home.php';
