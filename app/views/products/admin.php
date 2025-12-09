<section class="section">
    <h1>Administrar remeras</h1>
    <p class="section-subtitle">
        Listado interno de productos. Desde acá podés editarlos o cargar nuevas remeras.
    </p>

    <div class="form-actions" style="justify-content: flex-start; margin-bottom: 1rem;">
        <a class="btn-primary"
           href="<?= BASE_URL ?>/index.php?controller=product&action=create">
            Cargar nueva remera
        </a>
        <a class="btn-ghost"
           href="<?= BASE_URL ?>/index.php?controller=product&action=index">
            Ver catálogo público
        </a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
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
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td>
                        <img src="<?= BASE_URL . '/public/img/' . htmlspecialchars($product['image']); ?>"
                             alt="<?= htmlspecialchars($product['name']); ?>"
                             style="width: 60px; border-radius: 0.4rem;">
                    </td>
                    <td><?= htmlspecialchars($product['name']); ?></td>
                    <td><?= htmlspecialchars($categoryLabels[$product['category']] ?? ucfirst($product['category'])); ?></td>

                    <td>$<?= number_format($product['price'], 2, ',', '.'); ?></td>
                    <td>
                        <a class="btn-secondary"
                           href="<?= BASE_URL ?>/index.php?controller=product&action=edit&id=<?= $product['id']; ?>">
                            Editar
                        </a>
                        <a class="btn-ghost"
                           href="<?= BASE_URL ?>/index.php?controller=product&action=show&id=<?= $product['id']; ?>">
                            Ver público
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
