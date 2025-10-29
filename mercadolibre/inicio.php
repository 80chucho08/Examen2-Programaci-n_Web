<?php
// INICIAR EL USO DE SESION DEL USUARIO
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//isset verifica que exista la variable op, posteriormente se convierte
//todo a minúsculas
$pagina = isset($_GET['op']) ? strtolower($_GET['op']) : 'bienvenida';
//echo $pagina; 

//se genera la sección del menú
require_once 'paginas/menu.php';

/*en esta sección se mostrarán las páginas que van a cambiar en esta sección
	  donde $pagina tiene el nombre de la página que se va acceder, esto se hace
	  para evitar un switch-case*/
?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


<main class="container py-4">
    <?php
    require_once 'paginas/' . $pagina . '.php';
    ?>
</main>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<?php
//se crea la sección del pie de página
require_once 'paginas/piepag.php';
?>