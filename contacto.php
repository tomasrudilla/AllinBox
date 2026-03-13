<?php include 'header.php'; ?>

<style>
    /* --- Estilos de Contacto eCommerce --- */
    .contact-wrapper {
        max-width: 1200px; margin: 0 auto; padding: 60px 5%;
        min-height: calc(100vh - 75px);
    }

    .contact-header { text-align: center; margin-bottom: 60px; }
    .contact-header h1 { font-size: 3rem; font-weight: 900; letter-spacing: -1.5px; margin-bottom: 15px; }
    .contact-header p { font-size: 1.1rem; color: var(--text-muted); max-width: 600px; margin: 0 auto; }

    .contact-grid {
        display: grid; grid-template-columns: 1fr 1.2fr; gap: 60px;
    }

    /* --- Info Cards --- */
    .info-container { display: flex; flex-direction: column; gap: 20px; }
    
    .info-card {
        background: var(--bg-surface); border: 1px solid var(--border-color);
        padding: 30px; border-radius: var(--radius-lg);
        display: flex; gap: 20px; align-items: flex-start; transition: 0.3s;
    }
    .info-card:hover { background: var(--bg-card); box-shadow: var(--shadow-md); transform: translateX(10px); }
    
    .info-icon {
        width: 50px; height: 50px; border-radius: 12px;
        background: var(--primary); color: white;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem; flex-shrink: 0;
    }
    
    .info-text h4 { font-size: 18px; font-weight: 800; margin-bottom: 5px; }
    .info-text p { color: var(--text-muted); font-size: 14px; margin-bottom: 10px; }
    .info-text a { font-weight: 700; color: var(--text-dark); text-decoration: none; transition: 0.2s; }
    .info-text a:hover { color: var(--primary); }

    /* --- Formulario --- */
    .contact-form {
        background: var(--bg-card); padding: 40px;
        border-radius: var(--radius-lg); border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }

    .form-group { margin-bottom: 25px; }
    .form-group label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: var(--text-dark); }
    .form-group input, .form-group textarea, .form-group select {
        width: 100%; padding: 16px; border-radius: 12px;
        border: 1px solid var(--border-color); background: var(--bg-surface);
        font-family: inherit; font-size: 15px; transition: 0.3s; outline: none;
    }
    .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
        border-color: var(--primary); background: #fff;
        box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.1);
    }

    .btn-submit {
        width: 100%; background: var(--text-dark); color: white;
        border: none; padding: 18px; border-radius: 50px;
        font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s;
        display: flex; justify-content: center; align-items: center; gap: 10px;
    }
    .btn-submit:hover { background: var(--primary); box-shadow: var(--shadow-md); transform: translateY(-3px); }

    /* Mensaje de Éxito PHP */
    .success-alert {
        background: #dcfce7; color: #166534; padding: 20px;
        border-radius: 12px; margin-bottom: 30px; font-weight: 600;
        display: flex; align-items: center; gap: 15px; border: 1px solid #bbf7d0;
    }

    @media (max-width: 992px) {
        .contact-grid { grid-template-columns: 1fr; gap: 40px; }
        .info-card:hover { transform: translateY(-5px); }
    }
</style>

<div class="contact-wrapper">
    <div class="contact-header reveal">
        <h1>Centro de Soporte</h1>
        <p>¿Tenés alguna duda sobre un producto, garantía o envío? Nuestro equipo de ventas está listo para asesorarte.</p>
    </div>

    <div class="contact-grid">
        <div class="info-container">
            <div class="info-card reveal">
                <div class="info-icon"><i class="fab fa-whatsapp"></i></div>
                <div class="info-text">
                    <h4>Atención por WhatsApp</h4>
                    <p>Respondemos al instante en horario comercial (Lun a Vie 10 a 19hs).</p>
                    <a href="#">+54 9 11 1234-5678 <i class="fas fa-arrow-right" style="font-size: 12px; margin-left:5px;"></i></a>
                </div>
            </div>

            <div class="info-card reveal">
                <div class="info-icon"><i class="fas fa-envelope"></i></div>
                <div class="info-text">
                    <h4>Correo Electrónico</h4>
                    <p>Para presupuestos mayoristas o consultas de garantías y servicio técnico.</p>
                    <a href="mailto:ventas@allinbox.com">ventas@allinbox.com</a>
                </div>
            </div>

            <div class="info-card reveal">
                <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="info-text">
                    <h4>Oficinas (Pick-up)</h4>
                    <p>Retirá tus compras en nuestra oficina con previa coordinación.</p>
                    <span style="font-weight: 700;">Palermo, Buenos Aires, ARG</span>
                </div>
            </div>
        </div>

        <div class="contact-form reveal">
            <?php
            // Lógica simple de PHP para simular el envío
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = htmlspecialchars($_POST['nombre']);
                echo "
                <div class='success-alert'>
                    <i class='fas fa-check-circle' style='font-size: 24px;'></i>
                    <div>
                        <strong>¡Mensaje enviado correctamente!</strong><br>
                        Gracias $nombre, un asesor se comunicará con vos a la brevedad.
                    </div>
                </div>";
            }
            ?>

            <form action="contacto.php" method="POST" id="contactForm">
                <div class="form-group">
                    <label for="nombre">Nombre y Apellido</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" required>
                </div>

                <div class="form-group">
                    <label for="motivo">Motivo de la consulta</label>
                    <select id="motivo" name="motivo" required>
                        <option value="" disabled selected>Seleccioná una opción...</option>
                        <option value="ventas">Consulta de Stock / Ventas</option>
                        <option value="envios">Estado de mi envío</option>
                        <option value="garantia">Servicio Técnico / Garantía</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mensaje">Tu Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="4" placeholder="Dejanos el modelo exacto por el que consultás..." required></textarea>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    Enviar Consulta <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Pequeño script para dar feedback al usuario al enviar
    document.getElementById('contactForm').addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');
        btn.innerHTML = 'Enviando... <i class="fas fa-circle-notch fa-spin"></i>';
        btn.style.opacity = '0.7';
        btn.style.pointerEvents = 'none';
    });
</script>

<?php include 'footer.php'; ?>