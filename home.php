<?php
// Obtenemos conexión
$db = getDB();

// Simulación de sesión/usuario
$isLogged = true ;//isset($_SESSION['user']) ? true : false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Sitio en Termux</title>
</head>
<body>
    <h1>¡Sistema Funcionando!</h1>
    <p>Estado de sesión: <strong><?= $isLogged ? 'Conectado' : 'Visitante' ?></strong></p>

    <hr>
    <h3>Prueba de MariaDB:</h3>
    <?php
    try {
        // Consulta simple de verificación
        $stmt = $db->query("SHOW TABLES");
        $tablas = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        echo "<p>Conexión exitosa a la Base de Datos. Tablas encontradas:</p><ul>";
        if (empty($tablas)) {
            echo "<li>No hay tablas creadas aún.</li>";
        } else {
            foreach ($tablas as $tabla) {
                echo "<li>" . htmlspecialchars($tabla) . "</li>";
            }
        }
        echo "</ul>";
    } catch (Exception $e) {
        echo "<p style='color:red;'>Error al consultar la BD: " . $e->getMessage() . "</p>";
    }
    ?>
</body>
</html>

