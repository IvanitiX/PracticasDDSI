<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $consulta = "SELECT COUNT(*) FROM `productos`";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    $numProductos = mysqli_fetch_array($resultado);
    $resultado = 0;

    $i = 1;
    while($i <= $numProductos['COUNT(*)']){
        if(array_key_exists($i, $_POST)){
            $consulta = "UPDATE productos SET Precio=".$_POST[$i]. " WHERE IdProducto=".$i ;
            $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        }
        $i++;
    }

    if($resultado > 0) echo "Precios actualizados";
    else echo "No se realizado la inscripcion" ;


    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Ventas/precios.php\">" ;

?>