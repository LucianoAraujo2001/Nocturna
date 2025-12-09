<?php
require_once __DIR__ . '/app/config/config.php';

$controllerName = isset($_GET['controller'])
    ? ucfirst(strtolower($_GET['controller'])) . 'Controller'
    : 'HomeController';

$action = $_GET['action'] ?? 'index';

$controllerFile = __DIR__ . '/app/controllers/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
    die('Controlador no encontrado.');
}

require_once __DIR__ . '/app/core/Controller.php';
require_once $controllerFile;

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    die('Acción no encontrada.');
}

$controller->$action();
?>
