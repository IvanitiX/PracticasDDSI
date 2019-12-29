<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $idProducto = $_POST['IdProducto'] ;
    $descripcion = $_POST['Descripcion'] ;
    $cantidad = $_POST['Cantidad'];
    $precio = $_POST['Precio'];

    $consulta = "Insert into Productos values ($idProducto,'$descripcion',$cantidad,$precio)" ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "¡Añadido!";
    else echo "No se ha añadido" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Inventario/productos.php\">" ;
    

?>