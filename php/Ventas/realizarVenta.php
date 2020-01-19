<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $idEmpleado = $_POST['idEmpleado'];
    $idFactura = 1;

  // Primero añadir la factura con sus atributos: IdFactura, 
    $consulta = "INSERT INTO `factura_hace` (`idFactura`, `fecha`, `idEmpleado`) VALUES 
                ( ". $idFactura ." , CURDATE() , '" . $idEmpleado . "')"; // falta calculo idFactura
    $aniadirFactura = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    // Segundo añadir las relaciones de la factura con los productos en `contiene`
    $consulta = "SELECT IdProducto,Cantidad FROM `productos`";
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    while($fila = mysqli_fetch_array($resultado)){
        if(array_key_exists($fila['IdProducto'], $_POST)){ // Si se ha vendido del producto con la id idProducto
            // Añadimos la relacion de la factura y el producto en `contiene`
            $consulta = "INSERT INTO contiene (`idFactura`, `idProducto`, `cantidad`) VALUES 
            ( ". $idFactura .", ". $fila['IdProducto'] .", ". $_POST[$fila['IdProducto']] ." )" ;
            mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                                                                     
            // Actualizar el inventario
            $cant = (int) $fila['Cantidad'] - (int) $_POST[$fila['IdProducto']];
            $consulta = "UPDATE productos SET Cantidad=". $cant ." WHERE IdProducto=". $fila['IdProducto'] ;
            mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        }
    }

    if($aniadirFactura > 0) echo "Factura realizada";
    else echo "No se realizado la inscripcion" ;


    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Ventas/Ventas.php\">" ;

?>

