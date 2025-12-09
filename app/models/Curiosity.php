<?php
require_once __DIR__ . '/../config/config.php';

class Curiosity
{
    public static function all()
    {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM curiosities ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public static function find($id)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM curiosities WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public static function create($data)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare(
            "INSERT INTO curiosities (title, band, type, image, content)
             VALUES (:title, :band, :type, :image, :content)"
        );

        $stmt->execute([
            'title'   => $data['title'],
            'band'    => $data['band'],
            'type'    => $data['type'],
            'image'   => $data['image'],
            'content' => $data['content'],
        ]);

        return $pdo->lastInsertId();
    }
    public static function update($id, $data)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare(
            "UPDATE curiosities
             SET title = :title,
                 band = :band,
                 type = :type,
                 image = COALESCE(:image, image),
                 content = :content
             WHERE id = :id"
        );

        $stmt->execute([
            'id'      => $id,
            'title'   => $data['title'],
            'band'    => $data['band'],
            'type'    => $data['type'],
            'image'   => $data['image'], 
            'content' => $data['content'],
        ]);
    }
    public static function delete($id)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM curiosities WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

}
?>