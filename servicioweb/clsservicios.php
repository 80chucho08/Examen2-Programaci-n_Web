<?php

// NOMBRE DE LA CLASE 
class clsservicios
{

    // PROGRAMACIÓN DE MÉTODOS
    public function sp_Acceso($usu, $pwd)
    {

        // Se estructura el comando SQL para ejecutar 
        $cmdSql = "call sp_Acceso('$usu','$pwd');";

        // -------------------------------------------------
        // Variable para recepción de estatus+datos
        $datos = array();

        if ($conn = mysqli_connect("localhost", "root", "", "bd_almacen")) {
            // mysqli_connect("localhost", "root", "", "bd_prosoft")
            // Ejecución del comando SQL y recibir resultados (recordset)
            $renglon = mysqli_query($conn, $cmdSql);

            if (mysqli_num_rows($renglon) > 0) {
                // Ciclo para lectura de registros
                while ($resultado = mysqli_fetch_assoc($renglon)) {
                    $datos[0]["BAN"] = $resultado["usu_ban"];
                    if ($datos[0]["BAN"] == "1") {
                        // El usuario existe en BD, extraer los demás datos
                        $datos[1]["CVE"] = $resultado["usu_cve_usuario"];
                        $datos[2]["NOM"] = $resultado["usu_nombre"] . ' ' . $resultado["usu_apellido_paterno"] . ' ' . $resultado["usu_apellido_materno"];
                        $datos[3]["USU"] = $resultado["usu_usuario"];
                        $datos[4]["ROL"] = $resultado["rol_nombre"];
                    }
                }
            } else
                $datos[0]["BAN"] = "0";

            // Cerrar conexión
            mysqli_close($conn);
        }
        // Retornar el arreglo formateado y con los datos de resultado
        return $datos;
    }
    // -------------------------



    // // VISTA vwRptProducto
    public function vwRptProducto()
    {
        // Variable para recepción de estatus+datos
        $datos = array();

        // Comando SQL que ejecuta la vista
        $cmdSql = "SELECT * FROM vwRtpProducto;";

        $i = 0; // variable para controlar los registros del arreglo

        // Conexión con la base de datos
        if ($conn = mysqli_connect("localhost", "root", "", "bd_almacen")) {

            // Ejecutar la consulta
            $renglon = mysqli_query($conn, $cmdSql);

            // Ciclo para leer los resultados de la vista
            while ($resultado = mysqli_fetch_assoc($renglon)) {
                $datos[$i]["PRO_CVE"] = $resultado["PRO_CVE"];
                $datos[$i]["PRO_NOMBRE"] = $resultado["PRO_NOMBRE"];
                $datos[$i]["PRO_DESCRIPCION"] = $resultado["PRO_DESCRIPCION"];
                $datos[$i]["PRO_PRECIO"] = $resultado["PRO_PRECIO"];
                $datos[$i]["PRO_CANTIDAD"] = $resultado["PRO_CANTIDAD"];
                $datos[$i]["PRO_FOTO"] = $resultado["PRO_FOTO"];
                $datos[$i]["PRO_CATEGORIA"] = $resultado["PRO_CATEGORIA"];
                $i++;
            }

            // Cerrar la conexión
            mysqli_close($conn);
        }

        // Retornar los datos obtenidos
        return $datos;
    }
}
