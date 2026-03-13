<?php include 'header.php'; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    /* --- Variables Base --- */
    :root {
        --primary: #0f62fe;
        --primary-hover: #0353e9;
        --accent: #fa4d56;
        --bg-main: #f4f4f4;
        --bg-surface: #ffffff;
        --bg-card: #ffffff;
        --text-dark: #111827;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --radius-md: 10px;
        --radius-lg: 16px;
        --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        --shadow-lg: 0 10px 20px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
    }

    body { font-family: 'Inter', sans-serif; background-color: var(--bg-surface); }
    
    .container { max-width: 1400px; margin: 0 auto; padding: 0 5%; overflow-x: hidden; }

    /* --- Hero Section --- */
    .hero {
        display: grid; grid-template-columns: 1fr 1fr; align-items: center;
        min-height: calc(90vh - 75px); gap: 50px; padding-top: 20px; margin-bottom: 20px;
    }
    
    .hero-content h1 { font-size: clamp(3rem, 5vw, 4.5rem); font-weight: 900; line-height: 1.1; letter-spacing: -2px; margin-bottom: 20px; color: var(--text-dark); }
    .hero-content p { font-size: 1.2rem; color: var(--text-muted); margin-bottom: 40px; max-width: 90%; line-height: 1.6; }
    
    .btn-primary {
        display: inline-flex; align-items: center; gap: 10px;
        background: var(--primary); color: white; padding: 16px 32px;
        border-radius: 50px; font-weight: 600; text-decoration: none;
        transition: all 0.3s ease; box-shadow: var(--shadow-md); font-family: inherit;
    }
    .btn-primary:hover { background: var(--primary-hover); transform: translateY(-3px); box-shadow: var(--shadow-lg); }
    
    .hero-image { position: relative; text-align: center; }
    .hero-image img { 
        max-width: 100%; height: auto; 
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }

    /* --- NUEVO CARRUSEL DE MARCAS (A TODO COLOR Y CON PÍLDORAS) --- */
    .brands-section {
        padding: 60px 0;
        margin-bottom: 80px;
        position: relative;
        overflow: hidden;
    }
    
    .brands-section p {
        text-align: center; font-size: 0.95rem; font-weight: 700; 
        color: var(--text-muted); text-transform: uppercase; letter-spacing: 2.5px;
        margin-bottom: 40px;
    }
    
    /* Efecto de desvanecimiento en los bordes para que parezca que desaparecen suavemente */
    .brands-section::before, .brands-section::after {
        content: ""; position: absolute; top: 0; width: 250px; height: 100%; z-index: 2; pointer-events: none;
    }
    .brands-section::before { left: 0; background: linear-gradient(to right, var(--bg-main) 0%, transparent 100%); }
    .brands-section::after { right: 0; background: linear-gradient(to left, var(--bg-main) 0%, transparent 100%); }

    .brands-track {
        display: flex; gap: 30px; align-items: center;
        width: max-content;
        animation: scroll 35s linear infinite;
        padding: 10px 0; /* Espacio para la sombra al hacer hover */
    }
    
    /* Pausa la animación si el usuario pasa el mouse */
    .brands-track:hover { animation-play-state: paused; }

    /* Diseño de la "Píldora" individual para cada marca */
    .brand-pill {
        background: var(--bg-surface);
        padding: 20px 40px;
        border-radius: 24px;
        box-shadow: var(--shadow-sm);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 85px;
        min-width: 200px;
        border: 1px solid rgba(0,0,0,0.03);
        transition: all 0.3s ease;
        cursor: default;
    }
    
    .brand-pill:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(0,0,0,0.05);
    }

    .brand-pill img {
        max-height: 40px; 
        max-width: 130px;
        object-fit: contain;
        /* Al no tener filtro grayscale, se ven a todo color automáticamente */
    }

    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); } /* -50% porque duplicamos el contenido HTML */
    }


    /* --- Trust Badges --- */
    .features { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-bottom: 80px; }
    .feature-box {
        background: var(--bg-surface); padding: 30px; border-radius: var(--radius-lg);
        display: flex; align-items: flex-start; gap: 20px; transition: 0.3s;
        border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);
    }
    .feature-box:hover { box-shadow: var(--shadow-lg); transform: translateY(-5px); border-color: transparent;}
    .feature-box i { font-size: 30px; color: var(--primary); background: rgba(15, 98, 254, 0.1); padding: 15px; border-radius: 12px; }
    .feature-box h4 { font-size: 18px; font-weight: 700; margin-bottom: 5px; color: var(--text-dark);}
    .feature-box p { font-size: 14px; color: var(--text-muted); line-height: 1.5; margin: 0;}

    /* --- Product Section --- */
    .section-title { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
    .section-title h2 { font-size: 2.5rem; font-weight: 800; letter-spacing: -1px; color: var(--text-dark); margin:0;}
    .section-title a { color: var(--primary); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 5px; transition: 0.2s; }
    .section-title a:hover { gap: 10px; }

    .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; }
    
    .product-card {
        background: var(--bg-card); border-radius: var(--radius-lg);
        border: 1px solid var(--border-color); padding: 30px 25px;
        position: relative; transition: all 0.4s ease; text-align: center;
        display: flex; flex-direction: column; box-shadow: var(--shadow-sm);
    }
    .product-card:hover { border-color: transparent; box-shadow: var(--shadow-lg); transform: translateY(-10px); }
    
    .badge {
        position: absolute; top: 20px; left: 20px; background: var(--accent);
        color: white; font-size: 11px; font-weight: 800; text-transform: uppercase;
        padding: 5px 12px; border-radius: 20px; letter-spacing: 1px; z-index: 2;
    }

    .product-img { height: 220px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px; }
    .product-img img { max-width: 100%; max-height: 100%; object-fit: contain; transition: 0.5s; }
    .product-card:hover .product-img img { transform: scale(1.1); }

    .product-card h3 { font-size: 18px; font-weight: 700; margin-bottom: 8px; color: var(--text-dark); }
    .product-card p { color: var(--text-muted); font-size: 14px; margin-bottom: 20px; flex-grow: 1; }
    .product-card .price { font-size: 22px; font-weight: 900; color: var(--text-dark); text-align: left; margin-bottom: 0;}

    /* Botones Ocultos (Ojo y +) */
    .add-to-cart {
        position: absolute; bottom: 25px; right: 25px;
        width: 45px; height: 45px; border-radius: 50%;
        background: var(--bg-surface); border: 1px solid var(--border-color); cursor: pointer;
        color: var(--text-dark); font-size: 18px; transition: 0.3s;
        display: flex; justify-content: center; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .product-card:hover .add-to-cart { background: var(--primary); color: white; transform: rotate(90deg); border-color: var(--primary);}

    .view-product {
        position: absolute; bottom: 25px; right: 80px;
        width: 45px; height: 45px; border-radius: 50%;
        background: var(--bg-surface); border: 1px solid var(--border-color);
        color: var(--text-dark); font-size: 18px; transition: 0.3s;
        display: flex; justify-content: center; align-items: center; text-decoration: none; box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    /* Modificación: Al pasar el mouse sobre la tarjeta o el botón, se levanta levemente, pero mantiene el color original */
    .product-card:hover .view-product, .view-product:hover { 
        transform: scale(1.1); 
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
    }


    @media (max-width: 992px) {
        .hero { grid-template-columns: 1fr; text-align: center; padding-top: 40px; min-height: auto; }
        .hero-content p { margin: 0 auto 30px; }
        .features { grid-template-columns: 1fr; }
        .brands-section::before, .brands-section::after { width: 80px; }
    }
</style>

<main class="container">
    
    <section class="hero">
        <div class="hero-content reveal">
            <h1>Tecnología que<br>marca la diferencia.</h1>
            <p>Importadores directos de tecnología de alta gama. Stock físico inmediato, envíos asegurados a todo el país y garantía real en cada compra.</p>
            <a href="productos.php" class="btn-primary">Ver Catálogo Completo <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="hero-image reveal">
            <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-model-unselect-gallery-2-202309_GEO_US?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693010533036" alt="iPhone 15 Pro">
        </div>
    </section>

</main> 

<section class="brands-section reveal">
    <p>Trabajamos con las mejores marcas a nivel mundial</p>
    
    <div class="brands-track">
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple" style="height: 35px;"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg" alt="Samsung"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/JBL_logo.svg" alt="JBL"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Nintendo.svg" alt="Nintendo"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/ASUS_Logo.svg" alt="Asus" style="height: 25px;"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/1/17/Logitech_logo.svg" alt="Logitech" style="height: 25px;"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/Lenovo_logo_2015.svg" alt="Lenovo"></div>
        
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple" style="height: 35px;"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg" alt="Samsung"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/JBL_logo.svg" alt="JBL"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Nintendo.svg" alt="Nintendo"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/ASUS_Logo.svg" alt="Asus" style="height: 25px;"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/1/17/Logitech_logo.svg" alt="Logitech" style="height: 25px;"></div>
        <div class="brand-pill"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/Lenovo_logo_2015.svg" alt="Lenovo"></div>
    </div>
</section>

<main class="container"> 
    <section class="features reveal">
        <div class="feature-box">
            <i class="fas fa-box-open"></i>
            <div>
                <h4>Stock Inmediato</h4>
                <p>Si está publicado, lo tenemos. Entrega garantizada sin demoras de importación.</p>
            </div>
        </div>
        <div class="feature-box">
            <i class="fas fa-shield-alt"></i>
            <div>
                <h4>Garantía Oficial</h4>
                <p>Todos nuestros equipos son originales, en caja sellada y con garantía de fabricante.</p>
            </div>
        </div>
        <div class="feature-box">
            <i class="fas fa-truck-fast"></i>
            <div>
                <h4>Envío Express</h4>
                <p>Despachamos tu pedido en el día. Llega seguro a la puerta de tu casa.</p>
            </div>
        </div>
    </section>

    <section style="margin-bottom: 100px;">
        <div class="section-title reveal">
            <h2>Ingresos Recientes</h2>
            <a href="productos.php">Ver todo <i class="fas fa-chevron-right" style="font-size: 12px;"></i></a>
        </div>

        <div class="product-grid">
            
            <div class="product-card reveal" data-category="smartphones" data-price="1250">
                <span class="badge" style="background: var(--accent);">Nuevo</span>
                <div class="product-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1692875663229" alt="iPhone 15 Pro Max" loading="lazy">
                </div>
                <h3>iPhone 15 Pro Max</h3>
                <p>Titanio Natural - 256GB</p>
                <div class="price">U$S 1.250</div>
                <a href="producto.php" class="view-product" title="Ver detalles"><i class="fas fa-eye"></i></a>
                <button class="add-to-cart" onclick="alert('Agregado')" title="Agregar al carrito"><i class="fas fa-plus"></i></button>
            </div>

            <div class="product-card reveal" data-category="accesorios" data-price="590">
                <span class="badge" style="background: var(--primary);">Oferta</span>
                <div class="product-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/airpods-max-select-silver-202011?wid=940&hei=1112&fmt=png-alpha&.v=1604021221000" alt="AirPods Max" loading="lazy">
                </div>
                <h3>AirPods Max</h3>
                <p>Silver - Cancelación activa</p>
                <div class="price">U$S 590</div>
                <a href="producto.php" class="view-product" title="Ver detalles"><i class="fas fa-eye"></i></a>
                <button class="add-to-cart" onclick="alert('Agregado')" title="Agregar al carrito"><i class="fas fa-plus"></i></button>
            </div>

            <div class="product-card reveal" data-category="smartwatches" data-price="820">
                <span class="badge" style="background: var(--text-dark);">Top Ventas</span>
                <div class="product-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/apple-watch-ultra2-avail-unselect-mat-202309?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693611681561" alt="Watch Ultra 2" loading="lazy">
                </div>
                <h3>Watch Ultra 2</h3>
                <p>Caja de titanio 49mm</p>
                <div class="price">U$S 820</div>
                <a href="producto.php" class="view-product" title="Ver detalles"><i class="fas fa-eye"></i></a>
                <button class="add-to-cart" onclick="alert('Agregado')" title="Agregar al carrito"><i class="fas fa-plus"></i></button>
            </div>

            <div class="product-card reveal" data-category="notebooks" data-price="1450">
                <div class="product-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/mba15-midnight-select-202306?wid=904&hei=840&fmt=jpeg&qlt=90&.v=1684518479433" alt="MacBook Air M3" loading="lazy">
                </div>
                <h3>MacBook Air M3</h3>
                <p>15" - 8GB RAM - 256GB</p>
                <div class="price">U$S 1.450</div>
                <a href="producto.php" class="view-product" title="Ver detalles"><i class="fas fa-eye"></i></a>
                <button class="add-to-cart" onclick="alert('Agregado')" title="Agregar al carrito"><i class="fas fa-plus"></i></button>
            </div>

        </div>
    </section>

</main>

<?php include 'footer.php'; ?>