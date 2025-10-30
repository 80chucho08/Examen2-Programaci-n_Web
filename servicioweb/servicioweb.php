<?php
  //SE COLOCA EL NOMBRE DE LA PÁGINA QUE CONTIENE LOS MÉTODOS DEL SERVICIO WEB
  require_once 'clsservicios.php';

  //SE HACE USO DEL PROTOCOLO SOAPSERVER PARA ESTABLECER LA CONEXIÓN CON EL HOSTING
  $soap=new SoapServer(null,array('uri' => 'http://localhost:8080/'));
  //SE EJECUTA LA CLASE QUE CONTIENE LOS MÉTODOS
  $soap->setClass('clsservicios');
  //SE EJECUTA LA CLASE
  $soap->handle();
?>