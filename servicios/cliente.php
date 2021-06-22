<?php  
    $nombre = $_GET["nombre"];
    $cedula = $_GET["cedula"];
    $usuario = $_GET["usuario"];
    $contra = $_GET["contra"];
    $email = $_GET["email"];
    $telefono = $_GET["telefono"];
    $direccion = $_GET["direccion"];

    $cliente = new SoapClient('http://localhost/TiendaS/servicios/wdsl.xml');
    try {
        $r = $cliente->insertar($nombre,$cedula,$usuario,$contra,$email,$telefono,$direccion);
        if ($r) {
            echo "Insertado Correctamente";
        }else{
            echo "Insertado No Correctamente";
        }
    } catch (SoapFault $e) {
        echo $e->getMessage().PHP_EOL;
    } 
?>