<?php

class miClase{
    function insertar($nombre,$cedula,$usuario,$contra,$email,$telefono,$direccion):int{
        include("../config/conexion.php");
        return $db->query("insert into clientes values ('','$nombre','$cedula','$usuario','$contra','$email','$telefono','$direccion');");
    }
}
try {
    $server = new SoapServer("http://localhost/TiendaS/servicios/wdsl.xml");
    $server->setClass('miClase');
    $server->handle();
} catch (SoapFault $e) {
    print $e->faultstring;
}

?>