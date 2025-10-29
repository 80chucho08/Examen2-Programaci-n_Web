<?php
$totalProductos = 6; // Número de productos por renglón

try {
    // Conexión SOAP al servicio
    $cliente = new SoapClient(null, array(
        'uri' => 'http://localhost:8080/',
        'location' => 'http://localhost:8080/progweb/1erseg/ExamenU2/servicioweb/servicioweb.php'
    ));

    // Llamada al método que obtiene los productos activos
    $consulta = $cliente->vwRptProducto();
} catch (SoapFault $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Bootstrap CSS -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tituloCardCompra { margin-top: 10px; }
        .gray { color: gray; }
        .black { color: black; }
    </style>
</head>
<body>
<main class="container py-4">
    <form name="frmProductos" method="POST">
        <div class="container">
            <table class="table table-borderless">
                <tr>
                    <td colspan="3" style="text-align:left;">
                        <strong>Productos disponibles:</strong>
                        <br><br><br>
                    </td>
                    <td colspan="3" style="text-align:right;">
                        <a href='?op=bienvenida' title='Regresar al inicio'>Regresar a inicio ...</a>
                        <br><br><br>
                    </td>
                </tr>

                <?php
                $i = 0;
                for ($rr = 0; $rr < count($consulta); $rr++) {
                    if ($i == 0) echo "<tr>";

                    echo "<td style='text-align:center;'>";
                        // Enlace a una posible página de detalle
                        echo "<a href='detalleproducto.php?idprod=".$consulta[$rr]['PRO_CVE']."'>";
                        echo "<img src='".$consulta[$rr]['PRO_FOTO']."' width='140px' height='100px' style='border-radius:10px;' />";
                        echo "<h5 class='black tituloCardCompra'><b>".$consulta[$rr]['PRO_NOMBRE']."</b></h5>";
                        echo "<p class='gray'>".$consulta[$rr]['PRO_DESCRIPCION']."</p>";
                        echo "<p class='gray'>Categoría: ".$consulta[$rr]['PRO_CATEGORIA']."</p>";
                        echo "<p class='gray'>Stock: ".$consulta[$rr]['PRO_CANTIDAD']."</p>";
                        echo "<h6 class='black'><b>$".$consulta[$rr]['PRO_PRECIO']."</b></h6>";
                        echo "</a>";
                    echo "</td>";

                    $i++;
                    if ($i == $totalProductos) {
                        echo "</tr>";
                        $i = 0;
                    }
                }
                // Si quedan celdas sin cerrar
                if ($i != 0) echo "</tr>";
                ?>
            </table>
        </div>
    </form>
</main>

<!-- Bootstrap JS -->
<script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
