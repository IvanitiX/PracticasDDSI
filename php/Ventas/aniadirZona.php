<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $Nombre = $_POST['NombreZona'] ;

    $consulta = "INSERT INTO `zona` (`idZona`, `nombre`) VALUES
                ( 3 , '" . $Nombre . "')";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "Zona " . $Nombre . " añadida.";
    else echo "No se realizado la inscripcion" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Ventas/tarifas.php\">" ;

?>