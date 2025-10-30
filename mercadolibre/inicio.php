<?php
// Iniciar sesión si no está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Detectar qué página cargar
$pagina = isset($_GET['op']) ? strtolower($_GET['op']) : 'bienvenida';

// Incluir el menú
require_once 'paginas/menu.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercadoWeb - Programación Web</title>

    <!-- Bootstrap 5 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            font-family: "Poppins", sans-serif;
        }

        /* Banner superior estilo Mercado Libre */
        .ml-banner {
            background-color: #fff159;
            color: #000;
            text-align: center;
            padding: 0.5rem 0;
            font-weight: 500;
            font-size: 1rem;
            letter-spacing: 0.3px;
        }

        .ml-banner img {
            height: 35px;
            margin-right: 8px;
            vertical-align: middle;
        }

        main {
            min-height: 70vh;
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
            margin-top: 1.5rem;
            padding: 2rem;
        }
    </style>
</head>

<body>
    <!-- Banner Mercado Libre -->
    <div class="ml-banner shadow-sm">
        Bienvenido a <strong>MercadoWeb</strong> – Tu portal de productos
    </div>

    <main class="container py-4">
        <?php
        // Cargar la página dinámica
        require_once 'paginas/' . $pagina . '.php';
        ?>
    </main>

    <!-- Pie de página -->
    <?php require_once 'paginas/piepag.php'; ?>

    <!-- Scripts -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
