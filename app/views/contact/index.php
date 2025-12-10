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

    <div class="form-card" style="margin-top: 1.5rem;">
        <p class="section-subtitle" style="margin-bottom: 1rem;">
            También podés escribirnos por nuestras redes:
        </p>
        <div class="form-actions" style="justify-content: flex-start;">
            <a class="btn-ghost btn-instagram"
               href="https://www.instagram.com/nocturnaclothingstore/"
               target="_blank"
               rel="noopener">
                Ir al Instagram de Nocturna
                <img src="<?= BASE_URL ?>/public/img/ig.png"
                     alt="Instagram"
                     class="btn-icon">
            </a>

            <a class="btn-primary btn-whatsapp"
               href="https://wa.me/543644152481"
               target="_blank"
               rel="noopener">
                Escribir por WhatsApp
                <img src="<?= BASE_URL ?>/public/img/wp.png"
                     alt="WhatsApp"
                     class="btn-icon">
            </a>
        </div>
    </div>
</section>
