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

   
        $finalSubject = $subject !== '' ? $subject : 'Consulta desde la web';

        ContactMessage::create([
            'name'    => $name,
            'email'   => $email,
            'subject' => $finalSubject,
            'message' => $message,
        ]);

        $to      = 'formulariopagina@nocturnaclothing.store';
        $mailSub = 'Nuevo mensaje desde Nocturna: ' . $finalSubject;

        $body  = "Te escribió desde la web Nocturna:\n\n";
        $body .= "Nombre: {$name}\n";
        $body .= "Email: {$email}\n";
        $body .= "Asunto: {$finalSubject}\n\n";
        $body .= "Mensaje:\n{$message}\n";

        $headers  = "From: Nocturna Web <contacto@nocturnaclothing.store>\r\n";
        $headers .= "Reply-To: {$name} <{$email}>\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

  
        @mail($to, $mailSub, $body, $headers);

  
        $this->render('contact/thanks', ['name' => $name]);
    }

}
?>