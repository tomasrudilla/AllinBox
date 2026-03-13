<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All In Box | Tecnología Premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            /* Paleta Tecnológica Moderna */
            --bg-body: #ffffff;
            --bg-surface: #f8f9fa;
            --bg-card: #ffffff;
            --primary: #0f62fe; /* Azul tecnológico moderno */
            --primary-hover: #0353e9;
            --accent: #fa4d56;  /* Rojo vibrante para alertas/carrito */
            --text-dark: #111827;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.03);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.06);
            --radius-pill: 50px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-dark);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* --- Top Announcement Bar --- */
        .top-bar {
            background-color: var(--text-dark);
            color: white;
            text-align: center;
            padding: 8px 15px;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            z-index: 1001;
            position: relative;
        }
        .top-bar span { color: #9ca3af; margin: 0 10px; }

        /* --- Header / Navbar Premium --- */
        .navbar {
            position: sticky;
            top: 0; 
            width: 100%; 
            height: 85px; 
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            padding: 0 5%;
            z-index: 1000;
            border-bottom: 1px solid transparent;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Clase que se agrega con JS al scrollear */
        .navbar.scrolled {
            height: 70px;
            background: rgba(255, 255, 255, 0.98);
            border-bottom: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        /* --- Brand / Logo --- */
        .nav-brand-container {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        
        .nav-logo {
            height: 40px; /* Ajustá esto según el tamaño de tu imagen */
            width: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .nav-brand-text {
            font-size: 1.4rem; 
            font-weight: 900;
            color: var(--text-dark); 
            letter-spacing: -0.5px;
            line-height: 1;
        }
        .nav-brand-text span { color: var(--primary); }

        .nav-brand-container:hover .nav-logo {
            transform: rotate(-5deg) scale(1.05);
        }

        /* --- Navegación (Desktop) --- */
        .nav-menu { 
            display: flex; 
            gap: 10px; 
            align-items: center;
            background: var(--bg-surface);
            padding: 5px;
            border-radius: var(--radius-pill);
            border: 1px solid var(--border-color);
        }
        
        .nav-menu a {
            text-decoration: none; 
            color: var(--text-dark);
            font-weight: 600; 
            font-size: 0.9rem;
            padding: 10px 24px;
            border-radius: var(--radius-pill);
            transition: all 0.2s ease;
        }
        
        .nav-menu a:hover, .nav-menu a.active { 
            background-color: white; 
            color: var(--primary);
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        /* --- Controles (Iconos Redondeados Premium) --- */
        .nav-controls { 
            display: flex; 
            gap: 15px; 
            align-items: center; 
        }
        
        .icon-btn {
            background: var(--bg-surface); 
            border: 1px solid var(--border-color); 
            font-size: 1.1rem;
            color: var(--text-dark); 
            cursor: pointer; 
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            text-decoration: none;
        }
        
        .icon-btn:hover { 
            color: var(--primary); 
            background: white; 
            border-color: white;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }
        
        /* Badge del Carrito */
        .cart-badge {
            position: absolute; 
            top: -2px; 
            right: -2px;
            background: var(--accent);
            color: white;
            font-size: 0.7rem; 
            font-weight: 800;
            min-width: 20px; 
            height: 20px; 
            padding: 0 5px;
            border-radius: 20px;
            display: flex; 
            align-items: center; 
            justify-content: center;
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(250, 77, 86, 0.4);
        }

        /* Separador visual sutil */
        .nav-divider {
            width: 1px;
            height: 24px;
            background-color: var(--border-color);
            margin: 0 5px;
        }

        /* Botón Menú Móvil (Oculto en PC) */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--text-dark);
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .nav-menu { display: none; } /* Oculta el menú central en móviles */
            .nav-brand-text { display: none; } /* Deja solo el logo para ahorrar espacio */
            .navbar { padding: 0 20px; }
            .mobile-toggle { display: block; }
            .icon-btn { width: 42px; height: 42px; font-size: 1rem; }
            .nav-divider { display: none; }
        }
    </style>
</head>
<body>

<header class="navbar" id="main-nav">
    
    <a href="index.php" class="nav-brand-container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="All In Box Logo" class="nav-logo">
        <div class="nav-brand-text">All In <span>Box</span></div>
    </a>
    
    <nav class="nav-menu">
        <a href="index.php" class="active">Inicio</a>
        <a href="productos.php">Catálogo</a>
        <a href="contacto.php">Contacto</a>
    </nav>
    
    <div class="nav-controls">
        <button class="icon-btn" aria-label="Buscar">
            <i class="fas fa-search"></i>
        </button>
        
        <div class="nav-divider"></div>
        
        <a href="admin/login.php" class="icon-btn" aria-label="Usuario">
            <i class="far fa-user"></i>
        </a>
        
        <a href="carrito.php" class="icon-btn" aria-label="Carrito">
            <i class="fas fa-shopping-bag"></i>
            <span class="cart-badge">2</span>
        </a>

        <button class="mobile-toggle" aria-label="Abrir menú">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</header>

<script>
    // Efecto de reducción y sombra del navbar al hacer scroll
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('main-nav');
        // Si el usuario scrollea más de 20px, aplica el estilo comprimido
        if (window.scrollY > 20) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
</script>
</body>
</html>