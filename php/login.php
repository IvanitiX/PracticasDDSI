<?php
    session_start() ;
?>

<?php
    include("config_bbdd.php") ;

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $usuario = $_POST['usuario'] ;

    $usuario2 = str_replace('\'','k',$usuario) ;
    $contrasena = $_POST['passwd'] ;

    $consulta = "Select * from Inicio Where Usuario = '$usuario2' and Contrasena = '$contrasena'" ;
    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    if ($resultado->num_rows > 0){
        $fila = mysqli_fetch_array( $resultado ) ;

        $minutos = 20 ;
        $_SESSION['loggedin'] = true ;
        $_SESSION['username'] = $usuario ;
        $_SESSION['start'] = time() ;
        $_SESSION['expire'] = $_SESSION['start'] + ($minutos * 60) ;

        echo "¡Bienvenido " . $fila['Usuario'] . "! Ahora te llevamos al panel de " . $fila['Rol'] . " ." ;

        switch($fila['Rol']){
            case 'RRHH' :
                $destino = "../RRHH/RRHH.html" ;
            break ;
            case 'Admin' :
                $destino = "../RRHH/RRHH.html" ;
            break ;
            case 'Clientes' :
                $destino = "../RRHH/RRHH.html" ;
            break ;
            case 'Inventario' :
                $destino = "../Inventario/inventario.php" ;
            break ;
            case 'Contabilidad' :
                $destino = "../RRHH/RRHH.html" ;
            break ;
            case 'Ventas' :
                $destino = "../Ventas/Ventas.php" ;
            break ;

        }

        echo "<meta http-equiv=\"refresh\" content=\"3 ; url=$destino\">" ;
    }
    else{
        echo "¡Uy! Parece que te has equivocado. Volvamos al Login e intentémoslo de nuevo." ;
        echo "<meta http-equiv=\"refresh\" content=\"3 ; url=http://localhost/html/login.html\">" ;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="firefox">
    <title>ITFit > POST data</title>
</head>
</html>
