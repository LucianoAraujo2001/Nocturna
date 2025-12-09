<section class="section">
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

    <a class="back-link" href="<?= BASE_URL ?>/index.php?controller=product&action=index">
        ← Volver al catálogo
    </a>

    <div class="product-detail">
        <div class="product-detail-image">
            <img src="<?= BASE_URL . '/public/img/' . htmlspecialchars($product['image']); ?>"
                 alt="<?= htmlspecialchars($product['name']); ?>">
        </div>

        <div class="product-detail-info">
            <h1><?= htmlspecialchars($product['name']); ?></h1>
            <p class="product-category"><?= $categoryLabels[$product['category']] ?? ucfirst($product['category']); ?></p>

            <p class="product-price product-price-lg">
                $<?= number_format($product['price'], 2, ',', '.'); ?>
            </p>
            <p class="product-description">
                <?= nl2br(htmlspecialchars($product['description'])); ?>
            </p>

            <div class="product-buy">
                <p>¿Te gustó? Podés pedirla por Instagram:</p>
                <a class="btn-primary"
                   target="_blank"
                   href="https://www.instagram.com/nocturnaclothingstore/?igsh=NnduZnY3MmE1bGFu">
                    Pedir por DM
                </a>
            </div>
        </div>
    </div>
</section>
