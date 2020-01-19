<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $Nombre = $_POST['NombreZona'] ;
    
    // calcular el siguiente idZona
    $consulta = "SELECT max(idZona) FROM zona" ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    if($res = mysqli_fetch_array($resultado)){
        $idZona = $res['max(idZona)'] + 1;
    } else $idZona = 1;

    $consulta = "INSERT INTO `zona` (`idZona`, `nombre`) VALUES
                ( ". $idZona ." , '" . $Nombre . "')";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "Zona " . $Nombre . " añadida.";
    else echo "No se realizado la inscripcion" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Ventas/tarifas.php\">" ;

?>