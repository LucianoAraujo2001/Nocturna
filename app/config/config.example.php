<?php
define('BASE_URL', 'https://tu-dominio-o-localhost');
define('DB_HOST', 'localhost');
define('DB_NAME', 'nombre_base');
define('DB_USER', 'usuario_base');
define('DB_PASS', 'password_aqui');



// Conexión PDO a la base de datos
function getConnection()
{
    static $pdo = null;

    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    return $pdo;
}
?>