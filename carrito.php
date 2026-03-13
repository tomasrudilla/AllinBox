<?php include 'header.php'; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --primary: #0f62fe;
        --primary-hover: #0353e9;
        --accent: #fa4d56; /* Rojo para eliminar/alertas */
        --success: #24a148; /* Verde para envío gratis */
        --bg-main: #f8f9fa; 
        --bg-surface: #ffffff;
        --bg-img-container: #f1f3f5; 
        --text-dark: #111827;
        --text-muted: #6b7280;
        --border-color: #e5e7eb;
        --radius-md: 12px;
        --radius-lg: 24px;
        --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 10px 20px -5px rgba(0, 0, 0, 0.08);
    }

    body { background-color: var(--bg-main); font-family: 'Inter', sans-serif; }

    .cart-wrapper {
        max-width: 1300px;
        width: 95%;
        margin: 40px auto 100px;
    }

    .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 30px;
    }

    .cart-header h1 {
        font-size: 2.5rem;
        font-weight: 900;
        color: var(--text-dark);
        letter-spacing: -1px;
        margin: 0;
    }

    .continue-shopping {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: 0.2s;
    }
    .continue-shopping:hover { gap: 12px; }

    /* --- LAYOUT DEL CARRITO --- */
    .cart-layout {
        display: grid;
        grid-template-columns: 1fr 380px; /* Columna principal + Resumen */
        gap: 40px;
        align-items: start;
    }

    /* --- LISTA DE PRODUCTOS --- */
    .cart-items-container {
        background: var(--bg-surface);
        border-radius: var(--radius-lg);
        padding: 30px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-color);
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        gap: 20px;
        padding-bottom: 25px;
        border-bottom: 1px solid var(--border-color);
    }
    .cart-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .item-img {
        width: 120px;
        height: 120px;
        background: var(--bg-img-container);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        flex-shrink: 0;
    }
    .item-img img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .item-details {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .item-brand { font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin-bottom: 5px;}
    .item-title { font-size: 1.15rem; font-weight: 800; color: var(--text-dark); margin: 0 0 5px 0; }
    .item-variant { font-size: 0.9rem; color: var(--text-muted); margin: 0; }

    /* Controles de Cantidad en Carrito */
    .item-actions {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .qty-control {
        display: flex; align-items: center; background: #f3f4f6;
        border-radius: 8px; padding: 3px;
    }
    .qty-btn {
        width: 32px; height: 32px; border: none; background: transparent;
        font-size: 1rem; cursor: pointer; color: var(--text-dark); transition: 0.2s;
        border-radius: 6px; display: flex; align-items: center; justify-content: center;
    }
    .qty-btn:hover { background: #e5e7eb; }
    .qty-input {
        width: 40px; text-align: center; border: none; background: transparent;
        font-size: 1rem; font-weight: 600; color: var(--text-dark); outline: none; pointer-events: none;
    }

    .item-price {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--text-dark);
        min-width: 110px;
        text-align: right;
    }

    .btn-remove {
        background: none; border: none;
        color: #9ca3af; font-size: 1.2rem;
        cursor: pointer; transition: 0.2s;
        padding: 5px;
    }
    .btn-remove:hover { color: var(--accent); transform: scale(1.1); }

    /* --- RESUMEN DE COMPRA (Derecha) --- */
    .cart-summary {
        background: var(--bg-surface);
        border-radius: var(--radius-lg);
        padding: 30px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
        position: sticky;
        top: 100px; /* Para que quede fijo al bajar */
    }

    .summary-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f3f4f6;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 1rem;
        color: var(--text-muted);
        font-weight: 500;
    }
    .summary-row.shipping .value {
        color: var(--success);
        font-weight: 700;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
    }
    .summary-total .total-price {
        font-size: 2rem;
        font-weight: 900;
        color: var(--text-dark);
        letter-spacing: -1px;
    }

    .btn-checkout {
        width: 100%;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: var(--radius-md);
        padding: 18px;
        font-size: 1.1rem;
        font-weight: 700;
        font-family: inherit;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }
    .btn-checkout:hover {
        background: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(15, 98, 254, 0.25);
    }

    .secure-checkout {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
        color: var(--text-muted);
        font-size: 0.85rem;
        font-weight: 500;
    }

    /* Ocultar elementos cuando el carrito está vacío */
    .empty-cart-message {
        display: none;
        text-align: center;
        padding: 60px 20px;
    }
    .empty-cart-message i { font-size: 4rem; color: #cbd5e1; margin-bottom: 20px; }
    .empty-cart-message h2 { font-size: 1.8rem; font-weight: 800; margin-bottom: 10px; }
    .empty-cart-message p { color: var(--text-muted); margin-bottom: 30px; }

    /* Responsive */
    @media (max-width: 992px) {
        .cart-layout { grid-template-columns: 1fr; }
        .cart-summary { position: relative; top: 0; }
        .item-actions { flex-direction: column; align-items: flex-end; gap: 15px;}
        .cart-item { flex-wrap: wrap; }
    }
    @media (max-width: 576px) {
        .item-img { width: 90px; height: 90px; }
        .cart-item { gap: 15px; }
        .item-actions { width: 100%; flex-direction: row; justify-content: space-between; align-items: center; margin-top: 10px;}
    }
</style>

<main class="cart-wrapper">
    
    <div class="cart-header">
        <h1>Tu Carrito</h1>
        <a href="productos.php" class="continue-shopping">
            <i class="fas fa-arrow-left"></i> Seguir comprando
        </a>
    </div>

    <div class="cart-items-container empty-cart-message" id="emptyCart">
        <i class="fas fa-shopping-cart"></i>
        <h2>Tu carrito está vacío</h2>
        <p>Parece que aún no has agregado ningún producto tecnológico increíble.</p>
        <a href="productos.php" class="btn-checkout" style="max-width: 300px; margin: 0 auto;">Ir al Catálogo</a>
    </div>

    <div class="cart-layout" id="cartContent">
        <div class="cart-items-container">
            
            <div class="cart-item" data-price="1250">
                <div class="item-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-15-pro-finish-select-202309-6-1inch-naturaltitanium?wid=5120&hei=2880&fmt=p-jpg&qlt=80&.v=1692875663229" alt="iPhone 15 Pro Max">
                </div>
                <div class="item-details">
                    <span class="item-brand">Apple</span>
                    <h3 class="item-title">iPhone 15 Pro Max</h3>
                    <p class="item-variant">Titanio Natural - 256GB</p>
                </div>
                <div class="item-actions">
                    <div class="qty-control">
                        <button class="qty-btn" onclick="updateItemQty(this, -1)"><i class="fas fa-minus"></i></button>
                        <input type="text" class="qty-input" value="1" readonly>
                        <button class="qty-btn" onclick="updateItemQty(this, 1)"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="item-price">U$S <span class="price-val">1250</span></div>
                    <button class="btn-remove" onclick="removeCartItem(this)" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>

            <div class="cart-item" data-price="590">
                <div class="item-img">
                    <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/airpods-max-select-silver-202011?wid=940&hei=1112&fmt=png-alpha&.v=1604021221000" alt="AirPods Max">
                </div>
                <div class="item-details">
                    <span class="item-brand">Audio</span>
                    <h3 class="item-title">AirPods Max</h3>
                    <p class="item-variant">Silver - Cancelación activa</p>
                </div>
                <div class="item-actions">
                    <div class="qty-control">
                        <button class="qty-btn" onclick="updateItemQty(this, -1)"><i class="fas fa-minus"></i></button>
                        <input type="text" class="qty-input" value="1" readonly>
                        <button class="qty-btn" onclick="updateItemQty(this, 1)"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="item-price">U$S <span class="price-val">590</span></div>
                    <button class="btn-remove" onclick="removeCartItem(this)" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>

        </div>

        <div class="cart-summary">
            <h3 class="summary-title">Resumen de Compra</h3>
            
            <div class="summary-row">
                <span>Subtotal</span>
                <span>U$S <span id="summarySubtotal">1840</span></span>
            </div>
            <div class="summary-row shipping">
                <span>Envío</span>
                <span class="value">¡Gratis!</span>
            </div>
            
            <div class="summary-total">
                <span>Total</span>
                <span class="total-price">U$S <span id="summaryTotal">1840</span></span>
            </div>

            <button class="btn-checkout" onclick="alert('¡Redirigiendo a pasarela de pago segura!')">
                Finalizar Compra <i class="fas fa-lock"></i>
            </button>

            <div class="secure-checkout">
                <i class="fas fa-shield-check" style="color: var(--success);"></i> Pago 100% Seguro y Encriptado
            </div>
        </div>
    </div>
</main>

<script>
    // --- Lógica Visual del Carrito ---
    
    // Función para actualizar el total general basado en los items del DOM
    function calculateCartTotal() {
        const items = document.querySelectorAll('.cart-item');
        let total = 0;
        
        items.forEach(item => {
            const basePrice = parseFloat(item.getAttribute('data-price'));
            const qty = parseInt(item.querySelector('.qty-input').value);
            
            // Actualizar precio de la fila
            const rowTotal = basePrice * qty;
            item.querySelector('.price-val').innerText = rowTotal.toLocaleString('en-US');
            
            total += rowTotal;
        });

        // Actualizar Resumen
        document.getElementById('summarySubtotal').innerText = total.toLocaleString('en-US');
        document.getElementById('summaryTotal').innerText = total.toLocaleString('en-US');

        // Mostrar "Empty State" si no hay items
        if(items.length === 0) {
            document.getElementById('cartContent').style.display = 'none';
            document.getElementById('emptyCart').style.display = 'block';
            
            // Actualizar el numerito rojo del nav (si existe en el header)
            const badge = document.querySelector('.cart-badge');
            if(badge) badge.style.display = 'none';
        }
    }

    // Función de los botones + y -
    function updateItemQty(btnElement, change) {
        const input = btnElement.parentElement.querySelector('.qty-input');
        let currentQty = parseInt(input.value);
        let newQty = currentQty + change;
        
        if(newQty >= 1 && newQty <= 10) { // Limite de 10 unidades por producto
            input.value = newQty;
            calculateCartTotal();
        }
    }

    // Función del botón basurero
    function removeCartItem(btnElement) {
        // En un proyecto real acá harías una llamada AJAX a PHP para eliminar de la sesión
        const itemRow = btnElement.closest('.cart-item');
        
        // Efecto de desvanecimiento
        itemRow.style.transition = "opacity 0.3s ease";
        itemRow.style.opacity = "0";
        
        setTimeout(() => {
            itemRow.remove();
            calculateCartTotal();
        }, 300);
    }

    // Calcular al cargar por primera vez
    document.addEventListener('DOMContentLoaded', calculateCartTotal);
</script>

<?php include 'footer.php'; ?>