<?php include 'header.php'; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --primary: #0f62fe;
        --primary-hover: #0353e9;
        --accent: #fa4d56;
        --bg-main: #f8f9fa; 
        --bg-surface: #ffffff;
        --bg-img-container: #f1f3f5; 
        --text-dark: #111827;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --radius-md: 12px;
        --radius-lg: 24px;
        --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    body { background-color: var(--bg-main); font-family: 'Inter', sans-serif; }

    .product-page-container {
        max-width: 1300px;
        width: 95%;
        margin: 40px auto 100px;
    }

    /* --- BREADCRUMB --- */
    .breadcrumb {
        margin-bottom: 30px;
        font-size: 0.9rem;
        color: var(--text-muted);
    }
    .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: 0.2s; }
    .breadcrumb a:hover { color: var(--primary); }
    .breadcrumb span { margin: 0 10px; }

    /* --- LAYOUT PRINCIPAL --- */
    .product-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        background: var(--bg-surface);
        padding: 40px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-color);
    }

    /* --- GALERÍA DE IMÁGENES --- */
    .gallery-container { display: flex; flex-direction: column; gap: 20px; }
    
    .main-image {
        background: var(--bg-img-container);
        border-radius: var(--radius-lg);
        height: 500px;
        display: flex; align-items: center; justify-content: center;
        padding: 40px;
    }
    .main-image img {
        max-width: 100%; max-height: 100%; object-fit: contain;
        transition: transform 0.3s ease;
    }

    .thumbnail-row {
        display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px;
    }
    .thumb {
        background: var(--bg-img-container);
        border-radius: var(--radius-md);
        height: 100px; padding: 10px;
        cursor: pointer; border: 2px solid transparent;
        transition: all 0.2s;
        display: flex; justify-content: center; align-items: center;
    }
    .thumb img { max-width: 100%; max-height: 100%; object-fit: contain; }
    .thumb.active, .thumb:hover { border-color: var(--primary); background: var(--bg-surface); }

    /* --- INFORMACIÓN DEL PRODUCTO --- */
    .product-info { display: flex; flex-direction: column; }
    
    .product-badge {
        align-self: flex-start; background: var(--text-dark); color: white;
        font-size: 0.75rem; font-weight: 700; text-transform: uppercase;
        padding: 6px 12px; border-radius: 50px; letter-spacing: 1px; margin-bottom: 20px;
    }

    .product-info h1 { font-size: 2.5rem; font-weight: 900; letter-spacing: -1px; margin: 0 0 10px 0; color: var(--text-dark); line-height: 1.1; }
    .product-subtitle { font-size: 1.1rem; color: var(--text-muted); margin-bottom: 25px; }
    
    .product-price { font-size: 2.8rem; font-weight: 800; color: var(--text-dark); margin-bottom: 30px; letter-spacing: -1.5px; }

    .product-description {
        font-size: 1rem; color: var(--text-muted); line-height: 1.6;
        margin-bottom: 40px; border-bottom: 1px solid var(--border-color); padding-bottom: 30px;
    }

    /* --- CONTROLES DE COMPRA --- */
    .purchase-actions { display: flex; gap: 20px; margin-bottom: 40px; }

    .quantity-selector {
        display: flex; align-items: center; background: #f3f4f6;
        border-radius: var(--radius-md); padding: 5px;
    }
    .qty-btn {
        width: 40px; height: 40px; border: none; background: transparent;
        font-size: 1.2rem; cursor: pointer; color: var(--text-dark); transition: 0.2s;
        border-radius: 8px;
    }
    .qty-btn:hover { background: #e5e7eb; }
    .qty-input {
        width: 50px; text-align: center; border: none; background: transparent;
        font-size: 1.1rem; font-weight: 600; color: var(--text-dark); outline: none;
    }

    .btn-buy {
        flex: 1; background: var(--primary); color: white;
        border: none; border-radius: var(--radius-md); font-size: 1.1rem; font-weight: 600;
        font-family: inherit; cursor: pointer; transition: 0.3s;
        display: flex; justify-content: center; align-items: center; gap: 10px;
    }
    .btn-buy:hover { background: var(--primary-hover); transform: translateY(-2px); box-shadow: 0 8px 15px rgba(15, 98, 254, 0.2); }

    /* --- TRUST FEATURES --- */
    .product-features { display: flex; flex-direction: column; gap: 15px; }
    .feature-item {
        display: flex; align-items: center; gap: 15px;
        padding: 15px; background: #f9fafb; border-radius: var(--radius-md);
    }
    .feature-item i { font-size: 20px; color: var(--primary); }
    .feature-item p { margin: 0; font-size: 0.95rem; font-weight: 500; color: var(--text-dark); }
    .feature-item span { display: block; font-size: 0.8rem; color: var(--text-muted); margin-top: 2px; }

    /* Responsive */
    @media (max-width: 992px) {
        .product-layout { grid-template-columns: 1fr; gap: 40px; padding: 25px; }
        .main-image { height: 350px; }
        .purchase-actions { flex-direction: column; }
        .quantity-selector { justify-content: center; padding: 10px; }
        .btn-buy { padding: 18px; }
    }
</style>

<main class="product-page-container">
    
    <div class="breadcrumb">
        <a href="index.php">Inicio</a> <span>/</span>
        <a href="productos.php">Catálogo</a> <span>/</span>
        <a href="#">Smartphones</a> <span>/</span>
        <strong style="color: var(--text-dark);">iPhone 15 Pro Max</strong>
    </div>

    <div class="product-layout">
        <div class="gallery-container">
            <div class="main-image">
                <img id="mainProductImage" src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1692875663229" alt="iPhone 15 Pro Max">
            </div>
            <div class="thumbnail-row">
                <div class="thumb active" onclick="changeImage(this, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1692875663229')">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1692875663229" alt="Thumb 1">
                </div>
                <div class="thumb" onclick="changeImage(this, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-model-unselect-gallery-2-202309_GEO_US?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693010533036')">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-model-unselect-gallery-2-202309_GEO_US?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693010533036" alt="Thumb 2">
                </div>
                <div class="thumb" onclick="changeImage(this, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-model-unselect-gallery-1-202309_GEO_US?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693010532212')">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-model-unselect-gallery-1-202309_GEO_US?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693010532212" alt="Thumb 3">
                </div>
            </div>
        </div>

        <div class="product-info">
            <span class="product-badge">Stock Disponible</span>
            
            <h1>iPhone 15 Pro Max</h1>
            <p class="product-subtitle">Titanio Natural - 256GB | Chip A17 Pro</p>
            
            <div class="product-price">U$S 1.250</div>
            
            <div class="product-description">
                El iPhone definitivo. Forjado en titanio de calidad aeroespacial, lo que lo convierte en nuestro modelo Pro más liviano hasta ahora. Cuenta con el avanzado chip A17 Pro que redefine el rendimiento en juegos, un sistema de cámaras más versátil y un botón de Acción personalizable.
            </div>

            <div class="purchase-actions">
                <div class="quantity-selector">
                    <button class="qty-btn" onclick="updateQuantity(-1)"><i class="fas fa-minus"></i></button>
                    <input type="text" id="qtyInput" class="qty-input" value="1" readonly>
                    <button class="qty-btn" onclick="updateQuantity(1)"><i class="fas fa-plus"></i></button>
                </div>
                <button class="btn-buy" onclick="agregarAlCarritoDesdeDetalle()">
                    <i class="fas fa-shopping-cart"></i> Agregar al carrito
                </button>
            </div>

            <div class="product-features">
                <div class="feature-item">
                    <i class="fas fa-truck-fast"></i>
                    <div>
                        <p>Envío Inmediato Gratis</p>
                        <span>Despachamos hoy mismo a todo el país.</span>
                    </div>
                </div>
                <div class="feature-item">
                    <i class="fas fa-shield-halved"></i>
                    <div>
                        <p>1 Año de Garantía Oficial</p>
                        <span>Caja sellada y cobertura directa de la marca.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Cambiar imagen principal de la galería
    function changeImage(element, src) {
        document.getElementById('mainProductImage').src = src;
        
        let thumbs = document.querySelectorAll('.thumb');
        thumbs.forEach(t => t.classList.remove('active'));
        
        element.classList.add('active');
    }

    // Sumar o restar cantidad
    function updateQuantity(change) {
        let input = document.getElementById('qtyInput');
        let currentVal = parseInt(input.value);
        let newVal = currentVal + change;
        if(newVal >= 1 && newVal <= 10) { 
            input.value = newVal;
        }
    }

    function agregarAlCarritoDesdeDetalle() {
        let qty = document.getElementById('qtyInput').value;
        alert("¡Agregaste " + qty + " unidad(es) al carrito!");
    }
</script>

<?php include 'footer.php'; ?>