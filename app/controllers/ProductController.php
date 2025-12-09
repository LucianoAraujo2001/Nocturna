<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Product.php';

class ProductController extends Controller
{
    public function index()
    {
        $category = $_GET['category'] ?? null;
        $products = Product::byCategory($category);

        $this->render('products/index', [
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function show()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $product = Product::find($id);

        if (!$product) {
            die('Producto no encontrado.');
        }

        $this->render('products/show', ['product' => $product]);
    }

    /** Vista con el formulario para cargar nueva remera */
    public function create()
    {
        $this->requireAdmin();
        $this->render('products/create');
    }

    /** Procesa el formulario y guarda en BD */
    public function store()
    {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/index.php?controller=product&action=create');
            exit;
        }

        $name        = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $price       = (float) ($_POST['price'] ?? 0);
        $category    = $_POST['category'] ?? 'rock';

        // Validación muy básica
        if ($name === '' || $price <= 0) {
            die('Nombre y precio son obligatorios.');
        }

        // Manejo de imagen
        $imageName = 'default.png';

        if (!empty($_FILES['image']['name'])) {
            $uploadDir = __DIR__ . '/../../public/img/';
            $originalName = basename($_FILES['image']['name']);

            $safeName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $originalName);
            $targetPath = $uploadDir . $safeName;

            // Solo por seguridad, podrías chequear tipo MIME, etc.
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageName = $safeName;
            } else {
                die('Error al subir la imagen.');
            }
        }

        Product::create([
            'name'        => $name,
            'description' => $description,
            'price'       => $price,
            'category'    => $category,
            'image'       => $imageName,
        ]);

        header('Location: ' . BASE_URL . '/index.php?controller=product&action=admin');
        exit;
    }
    public function edit()
    {
        $this->requireAdmin();
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $product = Product::find($id);
    
        if (!$product) {
            die('Producto no encontrado.');
        }
    
        $this->render('products/edit', ['product' => $product]);
    }

    public function update()
    {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/index.php?controller=product&action=index');
            exit;
        }

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $product = Product::find($id);

        if (!$product) {
            die('Producto no encontrado.');
        }

        $name        = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $price       = (float) ($_POST['price'] ?? 0);
        $category    = $_POST['category'] ?? $product['category'];

        if ($name === '' || $price <= 0) {
            die('Nombre y precio son obligatorios.');
        }

        // por defecto, no cambiamos la imagen
        $imageName = null;

        if (!empty($_FILES['image']['name'])) {
            $uploadDir = __DIR__ . '/../../public/img/';
            $originalName = basename($_FILES['image']['name']);
            $safeName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $originalName);
            $targetPath = $uploadDir . $safeName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageName = $safeName;
            } else {
                die('Error al subir la nueva imagen.');
            }
        }

        Product::update($id, [
            'name'        => $name,
            'description' => $description,
            'price'       => $price,
            'category'    => $category,
            'image'       => $imageName, // null = dejar la anterior
        ]);

        header('Location: ' . BASE_URL . '/index.php?controller=product&action=admin');
        exit;
    }
    public function admin()
    {
        $this->requireAdmin();
        $products = Product::all();
    
        $this->render('products/admin', [
            'products' => $products,
        ]);
    }


}
?>