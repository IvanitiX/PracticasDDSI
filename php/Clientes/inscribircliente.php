<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $Nombre = $_POST['Nombre'] ;
    $Apellidos = $_POST['Apellidos'] ;
    $DNI = $_POST['DNI'];
    $Correo = $_POST['Correo'];
    $Tlf = $_POST['Tlf'];
    $Cuenta_bancaria = $_POST['Cuenta_bancaria'];

    // Añadir la consulta del cliente con numero de id mayor para calcular el siguiente identificador

    $consulta = "INSERT INTO `clientes` (`idCliente`, `dni`, `nombre`, `apellidos`, `fechaAlta`, `correo`, `telefono`, `cuentaBancaria`) VALUES
                ( 11 , '" . $DNI . "', '" . $Nombre . "', '" . $Apellidos . "', CURDATE(), 
                '" . $Correo . "', '" . $Tlf . "', '" . $Cuenta_bancaria . "')";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "Inscripcion realizada";
    else echo "No se realizado la inscripcion" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Clientes/Clientes.php\">" ;

?>