<section class="section">
    <h1>Contacto</h1>
    <p class="section-subtitle">
        Escribinos si querés hacer un pedido especial, consulta mayorista o tenés alguna duda.
    </p>

    <div class="form-card">
        <form class="form-grid"
              action="<?= BASE_URL ?>/index.php?controller=contact&action=send"
              method="post">

            <div class="form-field">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-field">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-field">
                <label for="subject">Asunto</label>
                <input type="text" id="subject" name="subject">
            </div>

            <div class="form-field">
                <label for="message">Mensaje</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Enviar mensaje</button>
            </div>
        </form>
    </div>
</section>
