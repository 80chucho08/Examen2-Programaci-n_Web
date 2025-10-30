<?php

    session_start();
    session_unset();     // limpia variables de sesión
    session_destroy();   // destruye la sesión	

    echo "<script language='javascript'>alert('Sesion cerrada exitosamente'); document.location.href='inicio.php?op=acceso';</script>";

?>