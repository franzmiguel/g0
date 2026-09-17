<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Si es un archivo físico (CSS, JS, imágenes), sírvelo directo
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Envía la ruta a index.php
$_GET['url'] = ltrim($uri, '/');
require_once __DIR__ . '/index.php';
