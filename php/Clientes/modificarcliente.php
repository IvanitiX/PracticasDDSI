<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $IDCliente = $_POST['IDCliente2'] ;
    $Nombre = $_POST['Nombre2'] ;
    $Apellidos = $_POST['Apellidos2'] ;
    $DNI = $_POST['DNI2'];
    $Correo = $_POST['Correo2'];
    $Tlf = $_POST['Tlf2'];
    $Cuenta_bancaria = $_POST['Cuenta_bancaria2'];

    $consulta = "UPDATE `clientes` SET `nombre` = '" . $Nombre . "', `apellidos` = '" . $Apellidos . "', `correo` = '" . $Correo . 
        "', `telefono` = '" . $Tlf . "', `cuentaBancaria` = '" . $Cuenta_bancaria . "' WHERE `idCliente` = " . $IDCliente ."; ";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "Modificacion realizada";
    else echo "No se realizado la modificacion" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Clientes/Clientes.php\">" ;

?>