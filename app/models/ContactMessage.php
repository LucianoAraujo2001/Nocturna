<?php
require_once __DIR__ . '/../config/config.php';

class ContactMessage
{
    public static function create($data)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare(
            "INSERT INTO contact_messages (name, email, subject, message)
             VALUES (:name, :email, :subject, :message)"
        );

        $stmt->execute([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);
    }
}
?>
