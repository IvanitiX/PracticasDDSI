<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $IDCliente = $_POST['IDCliente'];
    $Fecha = $_POST['Fecha'];
    $Tipo = $_POST['Tipo'];
        
    echo $Fecha;
    $consulta = "INSERT INTO `citas` (`cliente`, `fecha`, `tipo`) VALUES ( " . $IDCliente . " , '" . $Fecha . "', '" . $Tipo . "')";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "Cita registrada";
    else echo "No se registrado la cita" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Clientes/Citas.php\">" ;

?>