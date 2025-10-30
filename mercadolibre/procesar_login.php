<?php
session_start();

if (!empty($_POST['txtUsuario']) && !empty($_POST['txtContrasena'])) {
    $usuario    = htmlspecialchars($_POST['txtUsuario']);
    $contrasena = htmlspecialchars($_POST['txtContrasena']);

    try {
        $cliente = new SoapClient(null, [
            'uri'      => 'http://localhost:8080/',
            'location' => 'http://localhost:8080/progweb/1erseg/ExamenU2/servicioweb/servicioweb.php'
        ]);

        $datos = $cliente->sp_Acceso($usuario, $contrasena);

        if ((int)$datos[0]["BAN"] != 0) {
            // Login exitoso
            $_SESSION['cveUsuario'] = $datos[1]["CVE"];
            $_SESSION['nomUsuario'] = $datos[2]["NOM"];
            $_SESSION['usuUsuario'] = $datos[3]["USU"];
            $_SESSION['rolNombre']  = $datos[4]["ROL"];
            $_SESSION['mensajeBienvenida'] = "Bienvenido " . $_SESSION['nomUsuario'] . "!";

            header("Location: inicio.php");
            exit;
        } else {
            $_SESSION['mensajeError'] = "Acceso Denegado: Usuario o contraseña incorrectos";
            header("Location: acceso.php");
            exit;
        }

    } catch (Exception $e) {
        $_SESSION['mensajeError'] = "Error al conectar con el servicio web: " . $e->getMessage();
        header("Location: acceso.php");
        exit;
    }
} else {
    $_SESSION['mensajeError'] = "Debe completar todos los campos";
    header("Location: acceso.php");
    exit;
}
