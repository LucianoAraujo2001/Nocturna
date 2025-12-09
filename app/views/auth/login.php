<section class="section">
    <h1>Acceso al panel nocturno</h1>
    <p class="section-subtitle">
        Ingresá con la contraseña del staff para administrar productos y notas nocturnas.
    </p>

    <div class="form-card">
        <?php if (!empty($error)): ?>
            <p style="color:#f97373; font-size:0.9rem; margin-bottom:0.75rem;">
                <?= htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

        <form class="form-grid"
              action="<?= BASE_URL ?>/index.php?controller=auth&action=authenticate"
              method="post">

            <div class="form-field">
                <label for="user">Usuario</label>
                <input type="text" id="user" name="user" required>
            </div>

            <div class="form-field">
                <label for="pass">Contraseña</label>
                <input type="password" id="pass" name="pass" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
</section>
