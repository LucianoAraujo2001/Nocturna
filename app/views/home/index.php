<section class="hero">
    <div class="hero-layout">
        <div class="hero-content">
            <h1>Oscuridad, gatos y distorsión.</h1>
            <p>
                Nocturna es tu tienda de remeras de rock pesado, estética gótica,
                videojuegos y anime. Diseños pensados para noches largas y playlists bien fuertes.
            </p>
            <div class="hero-actions">
                <a class="btn-primary" href="<?= BASE_URL ?>/index.php?controller=product&action=index">
                    Ver catálogo
                </a>
                <a class="btn-ghost" href="https://www.instagram.com/nocturnaclothingstore/?igsh=NnduZnY3MmE1bGFu"
                   target="_blank">
                    Ver en Instagram
                </a>
            </div>
        </div>

        <div class="hero-media">
            <video autoplay loop muted playsinline
                   class="hero-video">
                <source src="<?= BASE_URL ?>/public/media/portada.mp4" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>
    </div>
</section>


<section class="section">
    <h2>Destacados de la noche</h2>
    <div class="product-grid">
        <?php
            $categoryLabels = [
                'rock'          => 'Rock / Metal',
                'goth'          => 'Gótico',
                'anime'         => 'Anime',
                'game'          => 'Juegos',
                'series'        => 'Series',
                'pelis'         => 'Películas',
                'kpop'          => 'K-Pop',
                'rock_nacional' => 'Rock nacional',
            ];
        ?>

        <?php foreach ($featured as $product): ?>
            <article class="product-card">
                <img src="<?= BASE_URL . '/public/img/' . htmlspecialchars($product['image']); ?>"
                     alt="<?= htmlspecialchars($product['name']); ?>">
                <h3><?= htmlspecialchars($product['name']); ?></h3>
                <p class="product-category"><?= $categoryLabels[$product['category']] ?? ucfirst($product['category']); ?></p>

                <p class="product-price">$<?= number_format($product['price'], 2, ',', '.'); ?></p>
                <a class="btn-secondary"
                   href="<?= BASE_URL ?>/index.php?controller=product&action=show&id=<?= $product['id']; ?>">
                    Ver detalle
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
