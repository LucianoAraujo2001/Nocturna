<section class="section">
    <a class="back-link" href="<?= BASE_URL ?>/index.php?controller=curiosity&action=index">
        ← Volver a notas nocturnas
    </a>

    <article class="note-detail">
        <span class="note-type">
            <?= $curiosity['type'] === 'reseña' ? 'Reseña' : 'Curiosidad'; ?>
        </span>
        <?php if (!empty($curiosity['image'])): ?>
            <div class="note-cover">
                <img src="<?= BASE_URL . '/public/img/notes/' . htmlspecialchars($curiosity['image']); ?>"
                     alt="<?= htmlspecialchars($curiosity['title']); ?>">
            </div>
        <?php endif; ?>


        <h1><?= htmlspecialchars($curiosity['title']); ?></h1>

        <?php if (!empty($curiosity['band'])): ?>
            <p class="note-band">
                Banda / artista: <?= htmlspecialchars($curiosity['band']); ?>
            </p>
        <?php endif; ?>

        <p class="note-meta">
            Publicado el <?= date('d/m/Y', strtotime($curiosity['created_at'])); ?>
        </p>

        <div class="note-content">
            <?= nl2br(htmlspecialchars($curiosity['content'])); ?>
        </div>
    </article>
</section>
