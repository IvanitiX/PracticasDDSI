<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $consulta = "SELECT IdProducto FROM `productos`";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    while($fila = mysqli_fetch_array($resultado)){
        if(array_key_exists($fila['IdProducto'], $_POST)){
            $consulta = "UPDATE productos SET Precio=".$_POST[$fila['IdProducto']]. " WHERE IdProducto=".$fila['IdProducto'] ;
            $res = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        }
    }

    if($res > 0) echo "Precios actualizados";
    else echo "No se realizado la inscripcion" ;


    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Ventas/precios.php\">" ;

?>