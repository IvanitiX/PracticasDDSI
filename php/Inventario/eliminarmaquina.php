<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $idCentro = $_POST['IdCentro'] ;
    $idMaquina = $_POST['IdMaquina'] ;
    $idInstancia = $_POST['IdInstancia'];

    $consulta = "Delete from Maquinas where idCentro = '$idCentro' and idMaquina=$idMaquina and idInstancia=$idInstancia" ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "¡Eliminado!";
    else echo "No se ha eliminado" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Inventario/maquinas.php\">" ;
    

?>