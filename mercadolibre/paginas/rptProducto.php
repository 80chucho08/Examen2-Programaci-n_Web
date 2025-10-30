<?php
$totalProductos = 6; // Número de productos por fila

try {
    $cliente = new SoapClient(null, array(
        'uri' => 'http://localhost:8080/',
        'location' => 'http://localhost:8080/progweb/1erseg/ExamenU2/servicioweb/servicioweb.php'
    ));
    $consulta = $cliente->vwRptProducto();
} catch (SoapFault $e) {
    echo "<div class='alert alert-danger m-5'>Error al conectar con el servicio: {$e->getMessage()}</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos | MercadoWeb</title>
  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: "Poppins", sans-serif;
    }

    .producto-card {
      transition: transform 0.2s ease, box-shadow 0.3s ease;
      border: none;
      border-radius: 1rem;
    }

    .producto-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 0.8rem 1.5rem rgba(0, 0, 0, 0.1);
    }

    .producto-card img {
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      height: 160px;
      object-fit: cover;
    }

    .precio {
      color: #333;
      font-weight: bold;
      font-size: 1.1rem;
    }

    .btn-comprar {
      background-color: #fff159;
      color: #000;
      font-weight: 600;
      border-radius: 0.5rem;
      transition: all 0.2s ease;
      border: 1px solid #fff159;
    }

    .btn-comprar:hover {
      background-color: #ffe03b;
      border-color: #ffd500;
    }

    .titulo-seccion {
      color: #333;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .volver {
      text-decoration: none;
      font-weight: 500;
      color: #007bff;
    }

    .volver:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<main class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="titulo-seccion">
      <i class="bi bi-bag"></i> Productos disponibles
    </h2>
    <a href="?op=bienvenida" class="volver">
      <i class="bi bi-arrow-left-circle"></i> Regresar al inicio
    </a>
  </div>

  <div class="row g-4">
    <?php foreach ($consulta as $producto): ?>
      <div class="col-6 col-md-4 col-lg-2">
        <div class="card producto-card h-100">
          <img src="<?= $producto['PRO_FOTO'] ?>" alt="<?= $producto['PRO_NOMBRE'] ?>" class="card-img-top">
          <div class="card-body text-center">
            <h6 class="fw-bold text-truncate"><?= $producto['PRO_NOMBRE'] ?></h6>
            <p class="text-muted small mb-1"><?= $producto['PRO_DESCRIPCION'] ?></p>
            <div class="precio mb-2">$<?= $producto['PRO_PRECIO'] ?></div>
            <a href="detalleproducto.php?idprod=<?= $producto['PRO_CVE'] ?>" class="btn btn-comprar w-100">
              Ver detalle
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

