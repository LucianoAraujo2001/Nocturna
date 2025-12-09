<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/ContactMessage.php';

class ContactController extends Controller
{
    public function index()
    {
        $this->render('contact/index');
    }

    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/index.php?controller=contact&action=index');
            exit;
        }

        $name    = trim($_POST['name'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if ($name === '' || $email === '' || $message === '') {
            die('Nombre, email y mensaje son obligatorios.');
        }

        ContactMessage::create([
            'name'    => $name,
            'email'   => $email,
            'subject' => $subject ?: 'Consulta desde la web',
            'message' => $message,
        ]);

        $this->render('contact/thanks', ['name' => $name]);
    }
}
?>