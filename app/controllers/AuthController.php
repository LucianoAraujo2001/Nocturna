<?php
require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller
{
    public function login()
    {
        // Si ya está logueado, lo mando directo al panel
        if (!empty($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
            header('Location: ' . BASE_URL . '/index.php?controller=product&action=admin');
            exit;
        }

        $this->render('auth/login');
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/index.php?controller=auth&action=login');
            exit;
        }

        $user = trim($_POST['user'] ?? '');
        $pass = trim($_POST['pass'] ?? '');

        if ($user === ADMIN_USER && $pass === ADMIN_PASS) {
            $_SESSION['is_admin'] = true;
            header('Location: ' . BASE_URL . '/index.php?controller=product&action=admin');
            exit;
        }

        // Credenciales incorrectas
        $this->render('auth/login', [
            'error' => 'Usuario o contraseña incorrectos.',
        ]);
    }

    public function logout()
    {
        // Cerrar sesión
        $_SESSION = [];
        if (session_id() !== '' || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        session_destroy();

        header('Location: ' . BASE_URL . '/index.php');
        exit;
    }
}
