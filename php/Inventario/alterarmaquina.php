<?php
    include "../config_bbdd.php" ;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $idCentroOrig = $_POST['IdCentroOrig'] ;
    $idMaquinaOrig = $_POST['IdMaquinaOrig'] ;
    $idInstanciaOrig = $_POST['IdInstanciaOrig'];
    $idCentroNew = $_POST['IdCentroNew'] ;
    $idMaquinaNew = $_POST['IdMaquinaNew'] ;
    $idInstanciaNew = $_POST['IdInstanciaNew'];
    $descripcion = $_POST['Descripcion'] ;



    $consulta = "Update Maquinas Set idCentro = '$idCentroNew', idMaquina = $idMaquinaNew , idInstancia = $idInstanciaNew, Descripcion='$descripcion' Where idCentro = '$idCentroOrig' and idMaquina = $idMaquinaOrig and idInstancia=$idInstanciaOrig " ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if($resultado > 0) echo "¡Alterado!";
    else echo "No se ha alterado" ;

    echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost/Inventario/maquinas.php\">" ;
    

?>