<?php
function getDB() {
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db   = "mi_base_datos"; // <-- Cambia por el nombre de tu base de datos

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión a la BD: " . $e->getMessage());
    }
}

