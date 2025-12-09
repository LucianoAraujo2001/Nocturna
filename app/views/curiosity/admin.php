<section class="section">
    <h1>Administrar notas nocturnas</h1>
    <p class="section-subtitle">
        Listado interno de curiosidades y reseñas. Desde acá podés editarlas o crear nuevas.
    </p>

    <div class="form-actions" style="justify-content: flex-start; margin-bottom: 1rem;">
        <a class="btn-primary"
           href="<?= BASE_URL ?>/index.php?controller=curiosity&action=create">
            Cargar nueva nota
        </a>
        <a class="btn-ghost"
           href="<?= BASE_URL ?>/index.php?controller=curiosity&action=index">
            Ver notas públicas
        </a>
    </div>

    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Título</th>
                <th>Banda / artista</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($curiosities as $note): ?>
                <tr>
                    <td><?= $note['id']; ?></td>
                    <td>
                        <?php if (!empty($note['image'])): ?>
                            <img src="<?= BASE_URL . '/public/img/notes/' . htmlspecialchars($note['image']); ?>"
                                 alt="<?= htmlspecialchars($note['title']); ?>"
                                 style="width: 60px; border-radius: 0.4rem;">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($note['title']); ?></td>
                    <td><?= htmlspecialchars($note['band']); ?></td>
                    <td><?= $note['type'] === 'reseña' ? 'Reseña' : 'Curiosidad'; ?></td>
                    <td><?= date('d/m/Y', strtotime($note['created_at'])); ?></td>
                    <td>
                        <a class="btn-secondary"
                           href="<?= BASE_URL ?>/index.php?controller=curiosity&action=edit&id=<?= $note['id']; ?>">
                            Editar
                        </a>
                        <a class="btn-ghost"
                           href="<?= BASE_URL ?>/index.php?controller=curiosity&action=show&id=<?= $note['id']; ?>">
                            Ver pública
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
