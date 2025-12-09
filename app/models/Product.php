<?php
require_once __DIR__ . '/../config/config.php';

class Product
{
    public static function all()
    {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function byCategory($category = null)
    {
        $pdo = getConnection();

        $validCategories = [
            'rock',
            'goth',
            'anime',
            'game',
            'series',
            'pelis',
            'kpop',
            'rock_nacional',
        ];

        if ($category && in_array($category, $validCategories, true)) {
            $stmt = $pdo->prepare(
                "SELECT * FROM products WHERE category = :category ORDER BY id DESC"
            );
            $stmt->execute(['category' => $category]);
            return $stmt->fetchAll();
        }

        // si no hay categoría o es inválida, devolvemos todo
        return self::all();
    }

    public static function find($id)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public static function featured($limit = 4)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM products ORDER BY id DESC LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function create($data)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare(
            "INSERT INTO products (name, description, price, category, image)
             VALUES (:name, :description, :price, :category, :image)"
        );

        $stmt->execute([
            'name'        => $data['name'],
            'description' => $data['description'],
            'price'       => $data['price'],
            'category'    => $data['category'],
            'image'       => $data['image'],
        ]);

        return $pdo->lastInsertId();
    }
    public static function update($id, $data)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare(
            "UPDATE products
             SET name = :name,
                 description = :description,
                 price = :price,
                 category = :category,
                 image = COALESCE(:image, image)
             WHERE id = :id"
        );

        $stmt->execute([
            'id'          => $id,
            'name'        => $data['name'],
            'description' => $data['description'],
            'price'       => $data['price'],
            'category'    => $data['category'],
            // si viene null, COALESCE deja la imagen anterior
            'image'       => $data['image'],
        ]);
    }
    public static function delete($id)
    {
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
