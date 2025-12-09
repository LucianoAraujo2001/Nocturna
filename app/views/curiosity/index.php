<section class="section">
    <h1>Notas nocturnas</h1>
    <p class="section-subtitle">
        Datos curiosos de bandas, reseñas de canciones y discos para acompañar tus remeras.
    </p>

    <?php if (empty($curiosities)): ?>
        <p class="section-subtitle">Todavía no hay notas cargadas.</p>
    <?php else: ?>
        <div class="note-grid">
            <?php foreach ($curiosities as $note): ?>
                <article class="note-card">
                    <?php if (!empty($note['image'])): ?>
                        <div class="note-thumb">
                            <img src="<?= BASE_URL . '/public/img/notes/' . htmlspecialchars($note['image']); ?>"
                                 alt="<?= htmlspecialchars($note['title']); ?>">
                        </div>
                    <?php endif; ?>
                    
                    <span class="note-type">
                        <?= $note['type'] === 'reseña' ? 'Reseña' : 'Curiosidad'; ?>
                    </span>
                    
                    <h2>
                        <a href="<?= BASE_URL ?>/index.php?controller=curiosity&action=show&id=<?= $note['id']; ?>">
                            <?= htmlspecialchars($note['title']); ?>
                        </a>
                    </h2>
                    
                    <?php if (!empty($note['band'])): ?>
                        <p class="note-band">
                            Banda / artista: <?= htmlspecialchars($note['band']); ?>
                        </p>
                    <?php endif; ?>
                    
                    <p class="note-excerpt">
                        <?= htmlspecialchars(mb_substr($note['content'], 0, 160)); ?>...
                    </p>
                    
                    <a class="btn-secondary"
                       href="<?= BASE_URL ?>/index.php?controller=curiosity&action=show&id=<?= $note['id']; ?>">
                        Leer nota completa
                    </a>
                </article>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
