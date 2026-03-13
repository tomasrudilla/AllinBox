<?php include 'header.php'; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    body { 
        background-color: var(--bg-main); 
        font-family: 'Inter', sans-serif; 
    }

    .catalog-wrapper {
        max-width: 1650px; 
        width: 96%;
        margin: 0 auto; 
        padding: 40px 0 80px 0;
        min-height: calc(100vh - 75px);
    }

    /* --- CABECERA --- */
    .catalog-header {
        background: var(--bg-surface);
        padding: 50px 40px;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-color);
        margin-bottom: 50px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .catalog-header::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
    }

    .catalog-title {
        max-width: 800px;
        margin: 0 auto;
    }

    .catalog-title h1 { 
        font-size: 3.2rem; 
        font-weight: 800; 
        letter-spacing: -1.5px; 
        color: var(--text-dark);
        margin: 0 0 15px 0;
        line-height: 1.2;
    }
    
    .catalog-title p { 
        color: var(--text-muted); 
        font-size: 1.2rem; 
        font-weight: 400;
        margin: 0; 
        line-height: 1.5;
    }

    .catalog-layout { 
        display: grid; 
        grid-template-columns: 280px 1fr;
        gap: 40px; 
    }

    /* --- SIDEBAR DE FILTROS --- */
    .sidebar {
        background: var(--bg-surface); 
        padding: 30px 25px;
        border-radius: var(--radius-lg); 
        height: max-content;
        position: sticky; 
        top: 20px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-color);
    }

    .sidebar h4 { 
        font-size: 1.25rem; 
        font-weight: 700; 
        margin: 0 0 25px 0; 
        padding-bottom: 15px; 
        border-bottom: 2px solid #f3f4f6; 
        color: var(--text-dark);
        letter-spacing: -0.5px;
    }

    .filter-section { margin-bottom: 10px; }
    .filter-section h5 { 
        font-size: 0.85rem; 
        color: var(--text-muted); 
        text-transform: uppercase; 
        letter-spacing: 1px; 
        margin: 0 0 15px 0; 
        font-weight: 600;
    }

    .custom-checkbox {
        display: flex; 
        align-items: center; 
        margin-bottom: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        cursor: pointer; 
        font-size: 0.95rem; 
        font-weight: 500; 
        color: var(--text-dark);
        transition: background-color 0.2s ease;
        margin-left: -12px; 
    }
    .custom-checkbox:hover { background-color: #f9fafb; }
    .custom-checkbox input { display: none; }
    
    .checkmark {
        width: 20px; 
        height: 20px; 
        border: 2px solid #d1d5db; 
        border-radius: 6px; 
        margin-right: 15px; 
        display: flex;
        align-items: center; 
        justify-content: center; 
        transition: all 0.2s ease;
        background: var(--bg-surface);
    }
    
    .custom-checkbox input:checked + .checkmark { 
        background-color: var(--primary); 
        border-color: var(--primary); 
    }
    .custom-checkbox input:checked + .checkmark::after {
        content: '\2714'; 
        color: white; 
        font-size: 12px;
    }

    /* --- CONTROLES --- */
    .controls-bar {
        display: flex; gap: 15px; margin-bottom: 25px; flex-wrap: wrap;
    }

    .search-container { position: relative; flex: 1; min-width: 250px; }
    .search-container i { 
        position: absolute; left: 20px; top: 50%; transform: translateY(-50%); 
        color: var(--text-muted); font-size: 1.1rem; 
    }
    .search-bar {
        width: 100%; padding: 16px 20px 16px 50px; border-radius: var(--radius-md);
        border: 1px solid var(--border-color); background: var(--bg-surface); 
        font-size: 15px; font-family: inherit; outline: none; 
        box-shadow: var(--shadow-sm); transition: all 0.3s ease; box-sizing: border-box;
    }
    .search-bar:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(15, 98, 254, 0.15); }

    .sort-select {
        padding: 16px 20px; border-radius: var(--radius-md); border: 1px solid var(--border-color);
        background: var(--bg-surface); font-size: 15px; color: var(--text-dark);
        outline: none; cursor: pointer; box-shadow: var(--shadow-sm); min-width: 200px;
    }
    .sort-select:focus { border-color: var(--primary); }

    .results-count {
        margin-bottom: 20px; font-size: 15px; color: var(--text-muted); font-weight: 500;
    }

    /* --- PRODUCT CARDS --- */
    .product-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); 
        gap: 30px; 
    }
    
    .product-card {
        background: var(--bg-card); 
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-color); 
        padding: 30px 25px;
        position: relative; 
        transition: all 0.4s ease; 
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    .product-card:hover { 
        border-color: transparent; 
        box-shadow: var(--shadow-lg); 
        transform: translateY(-10px); 
    }
    
    .badge {
        position: absolute; top: 20px; left: 20px; background: var(--accent);
        color: white; font-size: 11px; font-weight: 800; text-transform: uppercase;
        padding: 5px 12px; border-radius: 20px; letter-spacing: 1px; z-index: 2;
    }

    .product-img { 
        height: 220px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px; 
    }
    .product-img img { 
        max-width: 100%; max-height: 100%; object-fit: contain; transition: 0.5s; 
    }
    .product-card:hover .product-img img { transform: scale(1.1); }

    .product-card h3 { 
        font-size: 18px; font-weight: 700; margin-bottom: 8px; color: var(--text-dark); 
    }
    .product-card p { 
        color: var(--text-muted); font-size: 14px; margin-bottom: 20px;
        flex-grow: 1; 
    }
    .product-card .price { 
        font-size: 22px; font-weight: 900; color: var(--text-dark); 
        text-align: left;
        margin-bottom: 0;
    }

    /* Botón Agregar al Carrito (+) */
    .add-to-cart {
        position: absolute; bottom: 25px; right: 25px;
        width: 45px; height: 45px; border-radius: 50%;
        background: var(--bg-surface); border: 1px solid var(--border-color); cursor: pointer;
        color: var(--text-dark); font-size: 18px; transition: 0.3s;
        display: flex; justify-content: center; align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .product-card:hover .add-to-cart { 
        background: var(--primary); color: white; transform: rotate(90deg); border-color: var(--primary);
    }

    /* Botón Ojo (Ver Producto) */
    .view-product {
        position: absolute; bottom: 25px; right: 80px;
        width: 45px; height: 45px; border-radius: 50%;
        background: var(--bg-surface); border: 1px solid var(--border-color);
        color: var(--text-dark); font-size: 18px; transition: 0.3s;
        display: flex; justify-content: center; align-items: center;
        text-decoration: none; box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .product-card:hover .view-product { 
        color: var(--primary); transform: scale(1.1); border-color: var(--primary);
    }

    .no-results { 
        display: none; text-align: center; padding: 60px 20px; color: var(--text-muted); 
        grid-column: 1 / -1; background: var(--bg-surface);
        border-radius: var(--radius-lg); border: 1px dashed var(--border-color);
    }

    @media (max-width: 992px) {
        .catalog-layout { grid-template-columns: 1fr; }
        .sidebar { position: relative; top: 0; margin-bottom: 20px; z-index: 10; }
        .filter-section { display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 0;}
        .custom-checkbox { margin-bottom: 0; margin-left: 0; padding: 5px; }
        .catalog-header { padding: 30px 20px; }
        .catalog-title h1 { font-size: 2.5rem; }
    }
</style>

<div class="catalog-wrapper">
    <div class="catalog-header reveal">
        <div class="catalog-title">
            <h1>Catálogo de Productos</h1>
            <p>Encontrá la mejor tecnología importada con stock real y entrega inmediata.</p>
        </div>
    </div>

    <div class="catalog-layout">
        <aside class="sidebar reveal">
            <h4>Filtrar por</h4>
            <div class="filter-section">
                <h5>Categorías</h5>
                <label class="custom-checkbox">
                    <input type="checkbox" class="cat-filter" value="smartphones" checked onchange="filterAndSortProducts()">
                    <span class="checkmark"></span> Smartphones
                </label>
                <label class="custom-checkbox">
                    <input type="checkbox" class="cat-filter" value="notebooks" checked onchange="filterAndSortProducts()">
                    <span class="checkmark"></span> Notebooks & Tablets
                </label>
                <label class="custom-checkbox">
                    <input type="checkbox" class="cat-filter" value="smartwatches" checked onchange="filterAndSortProducts()">
                    <span class="checkmark"></span> Smartwatches
                </label>
                <label class="custom-checkbox">
                    <input type="checkbox" class="cat-filter" value="accesorios" checked onchange="filterAndSortProducts()">
                    <span class="checkmark"></span> Audio & Accesorios
                </label>
            </div>
        </aside>

        <div class="products-area">
            
            <div class="controls-bar reveal">
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" class="search-bar" id="searchInput" placeholder="Buscá por marca, modelo o tipo de producto..." onkeyup="filterAndSortProducts()">
                </div>
                
                <select class="sort-select" id="sortSelect" onchange="filterAndSortProducts()">
                    <option value="default">Ordenar por: Destacados</option>
                    <option value="price-asc">Precio: Menor a Mayor</option>
                    <option value="price-desc">Precio: Mayor a Menor</option>
                </select>
            </div>

            <div class="results-count" id="resultsCount">Mostrando productos...</div>

            <div class="product-grid" id="productGrid">
                <?php
                $productos = [
                    ["nombre" => "iPhone 15 Pro Max", "cat_id" => "smartphones", "subtitulo" => "Titanio Natural - 256GB", "precio" => "1.250", "img" => "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1692875663229", "badge" => "Nuevo", "badge_color" => "var(--accent)"],
                    ["nombre" => "Samsung Galaxy S24 Ultra", "cat_id" => "smartphones", "subtitulo" => "Titanium Black - 512GB", "precio" => "1.350", "img" => "https://m.media-amazon.com/images/I/71WcjZXMi8L._AC_SL1500_.jpg", "badge" => "", "badge_color" => ""],
                    ["nombre" => "MacBook Air M3", "cat_id" => "notebooks", "subtitulo" => "15\" - 8GB RAM - 256GB", "precio" => "1.450", "img" => "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/mba15-midnight-select-202306?wid=904&hei=840&fmt=jpeg&qlt=90&.v=1684518479433", "badge" => "", "badge_color" => ""],
                    ["nombre" => "AirPods Max", "cat_id" => "accesorios", "subtitulo" => "Silver - Cancelación activa", "precio" => "590", "img" => "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/airpods-max-select-silver-202011?wid=940&hei=1112&fmt=png-alpha&.v=1604021221000", "badge" => "Oferta", "badge_color" => "var(--primary)"],
                    ["nombre" => "Watch Ultra 2", "cat_id" => "smartwatches", "subtitulo" => "Caja de titanio 49mm", "precio" => "820", "img" => "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/apple-watch-ultra2-avail-unselect-mat-202309?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1693611681561", "badge" => "Top Ventas", "badge_color" => "var(--text-dark)"],
                    ["nombre" => "JBL Charge 5", "cat_id" => "accesorios", "subtitulo" => "Parlante Bluetooth Portátil", "precio" => "180", "img" => "https://m.media-amazon.com/images/I/71uEhwK0E-L._AC_SL1500_.jpg", "badge" => "", "badge_color" => ""],
                    ["nombre" => "iPad Air (5ª Gen)", "cat_id" => "notebooks", "subtitulo" => "10.9\" - Chip M1 - 64GB", "precio" => "650", "img" => "https://m.media-amazon.com/images/I/61XZQXFQeVL._AC_SL1500_.jpg", "badge" => "", "badge_color" => ""],
                    ["nombre" => "Cargador Rápido 20W", "cat_id" => "accesorios", "subtitulo" => "Adaptador de corriente USB-C", "precio" => "35", "img" => "https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MHJA3?wid=1144&hei=1144&fmt=jpeg&qlt=90&.v=1604021661000", "badge" => "", "badge_color" => ""]
                ];

                foreach($productos as $p) {
                    $badgeStyle = !empty($p['badge_color']) ? "style='background: {$p['badge_color']};'" : "";
                    $badgeHTML = !empty($p['badge']) ? "<span class='badge' {$badgeStyle}>{$p['badge']}</span>" : "";
                    
                    echo "
                    <div class='product-card reveal' data-category='{$p['cat_id']}' data-price='{$p['precio']}'>
                        {$badgeHTML}
                        <div class='product-img'>
                            <img src='{$p['img']}' alt='{$p['nombre']}' loading='lazy'>
                        </div>
                        <h3>{$p['nombre']}</h3>
                        <p>{$p['subtitulo']}</p>
                        <div class='price'>U\$S {$p['precio']}</div>
                        
                        <a href='producto.php' class='view-product' title='Ver detalles'>
                            <i class='fas fa-eye'></i>
                        </a>
                        <button class='add-to-cart' onclick=\"agregarAlCarrito('{$p['nombre']}')\" title='Agregar al carrito'>
                            <i class='fas fa-plus'></i>
                        </button>
                    </div>";
                }
                ?>
                <div class="no-results" id="noResults">
                    <h3 style="margin-bottom:10px; color:var(--text-dark);">No encontramos productos</h3>
                    <p>Intentá buscar otra marca o ajustar los filtros de la izquierda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        filterAndSortProducts();
    });

    function filterAndSortProducts() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const sortValue = document.getElementById('sortSelect').value;
        const grid = document.getElementById('productGrid');
        const cards = Array.from(grid.querySelectorAll('.product-card'));
        const checkboxes = document.querySelectorAll('.cat-filter');
        const noResults = document.getElementById('noResults');
        const resultsCount = document.getElementById('resultsCount');
        
        let activeCategories = [];
        checkboxes.forEach(box => { if(box.checked) activeCategories.push(box.value); });

        let visibleCount = 0;

        cards.forEach(card => {
            const title = card.querySelector('h3').innerText.toLowerCase();
            const subtitle = card.querySelector('p').innerText.toLowerCase(); 
            const category = card.getAttribute('data-category');
            
            const matchesSearch = title.includes(searchInput) || subtitle.includes(searchInput);
            const matchesCategory = activeCategories.includes(category);

            if (matchesSearch && matchesCategory) {
                card.style.display = "flex";
                card.classList.add('is-visible');
                visibleCount++;
            } else {
                card.style.display = "none";
                card.classList.remove('is-visible');
            }
        });

        const visibleCards = cards.filter(card => card.classList.contains('is-visible'));
        
        if (sortValue !== 'default') {
            visibleCards.sort((a, b) => {
                let priceA = parseFloat(a.getAttribute('data-price').replace('.', ''));
                let priceB = parseFloat(b.getAttribute('data-price').replace('.', ''));
                return sortValue === 'price-asc' ? priceA - priceB : priceB - priceA;
            });
        }

        visibleCards.forEach(card => grid.appendChild(card));
        grid.appendChild(noResults); 

        noResults.style.display = visibleCount === 0 ? "block" : "none";
        resultsCount.innerText = `Mostrando ${visibleCount} producto${visibleCount !== 1 ? 's' : ''}`;
    }

    function agregarAlCarrito(producto) {
        alert("¡" + producto + " se agregó al carrito de compras!");
    }
</script>

<?php include 'footer.php'; ?>