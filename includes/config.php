<?php
session_start();

define('BASE_PATH', dirname(__DIR__));

define('APP_URL', rtrim(getenv('APP_URL') ?: '', '/'));

define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_NAME', getenv('DB_NAME') ?: 'mountain_rwanda');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_CHARSET', 'utf8mb4');

define('DEFAULT_CATEGORY_COLOR', '#ea580c');

define('SITE_NAME', getenv('SITE_NAME') ?: 'Mountain Rwanda');

define('SITE_DESCRIPTION', getenv('SITE_DESCRIPTION') ?: "Ikinyamakuru cy'ingenzi ku makuru y'u Rwanda: Politiki, Imikino, Ubucuruzi, Ikoranabuhanga, Imibereho n'ibindi byinshi.");

function get_db(): PDO {
    static $pdo = null;
    if ($pdo) {
        return $pdo;
    }

    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', DB_HOST, DB_NAME, DB_CHARSET);
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}
