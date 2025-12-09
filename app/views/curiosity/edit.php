<section class="section">
    <h1>Editar nota nocturna</h1>
    <p class="section-subtitle">
        Modificá el contenido de la curiosidad o reseña. Si no cambiás la imagen, se mantiene la actual.
    </p>

    <div class="form-card">
        <form class="form-grid"
              action="<?= BASE_URL ?>/index.php?controller=curiosity&action=update&id=<?= $curiosity['id']; ?>"
              method="post"
              enctype="multipart/form-data">

            <div class="form-field">
                <label for="title">Título de la nota</label>
                <input type="text" id="title" name="title"
                       value="<?= htmlspecialchars($curiosity['title']); ?>" required>
            </div>

            <div class="form-field">
                <label for="band">Banda / artista (opcional)</label>
                <input type="text" id="band" name="band"
                       value="<?= htmlspecialchars($curiosity['band']); ?>">
            </div>

            <div class="form-field">
                <label for="type">Tipo</label>
                <select id="type" name="type">
                    <option value="curiosidad" <?= $curiosity['type'] === 'curiosidad' ? 'selected' : ''; ?>>
                        Dato curioso
                    </option>
                    <option value="reseña" <?= $curiosity['type'] === 'reseña' ? 'selected' : ''; ?>>
                        Reseña
                    </option>
                </select>
            </div>

            <?php if (!empty($curiosity['image'])): ?>
                <div class="form-field">
                    <label>Imagen actual</label>
                    <img src="<?= BASE_URL . '/public/img/notes/' . htmlspecialchars($curiosity['image']); ?>"
                         alt="<?= htmlspecialchars($curiosity['title']); ?>"
                         style="max-width: 220px; border-radius: 0.6rem;">
                </div>
            <?php endif; ?>

            <div class="form-field">
                <label for="image">Nueva imagen (opcional)</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-field">
                <label for="content">Contenido</label>
                <textarea id="content" name="content" rows="6" required><?= htmlspecialchars($curiosity['content']); ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Actualizar nota</button>
                <a href="<?= BASE_URL ?>/index.php?controller=curiosity&action=show&id=<?= $curiosity['id']; ?>"
                   class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</section>
