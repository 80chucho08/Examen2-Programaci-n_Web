<?php


$usuario = "";
$contrasena = "";

// Verifica que lleguen los datos del formulario
if (!empty($_POST['txtUsuario']) && !empty($_POST['txtContrasena'])) {
    $usuario    = htmlspecialchars($_POST['txtUsuario']);
    $contrasena = htmlspecialchars($_POST['txtContrasena']);

    try {
        // Conecta con el servicio web
        $cliente = new SoapClient(null, [
            'uri'      => 'http://localhost:8080/',
            'location' => 'http://localhost:8080/progweb/1erseg/practica5/servicioweb/servicioweb.php'
        ]);

        // Ejecuta el método de acceso
        $datos = $cliente->sp_Acceso($usuario, $contrasena);

        if ((int)$datos[0]["BAN"] != 0) {
            // Usuario válido: asigna sesión sin condicionales
            $_SESSION['cveUsuario'] = $datos[1]["CVE"];
            $_SESSION['nomUsuario'] = $datos[2]["NOM"]; // ahora sí guarda el nombre
            $_SESSION['usuUsuario'] = $datos[3]["USU"];
            $_SESSION['rolNombre']  = $datos[4]["ROL"];

            // Guarda un mensaje de bienvenida en sesión para mostrar en inicio.php
            $_SESSION['mensajeBienvenida'] = "Bienvenido " . $_SESSION['nomUsuario'] . "!";

            // Redirecciona a inicio.php
            header("Location: inicio.php");
            exit;

        } else {
            // Usuario no encontrado: limpia sesión
            session_unset();
            session_destroy();

            $_SESSION['mensajeError'] = "Acceso Denegado";
            header("Location: inicio.php?op=acceso");
            exit;
        }

    } catch (Exception $e) {
        // Manejo de error por falla en el servicio web
        $_SESSION['mensajeError'] = "Error al conectar con el servicio web: " . $e->getMessage();
        header("Location: inicio.php?op=acceso");
        exit;
    }
}
?>


<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!--se agrega un link para acceder a los archivos compilados y comprimidos de bootstratp-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<form id="frmAcceso" method="POST">

		<div class="container">
			<table width="800px" align="center">
				<tr>
					<td>
						<table align="center">
							<tr rowspan="3">
								<td colspan="2" align="center">
									<hr style="color:#102C54" />
								</td>
							</tr>
							<tr rowspan="3">
								<td colspan="2" align="center">
									<h1>Consumir servicio Web</h1>
								</td>
							</tr>
							<tr>
								<td colspan="2"><br /></td>
							</tr>
							<tr>
								<td>Usuario:</td>
								<td>
									<input type="text" name="txtUsuario" class="form-control" placeholder="Nombre de usuario">
								</td>
							</tr>
							<tr>
								<td>Contraseña:</td>
								<td>
									<input type="text" name="txtContrasena" class="form-control" placeholder="Nombre de usuario">
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center"><br>
									<input type="submit" value="Aceptar" class="btn btn-primary">
									<input type="button" value="Cancelar" class="btn btn-primary">
								</td>
							</tr>
							<tr rowspan="3">
								<td colspan="2" align="center">
									<hr style="color:#102C54" />
								</td>
							</tr>
						</table>
					</td>
					<td>
					</td>
				</tr>
			</table>
		</div>
	</form>
</body>

</html>