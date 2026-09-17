<?php
if (session_status() == PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/db.php';

// Captura la URL recibida
$url = !empty($_GET['url']) ? $_GET['url'] : 'home';
$arrUrl = explode('/', rtrim($url, '/'));

$page = strtolower($arrUrl[0]);

// Control simple de vistas
switch ($page) {
    case '':
    case 'home':
        require_once __DIR__ . '/home.php';
        break;

    case 'dash':
        echo "<h1>Panel de Control (Dashboard)</h1><a href='home'>Volver</a>";
        break;

    default:
        http_response_code(404);
        echo "<h1>Página 404 - No Encontrada</h1><a href='home'>Ir al inicio</a>";
        break;
}
