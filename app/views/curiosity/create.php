<section class="section">
    <h1>Cargar nota nocturna</h1>
    <p class="section-subtitle">
        Usá este formulario para agregar datos curiosos de bandas o reseñas de canciones/discos.
        (Vista interna, se accede solo por URL directa).
    </p>

    <div class="form-card">
        <form class="form-grid"
              action="<?= BASE_URL ?>/index.php?controller=curiosity&action=store"
              method="post"
              enctype="multipart/form-data"
              >

            <div class="form-field">
                <label for="title">Título de la nota</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-field">
                <label for="band">Banda / artista (opcional)</label>
                <input type="text" id="band" name="band">
            </div>

            <div class="form-field">
                <label for="type">Tipo</label>
                <select id="type" name="type">
                    <option value="curiosidad">Dato curioso</option>
                    <option value="reseña">Reseña</option>
                </select>
            </div>

            <div class="form-field">
                <label for="content">Contenido</label>
                <textarea id="content" name="content" rows="6" required></textarea>
            </div>
            
            <div class="form-field">
                <label for="image">Imagen de la nota (opcional)</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Guardar nota</button>
                <a href="<?= BASE_URL ?>/index.php?controller=curiosity&action=index"
                   class="btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</section>
