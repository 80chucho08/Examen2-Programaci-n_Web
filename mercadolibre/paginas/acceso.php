
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso - MercadoApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f5f5; font-family: 'Helvetica Neue', Arial, sans-serif; }
        .login-container {
            max-width: 420px; margin: 80px auto; background-color: #fff;
            border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;
        }
        .login-header { background-color: #FFE600; color: #333; text-align: center; padding: 1.2rem; font-weight: 700; font-size: 1.3rem; }
        .form-control:focus { border-color: #3483FA; box-shadow: 0 0 0 0.25rem rgba(52,131,250,0.25); }
        .btn-primary { background-color: #3483FA; border-color: #3483FA; font-weight: 600; }
        .btn-primary:hover { background-color: #296de8; }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">Acceso al Sistema</div>
    <div class="p-4">

        <?php
        if (isset($_SESSION['mensajeError'])) {
            echo '<div class="alert alert-danger">'. $_SESSION['mensajeError'] .'</div>';
            unset($_SESSION['mensajeError']);
        }
        ?>

        <form id="frmAcceso" method="POST" action="procesar_login.php">
            <div class="mb-3">
                <label for="txtUsuario" class="form-label fw-semibold">Usuario</label>
                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Nombre de usuario" required>
            </div>

            <div class="mb-3">
                <label for="txtContrasena" class="form-label fw-semibold">Contraseña</label>
                <input type="password" name="txtContrasena" id="txtContrasena" class="form-control" placeholder="Contraseña" required>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                <a href="inicio.php" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
