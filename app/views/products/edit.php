<section class="section">
    <h1>Editar remera</h1>
    <p class="section-subtitle">
        Modificá los datos del producto. Si no cargás una nueva imagen, se mantiene la actual.
    </p>

    <div class="form-card">
        <form class="form-grid"
              action="<?= BASE_URL ?>/index.php?controller=product&action=update&id=<?= $product['id']; ?>"
              method="post"
              enctype="multipart/form-data">

            <div class="form-field">
                <label for="name">Nombre de la remera</label>
                <input type="text" id="name" name="name"
                       value="<?= htmlspecialchars($product['name']); ?>" required>
            </div>

            <div class="form-field">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" rows="4"><?= htmlspecialchars($product['description']); ?></textarea>
            </div>

            <div class="form-field">
                <label for="price">Precio (ARS)</label>
                <input type="number" step="0.01" min="0" id="price" name="price"
                       value="<?= htmlspecialchars($product['price']); ?>" required>
            </div>

            <div class="form-field">
                <label for="category">Categoría</label>
                <select id="category" name="category">
                    <option value="rock"          <?= $product['category'] === 'rock' ? 'selected' : ''; ?>>Rock / Metal</option>
                    <option value="goth"          <?= $product['category'] === 'goth' ? 'selected' : ''; ?>>Gótico / Oscuro</option>
                    <option value="anime"         <?= $product['category'] === 'anime' ? 'selected' : ''; ?>>Anime / Manga</option>
                    <option value="game"          <?= $product['category'] === 'game' ? 'selected' : ''; ?>>Videojuegos</option>
                    <option value="series"        <?= $product['category'] === 'series' ? 'selected' : ''; ?>>Series</option>
                    <option value="pelis"         <?= $product['category'] === 'pelis' ? 'selected' : ''; ?>>Películas</option>
                    <option value="kpop"          <?= $product['category'] === 'kpop' ? 'selected' : ''; ?>>K-Pop</option>
                    <option value="rock_nacional" <?= $product['category'] === 'rock_nacional' ? 'selected' : ''; ?>>Rock nacional</option>
                </select>

            </div>

            <div class="form-field">
                <label>Imagen actual</label>
                <img src="<?= BASE_URL . '/public/img/' . htmlspecialchars($product['image']); ?>"
                     alt="<?= htmlspecialchars($product['name']); ?>"
                     style="max-width: 180px; border-radius: 0.6rem;">
            </div>

            <div class="form-field">
                <label for="image">Nueva imagen (opcional)</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Actualizar</button>
                <a href="<?= BASE_URL ?>/index.php?controller=product&action=show&id=<?= $product['id']; ?>"
                   class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</section>
