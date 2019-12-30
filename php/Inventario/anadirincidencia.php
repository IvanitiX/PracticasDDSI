<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $idCentro = $_POST['IdCentro'] ;
    $idMaquina = $_POST['IdMaquina'] ;
    $idInstancia = $_POST['IdInstancia'];
    $idIncidencia = $_POST['IdIncidencia'];
    $descripcion = $_POST['Descripcion'];
    $fechaIncidencia = $_POST['FechaIncidencia'] ;

    echo $fechaIncidencia . " "  . $idIncidencia . "\n" ;
    $consulta = "Insert into Incidencias values ('$idCentro',$idMaquina,$idInstancia,$idIncidencia,'$descripcion','$fechaIncidencia','Enviada')" ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "¡Añadido!";
    else echo "No se ha añadido" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Inventario/incidencias.php\">" ;
    

?>