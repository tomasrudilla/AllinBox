<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All In Box | Home</title>
    <style>
        /* CSS INTEGRADO */
        :root {
            --bg-black: #050505;
            --card-bg: #121212;
            --primary: #00a8ff;
            --accent: #ff7f00;
            --text-gray: #a0a0a0;
        }
        body {
            margin: 0; font-family: 'Inter', sans-serif;
            background-color: var(--bg-black); color: white;
        }
        header {
            display: flex; justify-content: space-between; align-items: center;
            padding: 20px 5%; background: rgba(0,0,0,0.9);
            border-bottom: 1px solid #333; sticky: top;
        }
        .logo { font-weight: bold; font-size: 24px; color: var(--primary); }
        nav a {
            color: white; text-decoration: none; margin-left: 20px;
            transition: 0.3s; font-size: 14px; text-transform: uppercase;
        }
        nav a:hover { color: var(--accent); }
        
        .hero {
            height: 80vh; display: flex; flex-direction: column;
            justify-content: center; align-items: center; text-align: center;
            background: radial-gradient(circle at center, #111 0%, #050505 100%);
        }
        .hero h1 { font-size: 3rem; margin-bottom: 10px; }
        .hero p { color: var(--text-gray); font-size: 1.2rem; margin-bottom: 30px; }
        .btn-cta {
            background: var(--primary); color: white; padding: 15px 40px;
            text-decoration: none; border-radius: 50px; font-weight: bold;
            transition: 0.4s; border: 2px solid transparent;
        }
        .btn-cta:hover { background: transparent; border-color: var(--primary); }

        footer { padding: 50px; text-align: center; border-top: 1px solid #222; color: var(--text-gray); }
    </style>
</head>
<body>

<header>
    <div class="logo">ALL IN BOX</div>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="productos.php">Productos</a>
        <a href="contacto.php">Contacto</a>
    </nav>
</header>

<section class="hero">
    <h1>Calidad Premium. Stock Inmediato.</h1>
    <p>La mejor tecnología y accesorios importados en un solo lugar.</p>
    <a href="productos.php" class="btn-cta">EXPLORAR CATÁLOGO</a>
</section>

<footer>
    <p>&copy; 2026 All In Box - @allinboxok. Todos los derechos reservados.</p>
</footer>

<script>
    console.log("All In Box - Home Loaded");
</script>

</body>
</html>