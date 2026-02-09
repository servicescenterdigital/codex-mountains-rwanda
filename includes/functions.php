<?php
require_once __DIR__ . '/config.php';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function slugify(string $text): string {
    $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    $text = trim($text, '-');
    return $text ?: 'item';
}

function generate_unique_slug(PDO $db, string $table, string $slug, ?int $ignoreId = null): string {
    $base = $slug;
    $suffix = 1;

    while (true) {
        $query = "SELECT id FROM {$table} WHERE slug = :slug";
        $params = [':slug' => $slug];
        if ($ignoreId !== null) {
            $query .= " AND id != :id";
            $params[':id'] = $ignoreId;
        }
        $stmt = $db->prepare($query);
        $stmt->execute($params);
        if (!$stmt->fetch()) {
            return $slug;
        }
        $slug = $base . '-' . $suffix;
        $suffix++;
    }
}

function get_setting(string $key, string $default = ''): string {
    $db = get_db();
    $stmt = $db->prepare('SELECT setting_value FROM settings WHERE setting_key = :key');
    $stmt->execute([':key' => $key]);
    $value = $stmt->fetchColumn();
    return $value !== false ? $value : $default;
}

function get_categories(): array {
    $db = get_db();
    $stmt = $db->query('SELECT * FROM categories ORDER BY name ASC');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_category_by_slug(string $slug): ?array {
    $db = get_db();
    $stmt = $db->prepare('SELECT * FROM categories WHERE slug = :slug');
    $stmt->execute([':slug' => $slug]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    return $category ?: null;
}

function get_posts(array $options = []): array {
    $db = get_db();
    $limit = $options['limit'] ?? 10;
    $where = "WHERE status = 'published'";
    $params = [];

    if (!empty($options['category_id'])) {
        $where .= ' AND category_id = :category_id';
        $params[':category_id'] = $options['category_id'];
    }

    $stmt = $db->prepare("SELECT posts.*, categories.name AS category_name, categories.color AS category_color
        FROM posts
        LEFT JOIN categories ON posts.category_id = categories.id
        {$where}
        ORDER BY published_at DESC
        LIMIT :limit");
    $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, PDO::PARAM_INT);
    }
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_post_by_slug(string $slug): ?array {
    $db = get_db();
    $stmt = $db->prepare("SELECT posts.*, categories.name AS category_name, categories.color AS category_color
        FROM posts
        LEFT JOIN categories ON posts.category_id = categories.id
        WHERE posts.slug = :slug AND posts.status = 'published'");
    $stmt->execute([':slug' => $slug]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
    return $post ?: null;
}

function get_posts_by_tag(string $slug): array {
    $db = get_db();
    $stmt = $db->prepare("SELECT posts.*, categories.name AS category_name, categories.color AS category_color
        FROM posts
        JOIN post_tags ON posts.id = post_tags.post_id
        JOIN tags ON tags.id = post_tags.tag_id
        LEFT JOIN categories ON posts.category_id = categories.id
        WHERE tags.slug = :slug AND posts.status = 'published'
        ORDER BY posts.published_at DESC");
    $stmt->execute([':slug' => $slug]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_tags(): array {
    $db = get_db();
    $stmt = $db->query('SELECT * FROM tags ORDER BY name ASC');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function is_logged_in(): bool {
    return !empty($_SESSION['user_id']);
}

function require_login(): void {
    if (!is_logged_in()) {
        header('Location: /admin/login.php');
        exit;
    }
}
