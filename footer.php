<style>
        /* --- Footer Styles --- */
        .site-footer {
            background-color: var(--bg-surface);
            padding: 80px 5% 40px;
            border-top: 1px solid var(--border-color);
            margin-top: 80px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-brand h3 { font-size: 24px; font-weight: 900; margin-bottom: 15px; }
        .footer-brand p { color: var(--text-muted); font-size: 14px; max-width: 300px; margin-bottom: 25px; }
        
        .social-links { display: flex; gap: 15px; }
        .social-links a {
            width: 40px; height: 40px; border-radius: 50%;
            background: white; border: 1px solid var(--border-color);
            display: flex; justify-content: center; align-items: center;
            color: var(--text-dark); transition: all 0.3s; text-decoration: none;
        }
        .social-links a:hover {
            background: var(--primary); color: white; border-color: var(--primary);
            transform: translateY(-3px);
        }

        .footer-col h4 { font-size: 16px; font-weight: 700; margin-bottom: 20px; }
        .footer-col ul { list-style: none; }
        .footer-col li { margin-bottom: 12px; }
        .footer-col a { color: var(--text-muted); text-decoration: none; font-size: 14px; transition: 0.2s; }
        .footer-col a:hover { color: var(--primary); }

        .footer-bottom {
            max-width: 1400px; margin: 60px auto 0;
            padding-top: 30px; border-top: 1px solid var(--border-color);
            display: flex; justify-content: space-between; align-items: center;
            font-size: 13px; color: var(--text-muted);
        }

        @media (max-width: 992px) {
            .footer-container { grid-template-columns: 1fr 1fr; }
            .footer-brand { grid-column: span 2; }
        }
        @media (max-width: 768px) {
            .footer-container { grid-template-columns: 1fr; }
            .footer-brand { grid-column: span 1; }
            .footer-bottom { flex-direction: column; gap: 15px; text-align: center; }
        }
    </style>

    <footer class="site-footer">
        <div class="footer-container reveal">
            <div class="footer-brand">
                <h3>All In <span>Box</span></h3>
                <p>Especialistas en importación de tecnología premium. Stock inmediato, garantía oficial y envíos a todo el país.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Categorías</h4>
                <ul>
                    <li><a href="#">iPhone</a></li>
                    <li><a href="#">MacBook & iPad</a></li>
                    <li><a href="#">Watch & Audio</a></li>
                    <li><a href="#">Accesorios</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Atención al Cliente</h4>
                <ul>
                    <li><a href="#">Seguimiento de envíos</a></li>
                    <li><a href="#">Políticas de garantía</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contacto</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt" style="width: 20px;"></i> Buenos Aires, ARG</li>
                    <li><i class="fas fa-envelope" style="width: 20px;"></i> ventas@allinbox.com</li>
                    <li><i class="fab fa-whatsapp" style="width: 20px;"></i> +54 9 11 1234-5678</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 All In Box Store. Todos los derechos reservados.</p>
            <div style="display: flex; gap: 15px; font-size: 20px;">
                <i class="fab fa-cc-visa"></i>
                <i class="fab fa-cc-mastercard"></i>
                <i class="fab fa-cc-paypal"></i>
            </div>
        </div>
    </footer>

    <script>
        // 1. Efecto Scroll en Navbar
        const navbar = document.getElementById('main-nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // 2. Animación de Aparición (Scroll Reveal)
        const observerOptions = { threshold: 0.1, rootMargin: "0px 0px -50px 0px" };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); // Solo anima una vez
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => {
            el.classList.add('hidden-reveal'); // Añade clase inicial por JS
            observer.observe(el);
        });
    </script>

    <style>
        /* Clases para el script de animaciones */
        .hidden-reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1); }
        .hidden-reveal.visible { opacity: 1; transform: translateY(0); }
    </style>

</body>
</html>