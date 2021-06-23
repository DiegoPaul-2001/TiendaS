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
    <title>Listado Clientes</title>
</head>
<body>
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

    <?php    
    try {
        $cliente = new SoapClient('http://localhost/TiendaS/servicios/wdsl.xml');
        $r = $cliente->consultarTodos();
        echo "<table class='table table-light'>";
        echo "
            <tr class='table-dark'>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>EDAD</td>
            </tr>
            ";
        echo ($r);
        echo "</table>";
    } catch (SoapFault $e) {
        echo $e->getMessage().PHP_EOL;
    } 
    ?>
</body>
</html>