<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $idProducto = $_POST['IdProducto'] ;
    $descripcion = $_POST['Descripcion'] ;
    $cantidad =$_POST['Cantidad'] ;
    $precio = $_POST['Precio'] ;



    $consulta = "Update Productos Set Descripcion='$descripcion', Cantidad=$cantidad, Precio=$precio Where idProducto=$idProducto" ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "¡Alterado!";
    else echo "No se ha alterado" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Inventario/productos.php\">" ;
    

?>