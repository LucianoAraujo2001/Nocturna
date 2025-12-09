<?php
class Controller
{
    protected function requireAdmin()
    {
        if (empty($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
            header('Location: ' . BASE_URL . '/index.php?controller=auth&action=login');
            exit;
        }
    }

    protected function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/' . $view . '.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }
}
?>
