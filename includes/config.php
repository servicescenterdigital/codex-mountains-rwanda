<?php
session_start();

define('BASE_PATH', dirname(__DIR__));
define('DB_PATH', BASE_PATH . '/database/app.db');

define('BASE_URL', '/');

define('DEFAULT_CATEGORY_COLOR', '#ea580c');

function get_db(): PDO {
    static $pdo = null;
    if ($pdo) {
        return $pdo;
    }

    $needsSchema = !file_exists(DB_PATH);
    $pdo = new PDO('sqlite:' . DB_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($needsSchema) {
        $schemaPath = BASE_PATH . '/database/schema.sql';
        if (file_exists($schemaPath)) {
            $schema = file_get_contents($schemaPath);
            $pdo->exec($schema);
        }
    }

    return $pdo;
}
