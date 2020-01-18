<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $Nombre = $_POST['NombreTarifa'];
    $Precio = $_POST['precio'];

    $consulta = "INSERT INTO `tarifa` (`idTarifa`, `nombre`, `precio`) VALUES 
                ( 1 , '" . $Nombre . "', " . $Precio . ")"; // falta calculo $idTarifa
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    $consulta = "Select * from zona Order By nombre" ;
    $resultado2 = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    $i = 1;
    while($fila = mysqli_fetch_array($resultado2)){
        $zona[$i] = $fila['idZona'];
        $i++;
    }
    
    $i--;
    while($i >= 1){
        
        if(array_key_exists($zona[$i], $_POST)){
            $consulta = "INSERT INTO `da_acceso` (`idTarifa`, `idZona`) VALUES ( 1, " . $zona[$i] .  ")" ; // 1 = calculo $idTarifa
            mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        }
        $i--;
    }

    if($resultado > 0) echo "Tarifa " . $Nombre . " añadida.";
    else echo "No se realizado la inscripcion" ;


    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Ventas/tarifas.php\">" ;

?>