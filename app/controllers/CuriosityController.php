<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Curiosity.php';

class CuriosityController extends Controller
{
    public function index()
    {
        $curiosities = Curiosity::all();
        $this->render('curiosity/index', ['curiosities' => $curiosities]);
    }

    public function show()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $curiosity = Curiosity::find($id);

        if (!$curiosity) {
            die('Nota no encontrada.');
        }

        $this->render('curiosity/show', ['curiosity' => $curiosity]);
    }

    /** Vista para cargar curiosidades/reseñas (solo por URL) */
    public function create()
    {
        $this->render('curiosity/create');
    }

    /** Procesa el formulario */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/index.php?controller=curiosity&action=create');
            exit;
        }

        $title   = trim($_POST['title'] ?? '');
        $band    = trim($_POST['band'] ?? '');
        $type    = $_POST['type'] ?? 'curiosidad';
        $content = trim($_POST['content'] ?? '');

        if ($title === '' || $content === '') {
            die('El título y el contenido son obligatorios.');
        }

        $id = Curiosity::create([
            'title'   => $title,
            'band'    => $band,
            'type'    => $type,
            'content' => $content,
        ]);

        header('Location: ' . BASE_URL . '/index.php?controller=curiosity&action=show&id=' . $id);
        exit;
    }
    public function edit()
{
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $curiosity = Curiosity::find($id);

    if (!$curiosity) {
        die('Nota no encontrada.');
    }

    $this->render('curiosity/edit', ['curiosity' => $curiosity]);
}

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/index.php?controller=curiosity&action=index');
            exit;
        }

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $curiosity = Curiosity::find($id);

        if (!$curiosity) {
            die('Nota no encontrada.');
        }

        $title   = trim($_POST['title'] ?? '');
        $band    = trim($_POST['band'] ?? '');
        $type    = $_POST['type'] ?? $curiosity['type'];
        $content = trim($_POST['content'] ?? '');

        if ($title === '' || $content === '') {
            die('El título y el contenido son obligatorios.');
        }

        $imageName = null;

        if (!empty($_FILES['image']['name'])) {
            $uploadDir = __DIR__ . '/../../public/img/notes/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0775, true);
            }

            $originalName = basename($_FILES['image']['name']);
            $safeName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $originalName);
            $targetPath = $uploadDir . $safeName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageName = $safeName;
            } else {
                die('Error al subir la nueva imagen de la nota.');
            }
        }

        Curiosity::update($id, [
            'title'   => $title,
            'band'    => $band,
            'type'    => $type,
            'image'   => $imageName,
            'content' => $content,
        ]);

        header('Location: ' . BASE_URL . '/index.php?controller=curiosity&action=show&id=' . $id);
        exit;
    }
    public function admin()
    {
        $curiosities = Curiosity::all();
    
        $this->render('curiosity/admin', [
            'curiosities' => $curiosities,
        ]);
    }


}
?>