<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All In Box | Admin OS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            /* Paleta Ultra Premium - OS Style */
            --bg-base: #f4f4f5; 
            --bg-panel: #ffffff; 
            --sidebar-bg: #09090b; 
            
            --primary: #09090b;
            --brand-gradient: linear-gradient(135deg, #2563eb, #4f46e5); 
            --brand-gradient-hover: linear-gradient(135deg, #1d4ed8, #4338ca);
            
            --success: #10b981;
            --success-light: #d1fae5;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            
            --text-main: #09090b;
            --text-muted: #71717a;
            --border-soft: #e4e4e7;
            
            --radius-sm: 8px;
            --radius-md: 16px;
            --radius-lg: 24px;
            
            --shadow-float: 0 20px 40px -10px rgba(0,0,0,0.08);
            --shadow-card: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.02);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Inter', sans-serif; 
            background: var(--bg-base); 
            display: flex; 
            height: 100vh; 
            overflow: hidden; 
            -webkit-font-smoothing: antialiased; 
            padding: 15px; 
            gap: 15px;
        }

        /* --- FLOATING SIDEBAR --- */
        .sidebar { 
            width: 280px; 
            background: var(--sidebar-bg); 
            color: white; 
            display: flex; 
            flex-direction: column; 
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-float);
            position: relative;
            overflow: hidden;
        }
        
        .sidebar::before {
            content: ''; position: absolute; top: -50px; left: -50px; width: 150px; height: 150px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.4) 0%, transparent 70%); filter: blur(30px); z-index: 0;
        }

        .sidebar-brand { 
            position: relative; z-index: 1; padding: 35px 30px 20px; font-size: 1.5rem; font-weight: 900; 
            display: flex; align-items: center; gap: 12px; letter-spacing: -0.5px;
        }
        .sidebar-brand i { background: var(--brand-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 1.8rem; }
        
        .sidebar-nav { position: relative; z-index: 1; padding: 0 20px; display: flex; flex-direction: column; gap: 8px; flex-grow: 1;}
        
        .nav-link { 
            display: flex; align-items: center; gap: 15px; padding: 14px 18px; color: #a1a1aa; 
            text-decoration: none; font-weight: 500; font-size: 0.95rem; border-radius: var(--radius-md); 
            cursor: pointer; transition: all 0.3s ease; position: relative;
        }
        .nav-link:hover { color: white; background: rgba(255,255,255,0.05); }
        .nav-link.active { background: rgba(255,255,255,0.1); color: white; font-weight: 600; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.05);}
        .nav-link i { font-size: 1.2rem; width: 24px; text-align: center; opacity: 0.8;}
        .nav-link.active i { color: #818cf8; opacity: 1;}

        .sidebar-user {
            margin: 20px; padding: 15px; background: rgba(255,255,255,0.05); border-radius: var(--radius-md);
            display: flex; align-items: center; gap: 12px; border: 1px solid rgba(255,255,255,0.05);
        }
        .user-avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--brand-gradient); display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.1rem;}
        .user-info p { margin: 0; font-size: 0.9rem; font-weight: 600; }
        .user-info span { font-size: 0.75rem; color: #a1a1aa; }

        /* --- MAIN CONTENT & VIEWS --- */
        .main-content { 
            flex-grow: 1; background: var(--bg-panel); border-radius: var(--radius-lg); 
            box-shadow: var(--shadow-card); display: flex; flex-direction: column; overflow: hidden;
            border: 1px solid var(--border-soft);
        }

        .view-section { display: none; padding: 50px; overflow-y: auto; height: 100%; }
        .view-section.active { display: block; animation: fadeUp 0.4s cubic-bezier(0.16, 1, 0.3, 1); }
        
        @keyframes fadeUp { 
            from { opacity: 0; transform: translateY(20px); } 
            to { opacity: 1; transform: translateY(0); } 
        }

        .page-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; }
        .page-header h1 { margin: 0 0 8px 0; font-size: 2.2rem; font-weight: 900; color: var(--text-main); letter-spacing: -1px;}
        .page-header p { margin: 0; color: var(--text-muted); font-size: 1rem; }

        /* Botones Premium */
        .btn-primary { 
            background: var(--brand-gradient); color: white; border: none; padding: 14px 28px; 
            border-radius: var(--radius-md); font-weight: 600; font-size: 0.95rem; cursor: pointer; 
            transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 10px; font-family: inherit;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }
        .btn-primary:hover { background: var(--brand-gradient-hover); transform: translateY(-2px); box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4); }
        
        .btn-dark { background: var(--primary); color: white; border: none; padding: 14px 28px; border-radius: var(--radius-md); font-weight: 600; cursor: pointer; transition: 0.3s; display: inline-flex; align-items: center; gap: 10px; font-family: inherit;}
        .btn-dark:hover { background: #27272a; transform: translateY(-2px); box-shadow: 0 8px 15px rgba(0,0,0,0.1);}

        /* --- DASHBOARD CARDS --- */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 50px; }
        .stat-card { 
            background: #ffffff; padding: 30px; border-radius: var(--radius-lg); 
            border: 1px solid var(--border-soft); box-shadow: var(--shadow-card); 
            display: flex; flex-direction: column; gap: 12px; position: relative; overflow: hidden;
        }
        .stat-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--border-soft); }
        .stat-card.highlight::before { background: var(--brand-gradient); }
        .stat-card.profit::before { background: var(--success); }
        
        .stat-card h3 { font-size: 0.85rem; color: var(--text-muted); margin: 0; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 700; }
        .stat-card .value { font-size: 2.8rem; font-weight: 900; color: var(--text-main); letter-spacing: -1.5px; line-height: 1; }
        .stat-card .profit-val { color: var(--success); }

        /* --- TABLAS MODERNAS --- */
        .table-wrapper { background: #ffffff; border-radius: var(--radius-lg); border: 1px solid var(--border-soft); overflow: hidden; box-shadow: var(--shadow-card); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 20px 30px; font-size: 0.75rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; border-bottom: 1px solid var(--border-soft); background: #fafafa;}
        td { padding: 20px 30px; border-bottom: 1px solid var(--border-soft); color: var(--text-main); font-size: 0.95rem; font-weight: 500; transition: background 0.2s;}
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #fafafa; }

        .price-tag { font-family: 'Inter', monospace; font-weight: 700; letter-spacing: -0.5px; }
        .profit-tag { color: var(--success); font-weight: 800; background: var(--success-light); padding: 4px 10px; border-radius: 8px; font-size: 0.85rem;}
        
        /* Stock Badge */
        .stock-badge { padding: 4px 10px; border-radius: 8px; font-size: 0.85rem; font-weight: 700; background: #f4f4f5; color: var(--text-main); border: 1px solid var(--border-soft);}
        .stock-low { background: #fef3c7; color: #92400e; border-color: #fde68a;}
        .stock-out { background: var(--danger-light); color: var(--danger); border-color: #fca5a5;}

        .action-btns { display: flex; gap: 8px; justify-content: flex-end;}
        .btn-icon { width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border-soft); background: white; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; color: var(--text-muted);}
        .btn-icon:hover { border-color: var(--danger); color: var(--danger); background: var(--danger-light); transform: scale(1.05);}

        .badge-type { padding: 6px 12px; border-radius: 8px; font-size: 0.8rem; font-weight: 700; display: inline-flex; align-items: center; gap: 6px;}
        .type-wsp { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0;}
        .type-local { background: #e0e7ff; color: #3730a3; border: 1px solid #c7d2fe;}

        /* --- MODALES CORREGIDOS Y ROBUSTOS --- */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(9, 9, 11, 0.4); backdrop-filter: blur(8px); display: none; align-items: center; justify-content: center; z-index: 9999; opacity: 0; transition: opacity 0.3s; }
        .modal-overlay.active { display: flex; opacity: 1; }
        
        .modal-content { 
            background: var(--bg-panel); width: 100%; max-width: 580px; border-radius: var(--radius-lg); 
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); transform: scale(0.95); 
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); border: 1px solid var(--border-soft);
            max-height: 90vh; display: flex; flex-direction: column;
        }
        .modal-overlay.active .modal-content { transform: scale(1); }
        
        .modal-header { padding: 30px; border-bottom: 1px solid var(--border-soft); display: flex; justify-content: space-between; align-items: center; flex-shrink: 0;}
        .modal-header h2 { margin: 0; font-size: 1.5rem; font-weight: 800; letter-spacing: -0.5px;}
        .close-modal { background: #f4f4f5; border: none; width: 36px; height: 36px; border-radius: 50%; font-size: 1rem; color: var(--text-muted); cursor: pointer; transition: 0.2s; display: flex; align-items: center; justify-content: center;}
        .close-modal:hover { background: #e4e4e7; color: var(--text-main); transform: rotate(90deg);}
        
        .modal-body { padding: 30px; display: flex; flex-direction: column; gap: 20px; overflow-y: auto; }
        
        .form-group { display: flex; flex-direction: column; gap: 8px; width: 100%;}
        .form-group label { font-size: 0.85rem; font-weight: 700; color: var(--text-main); }
        
        /* Input base corregido con width 100% y box-sizing */
        .form-group input, .form-group select { 
            width: 100%; box-sizing: border-box; padding: 16px; border-radius: var(--radius-md); 
            border: 1px solid var(--border-soft); background: #fafafa; font-family: inherit; 
            outline: none; font-size: 1rem; color: var(--text-main); font-weight: 500; transition: 0.2s;
        }
        .form-group input:focus, .form-group select:focus { background: white; border-color: var(--text-main); box-shadow: 0 0 0 4px rgba(9,9,11,0.05); }
        
        /* Solución para el input con el signo $ que rompía todo */
        .input-with-icon { position: relative; display: flex; align-items: center; width: 100%; }
        .input-with-icon .currency-prefix { position: absolute; left: 16px; color: var(--text-muted); font-weight: 700; pointer-events: none;}
        .input-with-icon input { padding-left: 35px; width: 100%; }

        .profit-highlight { background: #f0fdf4 !important; color: #059669 !important; font-weight: 900 !important; font-size: 1.1rem !important; border-color: #a7f3d0 !important; pointer-events: none;}

        .modal-footer { padding: 25px 30px; background: #fafafa; border-top: 1px solid var(--border-soft); display: flex; justify-content: flex-end; gap: 12px; border-bottom-left-radius: var(--radius-lg); border-bottom-right-radius: var(--radius-lg); flex-shrink: 0;}

        /* Grid para inputs a la par */
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-layer-group"></i> All In Box
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-link active" onclick="switchView('dashboard', this)"><i class="fas fa-chart-pie"></i> Vista General</div>
            <div class="nav-link" onclick="switchView('categorias', this)"><i class="fas fa-tags"></i> Categorías</div>
            <div class="nav-link" onclick="switchView('productos', this)"><i class="fas fa-box"></i> Inventario</div>
            <div class="nav-link" onclick="switchView('ventas', this)"><i class="fas fa-shopping-bag"></i> Ventas & Ingresos</div>
        </nav>

        <div class="sidebar-user">
            <div class="user-avatar">A</div>
            <div class="user-info">
                <p>Administrador</p>
                <span>Panel de Control</span>
            </div>
        </div>
    </aside>

    <main class="main-content">
        
        <section id="view-dashboard" class="view-section active">
            <div class="page-header">
                <div>
                    <h1>Rendimiento Financiero</h1>
                    <p>Métricas actualizadas en tiempo real en Pesos Argentinos.</p>
                </div>
                <button class="btn-dark" onclick="switchView('ventas', document.querySelectorAll('.nav-link')[3])">
                    <i class="fas fa-plus"></i> Nueva Venta
                </button>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Operaciones Cerradas</h3>
                    <div class="value" id="dash-ventas">0</div>
                </div>
                <div class="stat-card highlight">
                    <h3>Ingresos Brutos</h3>
                    <div class="value price-tag">$ <span id="dash-ingresos">0</span></div>
                </div>
                <div class="stat-card profit">
                    <h3 style="color: var(--success);">Ganancia Neta Limpia</h3>
                    <div class="value profit-val price-tag">$ <span id="dash-ganancia">0</span></div>
                </div>
            </div>

            <h2 style="font-size: 1.2rem; font-weight: 800; margin-bottom: 20px;">Últimos Movimientos</h2>
            <div class="table-wrapper">
                <table>
                    <thead><tr><th>Fecha</th><th>Detalle</th><th>Canal</th><th>Ganancia</th></tr></thead>
                    <tbody id="dashboard-sales-table">
                        <tr><td colspan="4" style="text-align:center; color: var(--text-muted); padding: 40px;">Aún no has registrado ventas.</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="view-categorias" class="view-section">
            <div class="page-header">
                <div><h1>Líneas de Producto</h1><p>Organiza tu catálogo por categorías.</p></div>
                <button class="btn-primary" onclick="openModal('catModal')"><i class="fas fa-plus"></i> Crear Categoría</button>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead><tr><th>ID</th><th>Nombre de la Línea</th><th style="text-align:right;">Acción</th></tr></thead>
                    <tbody id="cat-table-body"></tbody>
                </table>
            </div>
        </section>

        <section id="view-productos" class="view-section">
            <div class="page-header">
                <div><h1>Base de Productos</h1><p>Controla costos, ventas, ganancias y stock actual.</p></div>
                <button class="btn-primary" onclick="openProductModal()"><i class="fas fa-plus"></i> Agregar Producto</button>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead><tr><th>Producto</th><th>Categoría</th><th>Stock</th><th>Costo</th><th>Venta</th><th>Profit/u</th><th style="text-align:right;">Acción</th></tr></thead>
                    <tbody id="prod-table-body"></tbody>
                </table>
            </div>
        </section>

        <section id="view-ventas" class="view-section">
            <div class="page-header">
                <div><h1>Historial de Ventas</h1><p>Registro de facturación. Al vender, el stock se descuenta solo.</p></div>
                <button class="btn-primary" onclick="openSaleModal()"><i class="fas fa-cash-register"></i> Registrar Operación</button>
            </div>
            <div class="table-wrapper">
                <table>
                    <thead><tr><th>Producto Vendido</th><th>Cant.</th><th>Origen</th><th>Monto Total</th><th>Ganancia Total</th></tr></thead>
                    <tbody id="sales-table-body"></tbody>
                </table>
            </div>
        </section>
    </main>

    <div class="modal-overlay" id="catModal">
        <div class="modal-content">
            <div class="modal-header"><h2>Nueva Categoría</h2><button class="close-modal" onclick="closeModal('catModal')"><i class="fas fa-times"></i></button></div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nombre de la Categoría</label>
                    <input type="text" id="catName" placeholder="Ej: Fundas, Cables, etc.">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-primary" onclick="saveCategory()">Guardar Categoría</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="prodModal">
        <div class="modal-content">
            <div class="modal-header"><h2>Alta de Producto</h2><button class="close-modal" onclick="closeModal('prodModal')"><i class="fas fa-times"></i></button></div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Nombre Exacto</label>
                    <input type="text" id="prodName" placeholder="Ej: iPhone 15 Pro Max 256GB">
                </div>
                
                <div class="form-group">
                    <label>Línea / Categoría</label>
                    <select id="prodCat"></select>
                </div>
                
                <div class="grid-2">
                    <div class="form-group">
                        <label>Costo de Compra</label>
                        <div class="input-with-icon">
                            <span class="currency-prefix">$</span>
                            <input type="number" id="prodCost" oninput="calcProfit()" placeholder="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Precio al Público</label>
                        <div class="input-with-icon">
                            <span class="currency-prefix">$</span>
                            <input type="number" id="prodSell" oninput="calcProfit()" placeholder="0">
                        </div>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Stock Inicial (Unidades)</label>
                        <input type="number" id="prodStock" placeholder="Ej: 10" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label>Ganancia Proyectada /u</label>
                        <div class="input-with-icon">
                            <span class="currency-prefix" style="color: #059669;">$</span>
                            <input type="text" id="prodProfit" class="profit-highlight" readonly value="0">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn-primary" onclick="saveProduct()">Guardar en Inventario</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="saleModal">
        <div class="modal-content">
            <div class="modal-header"><h2>Registrar Operación</h2><button class="close-modal" onclick="closeModal('saleModal')"><i class="fas fa-times"></i></button></div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Producto Vendido</label>
                    <select id="saleProd"></select>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label>Unidades</label>
                        <input type="number" id="saleQty" value="1" min="1">
                    </div>
                    <div class="form-group">
                        <label>Medio de Venta</label>
                        <select id="saleChannel">
                            <option value="WhatsApp">🟢 WhatsApp</option>
                            <option value="Local">🏬 Tienda Física</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-primary" style="background: var(--success); box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);" onclick="saveSale()">
                    <i class="fas fa-check-circle"></i> Confirmar Venta
                </button>
            </div>
        </div>
    </div>

    <script>
        // Formateador de moneda para Pesos Argentinos
        const formatMoney = (amount) => {
            return amount.toLocaleString('es-AR', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
        };

        // --- BASE DE DATOS SIMULADA ---
        let categories = [
            {id: 1, name: 'Smartphones'}, 
            {id: 2, name: 'Audio Premium'}
        ];
        
        let products = [
            {id: 1, name: 'iPhone 15 Pro Max 256GB', cat: 'Smartphones', cost: 1100000, sell: 1350000, profit: 250000, stock: 5},
            {id: 2, name: 'AirPods Pro (2ª Gen)', cat: 'Audio Premium', cost: 200000, sell: 280000, profit: 80000, stock: 12}
        ];
        
        let sales = [];

        // --- NAVEGACIÓN ---
        function switchView(viewId, element) {
            document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));
            document.getElementById('view-' + viewId).classList.add('active');
            element.classList.add('active');
            renderAll(); 
        }

        // --- MODALES ---
        function openModal(id) { document.getElementById(id).classList.add('active'); }
        function closeModal(id) { document.getElementById(id).classList.remove('active'); }

        // --- CÁLCULO DE GANANCIA (PRODUCTOS) ---
        function calcProfit() {
            let cost = parseFloat(document.getElementById('prodCost').value) || 0;
            let sell = parseFloat(document.getElementById('prodSell').value) || 0;
            let profit = sell - cost;
            document.getElementById('prodProfit').value = formatMoney(profit);
        }

        // --- FUNCIONES DE GUARDADO ---
        function saveCategory() {
            let name = document.getElementById('catName').value;
            if(!name) return alert("Ingresa un nombre");
            categories.push({id: Date.now(), name: name});
            document.getElementById('catName').value = '';
            closeModal('catModal');
            renderAll();
        }

        function openProductModal() {
            let catSelect = document.getElementById('prodCat');
            catSelect.innerHTML = categories.map(c => `<option value="${c.name}">${c.name}</option>`).join('');
            document.getElementById('prodName').value = '';
            document.getElementById('prodCost').value = '';
            document.getElementById('prodSell').value = '';
            document.getElementById('prodStock').value = '';
            document.getElementById('prodProfit').value = '0';
            openModal('prodModal');
        }

        function saveProduct() {
            let name = document.getElementById('prodName').value;
            let cat = document.getElementById('prodCat').value;
            let cost = parseFloat(document.getElementById('prodCost').value);
            let sell = parseFloat(document.getElementById('prodSell').value);
            let stock = parseInt(document.getElementById('prodStock').value);
            
            if(!name || !cost || !sell || isNaN(stock)) return alert("Por favor, completa todos los campos numéricos.");
            
            products.unshift({ id: Date.now(), name, cat, cost, sell, profit: sell - cost, stock });
            closeModal('prodModal');
            renderAll();
        }

        function deleteProduct(id) {
            if(confirm("¿Eliminar este producto permanentemente?")) {
                products = products.filter(p => p.id !== id);
                renderAll();
            }
        }

        function deleteCategory(id) {
            if(confirm("¿Eliminar esta categoría?")) {
                categories = categories.filter(c => c.id !== id);
                renderAll();
            }
        }

        function openSaleModal() {
            let prodSelect = document.getElementById('saleProd');
            if(products.length === 0) return alert("Primero debes crear productos en el Inventario.");
            // Mostrar también el stock en el selector
            prodSelect.innerHTML = products.map(p => `<option value="${p.id}">${p.name} (Stock: ${p.stock} | Venta: $${formatMoney(p.sell)})</option>`).join('');
            document.getElementById('saleQty').value = 1;
            openModal('saleModal');
        }

        function saveSale() {
            let prodId = parseInt(document.getElementById('saleProd').value);
            let qty = parseInt(document.getElementById('saleQty').value);
            let channel = document.getElementById('saleChannel').value; 
            
            let prod = products.find(p => p.id === prodId);

            // Validación de Stock
            if(qty > prod.stock) {
                alert(`¡Atención! No tienes stock suficiente. Solo quedan ${prod.stock} unidades de este producto.`);
                return;
            }

            // Descontar Stock automáticamente
            prod.stock -= qty;

            let totalFacturado = prod.sell * qty;
            let gananciaNeta = prod.profit * qty;

            let today = new Date().toLocaleDateString('es-AR', { day: '2-digit', month: 'short', hour: '2-digit', minute:'2-digit' });

            sales.unshift({ date: today, name: prod.name, qty, channel, total: totalFacturado, profit: gananciaNeta });
            closeModal('saleModal');
            
            // Efecto visual de ir al inicio
            switchView('dashboard', document.querySelectorAll('.nav-link')[0]);
        }

        // --- RENDERS AUTOMÁTICOS ---
        function renderAll() {
            // Categorias
            document.getElementById('cat-table-body').innerHTML = categories.map(c => `
                <tr>
                    <td style="color: var(--text-muted);">#${c.id.toString().slice(-4)}</td>
                    <td><strong>${c.name}</strong></td>
                    <td><div class="action-btns"><button class="btn-icon btn-delete" onclick="deleteCategory(${c.id})"><i class="fas fa-trash"></i></button></div></td>
                </tr>
            `).join('');

            // Productos (Añadido Stock a la vista)
            document.getElementById('prod-table-body').innerHTML = products.map(p => {
                let stockClass = p.stock > 3 ? 'stock-badge' : (p.stock > 0 ? 'stock-badge stock-low' : 'stock-badge stock-out');
                return `
                <tr>
                    <td><strong>${p.name}</strong></td>
                    <td>${p.cat}</td>
                    <td><span class="${stockClass}">${p.stock} un.</span></td>
                    <td class="price-tag">$ ${formatMoney(p.cost)}</td>
                    <td class="price-tag" style="color: var(--primary);">$ ${formatMoney(p.sell)}</td>
                    <td><span class="profit-tag">+ $ ${formatMoney(p.profit)}</span></td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-icon btn-delete" onclick="deleteProduct(${p.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            `}).join('');

            // Ventas
            let salesHtml = sales.map(s => {
                let badgeClass = s.channel === 'WhatsApp' ? 'type-wsp' : 'type-local';
                let icon = s.channel === 'WhatsApp' ? '<i class="fab fa-whatsapp"></i>' : '<i class="fas fa-store"></i>';
                return `<tr>
                    <td><strong>${s.name}</strong></td>
                    <td>x${s.qty}</td>
                    <td><span class="badge-type ${badgeClass}">${icon} ${s.channel}</span></td>
                    <td class="price-tag">$ ${formatMoney(s.total)}</td>
                    <td><span class="profit-tag">+ $ ${formatMoney(s.profit)}</span></td>
                </tr>`;
            }).join('');
            document.getElementById('sales-table-body').innerHTML = salesHtml || `<tr><td colspan="5" style="text-align:center; padding: 40px; color: var(--text-muted);">Aún no hay ventas registradas.</td></tr>`;
            
            // Dashboard Table (Últimas 5)
            document.getElementById('dashboard-sales-table').innerHTML = sales.slice(0,5).map(s => {
                let badgeClass = s.channel === 'WhatsApp' ? 'type-wsp' : 'type-local';
                let icon = s.channel === 'WhatsApp' ? '<i class="fab fa-whatsapp"></i>' : '<i class="fas fa-store"></i>';
                return `<tr>
                    <td style="color: var(--text-muted); font-size:0.85rem;">${s.date}</td>
                    <td><strong>${s.name}</strong> <span style="color:var(--text-muted)">x${s.qty}</span></td>
                    <td><span class="badge-type ${badgeClass}">${icon} ${s.channel}</span></td>
                    <td><span class="profit-tag">+ $ ${formatMoney(s.profit)}</span></td>
                </tr>`;
            }).join('') || `<tr><td colspan="4" style="text-align:center; padding: 40px; color: var(--text-muted);">No hay actividad reciente.</td></tr>`;

            // Dashboard Stats
            let totalVentas = sales.length;
            let ingresosTotales = sales.reduce((sum, s) => sum + s.total, 0);
            let gananciaTotal = sales.reduce((sum, s) => sum + s.profit, 0);

            document.getElementById('dash-ventas').innerText = totalVentas;
            document.getElementById('dash-ingresos').innerText = formatMoney(ingresosTotales);
            document.getElementById('dash-ganancia').innerText = formatMoney(gananciaTotal);
        }

        // Init
        renderAll();
    </script>
</body>
</html>