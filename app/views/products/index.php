<section class="section">
    <h1>Catálogo completo</h1>
    <p class="section-subtitle">
        Remeras de bandas, anime, juegos y vibes góticas para que armes tu outfit nocturno.
    </p>

    <?php
        $categories = [
            'all'           => 'Todas',
            'rock'          => 'Rock / Metal',
            'goth'          => 'Gótico',
            'anime'         => 'Anime',
            'game'          => 'Juegos',
            'series'        => 'Series',
            'pelis'         => 'Películas',
            'kpop'          => 'K-Pop',
            'rock_nacional' => 'Rock nacional',
        ];

        $current = $category ?? null;
    ?>


    <div class="category-filter">
        <?php foreach ($categories as $key => $label): ?>
            <?php
            $isActive = ($key === 'all' && !$current) || ($current === $key);
            $urlCategory = $key === 'all'
                ? ''
                : '&category=' . urlencode($key);
            ?>
            <a class="tag <?= $isActive ? 'tag-active' : '' ?>"
               href="<?= BASE_URL ?>/index.php?controller=product&action=index<?= $urlCategory; ?>">
                <?= htmlspecialchars($label); ?>
            </a>
        <?php endforeach; ?>
    </div>

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

        <?php foreach ($products as $product): ?>
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

