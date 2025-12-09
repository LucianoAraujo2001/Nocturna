<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nocturna Clothing Store</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-box">
        <img src="<?= BASE_URL ?>/public/img/logo.png" alt="Logo Nocturna">
        <div class="logo-text">
            <span class="brand-main">NOCTURNA</span>
            <span class="brand-sub">Clothing Store</span>
        </div>
    </div>

    <nav class="main-nav">
        <a href="<?= BASE_URL ?>/index.php">Inicio</a>
        <a href="<?= BASE_URL ?>/index.php?controller=product&action=index">Catálogo</a>
        <a href="<?= BASE_URL ?>/index.php?controller=curiosity&action=index">Notas nocturnas</a>
        <a href="<?= BASE_URL ?>/index.php?controller=contact&action=index">Contacto</a>
    </nav>

</header>

<main class="page-container">
