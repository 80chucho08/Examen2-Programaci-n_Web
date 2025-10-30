<?php
// Detecta la página actual para marcar el link activo automáticamente
$current = basename($_SERVER['PHP_SELF']);
function isActive($page, $current) { return $page === $current ? 'active' : ''; }

$imagenUsuario = 'imagenes/usuarios/usuUser.png'; // valor por defecto

if (isset($_SESSION['rolNombre'])) {
    $rol = strtoupper(trim($_SESSION['rolNombre'])); // normaliza el texto

    if ($rol === 'ADMINISTRADOR' || $rol === '1') {
        $imagenUsuario = 'imagenes/usuarios/usuAdmin.png';
    } else {
        $imagenUsuario = 'imagenes/usuarios/usuUser.png';
    }
}
?>

<!-- Bootstrap 5 -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/icons/bootstrap-icons.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm mlibre-nav">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="inicio.php">
      <img src="imagenes/mercadolibre.jpg" alt="Mercado Libre" width="40" height="40" class="me-2 logo-mlibre">
      <span class="fw-bold text-dark">Mercado Web</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pfNavbar"
            aria-controls="pfNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="pfNavbar">
      <ul class="navbar-nav ms-auto align-items-lg-center mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link nav-hover <?= isActive('inicio.php',$current) ?>" href="inicio.php">
            <i class="bi bi-house-door me-1"></i>Inicio
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-hover <?= isActive('rptProducto.php',$current) ?>" href="inicio.php?op=rptProducto">
            <i class="bi bi-grid me-1"></i>Productos
          </a>
        </li>


        <?php if (isset($_SESSION['nomUsuario'])): ?>
        <li class="nav-item d-flex align-items-center ms-3 text-dark user-info">
          <img src="<?= $imagenUsuario ?>" alt="usuario" class="rounded-circle me-2 border border-2 border-warning" width="40" height="40">
          <div class="d-flex flex-column">
            <small><strong><?= $_SESSION['nomUsuario'] ?></strong></small>
            <small class="text-muted">(<?= $_SESSION['usuUsuario'] ?> – <?= $_SESSION['rolNombre'] ?>)</small>
          </div>
        </li>

        <li class="nav-item ms-3">
          <a class="btn btn-outline-dark fw-semibold btn-anim" href="inicio.php?op=cerrarsesion">
            <i class="bi bi-box-arrow-right me-1"></i>Salir
          </a>
        </li>
        <?php endif; ?>

        

      </ul>
    </div>
  </div>
</nav>

<style>
  /* ==== Estilo Mercado Libre con transiciones ==== */
  .mlibre-nav {
    background-color: #fff159;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    transition: all 0.3s ease-in-out;
  }

  .navbar-brand span {
    color: #333 !important;
    font-size: 1.2rem;
  }

  .nav-link {
    color: #333 !important;
    font-weight: 500;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
  }

  /* Efecto hover tipo deslizante con sombra */
  .nav-hover::after {
    content: "";
    position: absolute;
    left: 0; bottom: 0;
    width: 100%; height: 3px;
    background-color: #3483fa;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform 0.3s ease;
  }
  .nav-hover:hover::after {
    transform: scaleX(1);
    transform-origin: left;
  }

  .nav-hover:hover {
    color: #3483fa !important;
    transform: translateY(-2px);
  }

  /* Botón Mercado Libre */
  .btn-mlibre {
    background-color: #3483fa;
    color: #fff;
    border-radius: 8px;
    border: none;
    transition: all 0.3s ease;
  }
  .btn-mlibre:hover {
    background-color: #2a6fd0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    transform: scale(1.05);
  }

  /* Animación para botones */
  .btn-anim {
    transition: all 0.25s ease;
  }
  .btn-anim:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  }

  /* Logo animado */
  .logo-mlibre {
    border-radius: 50%;
    transition: transform 0.5s ease;
  }
  .logo-mlibre:hover {
    transform: rotate(10deg) scale(1.05);
  }

  /* Avatar usuario */
  .user-info img {
    transition: transform 0.3s ease;
  }
  .user-info img:hover {
    transform: scale(1.1);
  }
</style>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
