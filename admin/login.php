<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | All In Box</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #0f172a; 
            --primary-hover: #1e293b;
            --accent: #0f62fe;
            --bg-surface: #ffffff;
            --text-dark: #09090b;
            --text-muted: #71717a;
            --border-color: #e4e4e7;
            --input-bg: #fafafa;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body { 
            font-family: 'Inter', sans-serif; 
            min-height: 100vh; 
            display: flex;
            background-color: var(--bg-surface);
            -webkit-font-smoothing: antialiased;
        }

        /* --- PANTALLA DIVIDIDA --- */
        .split-layout {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Lado Izquierdo (Branding & Arte) */
        .brand-section {
            width: 45%;
            background-color: var(--primary);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 60px;
            color: white;
        }

        /* Esfera animada de fondo */
        .glowing-orb {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(15, 98, 254, 0.15) 0%, transparent 60%);
            border-radius: 50%;
            filter: blur(80px);
            animation: pulse 8s ease-in-out infinite alternate;
            z-index: 1;
        }

        @keyframes pulse {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 0.8; }
            100% { transform: translate(-50%, -50%) scale(1.2); opacity: 1; }
        }

        .brand-content { position: relative; z-index: 2; }
        
        .logo-area { display: flex; align-items: center; gap: 12px; font-size: 1.8rem; font-weight: 900; letter-spacing: -1px; }
        .logo-area i { color: var(--accent); font-size: 2rem; }

        .brand-text { position: relative; z-index: 2; max-width: 450px; }
        .brand-text h1 { font-size: 2.8rem; font-weight: 800; line-height: 1.1; margin-bottom: 20px; letter-spacing: -1px;}
        .brand-text p { font-size: 1.1rem; color: #94a3b8; line-height: 1.6; }

        /* Lado Derecho (Formulario) */
        .form-section {
            width: 55%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: var(--bg-surface);
        }

        .form-container {
            width: 100%;
            max-width: 420px;
        }

        /* Animaciones de entrada en cascada */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUpAnim 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }

        @keyframes fadeUpAnim {
            to { opacity: 1; transform: translateY(0); }
        }

        .form-header { margin-bottom: 40px; }
        .form-header h2 { font-size: 2rem; font-weight: 800; color: var(--text-dark); margin-bottom: 8px; letter-spacing: -0.5px;}
        .form-header p { color: var(--text-muted); font-size: 1rem; }

        /* --- FLOATING LABELS (Estilo Premium) --- */
        .floating-input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .floating-input-group input {
            width: 100%;
            padding: 24px 16px 8px 16px; /* Espacio arriba para el label */
            border-radius: 12px;
            border: 1px solid var(--border-color);
            background-color: var(--input-bg);
            font-family: inherit;
            font-size: 1rem;
            color: var(--text-dark);
            outline: none;
            transition: all 0.2s ease;
        }

        .floating-input-group input:focus {
            background-color: var(--bg-surface);
            border-color: var(--text-dark);
            box-shadow: 0 0 0 4px rgba(9, 9, 11, 0.05);
        }

        .floating-input-group label {
            position: absolute;
            left: 16px;
            top: 16px;
            font-size: 1rem;
            color: var(--text-muted);
            pointer-events: none;
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Magia del Floating Label */
        .floating-input-group input:focus ~ label,
        .floating-input-group input:not(:placeholder-shown) ~ label {
            top: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Opciones extra */
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        .remember-me { display: flex; align-items: center; gap: 8px; color: var(--text-dark); cursor: pointer; font-weight: 500;}
        .remember-me input { accent-color: var(--text-dark); width: 16px; height: 16px; cursor: pointer; }
        
        .forgot-pass { color: var(--text-muted); text-decoration: none; font-weight: 500; transition: 0.2s; }
        .forgot-pass:hover { color: var(--text-dark); text-decoration: underline; }

        /* Botón Submit Animado */
        .btn-submit {
            width: 100%;
            background: var(--text-dark);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: inherit;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        
        .btn-submit i { transition: transform 0.3s ease; }
        .btn-submit:hover { background: #18181b; transform: translateY(-2px); box-shadow: 0 10px 25px rgba(9, 9, 11, 0.2); }
        .btn-submit:hover i { transform: translateX(5px); } /* La flecha se mueve al pasar el mouse */

        .back-to-store {
            display: block;
            text-align: center;
            margin-top: 40px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: 0.2s;
        }
        .back-to-store:hover { color: var(--text-dark); }

        /* --- RESPONSIVE --- */
        @media (max-width: 992px) {
            .brand-section { display: none; } /* Ocultamos el lado oscuro en móviles */
            .form-section { width: 100%; padding: 20px; }
        }
    </style>
</head>
<body>

<div class="split-layout">
    
    <div class="brand-section">
        <div class="glowing-orb"></div>
        
        <div class="brand-content logo-area">
            <i class="fas fa-box-open"></i>
            <div>All In Box</div>
        </div>

        <div class="brand-text">
            <h1>Control total<br>de tu ecosistema.</h1>
            <p>Accede al panel de administración centralizado. Gestiona inventario, procesa ventas y analiza métricas en tiempo real con una interfaz diseñada para la velocidad.</p>
        </div>
    </div>

    <div class="form-section">
        <div class="form-container">
            
            <div class="form-header fade-up">
                <h2>Acceso al sistema</h2>
                <p>Ingresa tus credenciales para continuar.</p>
            </div>
            
            <form action="productos.php" method="POST">
                
                <div class="floating-input-group fade-up delay-1">
                    <input type="email" id="email" placeholder=" " required autocomplete="off">
                    <label for="email">Correo electrónico</label>
                </div>
                
                <div class="floating-input-group fade-up delay-2">
                    <input type="password" id="password" placeholder=" " required>
                    <label for="password">Contraseña</label>
                </div>

                <div class="options-row fade-up delay-3">
                    <label class="remember-me">
                        <input type="checkbox"> Recordar sesión
                    </label>
                    <a href="#" class="forgot-pass">¿Olvidaste tu clave?</a>
                </div>

                <button type="submit" class="btn-submit fade-up delay-4">
                    Ingresar al Panel <i class="fas fa-arrow-right"></i>
                </button>

            </form>

            <a href="../index.php" class="back-to-store fade-up delay-4">
                <i class="fas fa-arrow-left"></i> Volver a la tienda
            </a>

        </div>
    </div>

</div>

</body>
</html>