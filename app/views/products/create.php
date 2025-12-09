<section class="section">
    <h1>Cargar nueva remera</h1>
    <p class="section-subtitle">
        Esta vista sería solo para uso interno de la tienda (administración).
    </p>

    <div class="form-card">
        <form class="form-grid"
              action="<?= BASE_URL ?>/index.php?controller=product&action=store"
              method="post"
              enctype="multipart/form-data">

            <div class="form-field">
                <label for="name">Nombre de la remera</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-field">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" rows="4"></textarea>
            </div>

            <div class="form-field">
                <label for="price">Precio (ARS)</label>
                <input type="number" step="0.01" min="0" id="price" name="price" required>
            </div>

            <div class="form-field">
                <label for="category">Categoría</label>
                <select id="category" name="category">
                   <option value="rock">Rock / Metal</option>
                   <option value="goth">Gótico / Oscuro</option>
                   <option value="anime">Anime / Manga</option>
                   <option value="game">Videojuegos</option>
                   <option value="series">Series</option>
                   <option value="pelis">Películas</option>
                   <option value="kpop">K-Pop</option>
                   <option value="rock_nacional">Rock nacional</option>
                /select>

            </div>

            <div class="form-field">
                <label for="image">Imagen de la remera (PNG/JPG)</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Guardar</button>
                <a href="<?= BASE_URL ?>/index.php?controller=product&action=index"
                   class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</section>
