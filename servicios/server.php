<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php

class miClase{
    function insertar($nombre,$cedula,$usuario,$contra,$email,$telefono,$direccion):int{
        include("../config/conexion.php");
        return $db->query("insert into clientes values ('','$nombre','$cedula','$usuario','$contra','$email','$telefono','$direccion');");
    }
    function consultarTodos():string{
        include "../conectar/conectar.php";
        $r = $db->query("select * from clientes;");
        $html="";
        while($row = $r->fetch_assoc()){
            $html="
            <tbody>
            <tr>
            <td>".$row['id']."</td>
            <td>".$row['nombre']."</td>
            <td>".$row['apellido']."</td>
            <td>".$row['edad']."</td>
            <td><button onclick='actualizar('".$row['id']."')' value='Actualizar'></td>
            </tr></tbody>";
        }
        return $html;

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
</body>
</html>