<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Admin | All In Box</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #0f172a; --bg-main: #f8f9fa; --bg-surface: #ffffff; --text-dark: #111827; --text-muted: #6b7280; --border-color: #e5e7eb; --radius-lg: 16px; }
        body { background: var(--bg-main); font-family: 'Inter', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px;}
        .auth-card { background: var(--bg-surface); width: 100%; max-width: 450px; padding: 40px; border-radius: var(--radius-lg); box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid var(--border-color); text-align: center; }
        .auth-card h2 { margin: 0 0 10px 0; font-size: 1.8rem; font-weight: 800; color: var(--text-dark); }
        .auth-card p { color: var(--text-muted); font-size: 0.95rem; margin-bottom: 30px; }
        .input-row { display: flex; gap: 15px; } /* Para poner nombre y apellido a la par */
        .input-group { margin-bottom: 20px; text-align: left; flex: 1;}
        .input-group label { display: block; font-size: 0.85rem; font-weight: 600; color: var(--text-dark); margin-bottom: 8px; }
        .input-group input { width: 100%; padding: 14px 16px; border-radius: 8px; border: 1px solid var(--border-color); font-family: inherit; font-size: 0.95rem; outline: none; transition: 0.2s; box-sizing: border-box;}
        .input-group input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.1); }
        .btn-submit { width: 100%; background: var(--primary); color: white; padding: 14px; border: none; border-radius: 8px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: 0.3s; margin-top: 10px; font-family: inherit;}
        .btn-submit:hover { background: #1e293b; transform: translateY(-2px); box-shadow: 0 8px 15px rgba(0,0,0,0.1); }
        .auth-links { margin-top: 25px; font-size: 0.85rem; color: var(--text-muted); }
        .auth-links a { color: #0f62fe; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>

<div class="auth-card">
    <h2>Crear Cuenta</h2>
    <p>Registra un nuevo perfil administrativo</p>
    
    <form action="login.php" method="POST">
        <div class="input-row">
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" placeholder="Ej: Juan" required>
            </div>
            <div class="input-group">
                <label>Apellido</label>
                <input type="text" placeholder="Ej: Pérez" required>
            </div>
        </div>
        <div class="input-group">
            <label>Correo Electrónico</label>
            <input type="email" placeholder="juan@allinbox.com" required>
        </div>
        <div class="input-group">
            <label>Contraseña</label>
            <input type="password" placeholder="Mínimo 8 caracteres" required>
        </div>
        <button type="submit" class="btn-submit">Registrar Usuario</button>
    </form>
    
    <div class="auth-links">
        ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
    </div>
</div>

</body>
</html>