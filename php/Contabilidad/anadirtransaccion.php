<?php
    include "../config_bbdd.php" ;
    $Fecha = $_POST['fecha'] ;
    $Descripcion = $_POST['Descripcion'] ;
    $naturaleza = $_POST['Tipo'].'s' ;
    $precio = $_POST['Importe'] ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $consulta = "SELECT MAX(ID_Transaccion) FROM $naturaleza " ;
    echo "1" . $naturaleza ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    echo "1.2" ;
    $columna = mysqli_fetch_array($resultado) ;
    $IdTransaccion = $columna['MAX(ID_Transaccion)'] + 1 ;
    echo $IdTransaccion ;
    $consulta = "Insert into $naturaleza values ($IdTransaccion,'$Fecha','$Descripcion',$precio)" ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "¡Añadido!";
    else echo "No se ha añadido" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Contabilidad/Transaccion.html\">" ;
    

?>