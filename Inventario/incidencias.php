<?php
    include '../php/controlusuario.php' ;
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/estilos.css">
    <link rel="stylesheet" type="text/css" href="../styles/form.css">
    <meta http-equiv="X-UA-Compatible" content="firefox">
    <link rel="stylesheet" href="../styles/inicio.css">
    <link rel="icon" type="image/png" href="../img/favicon.png" sizes="256x256">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>ITFit > Inventario</title>
    </head>

    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark header">
        <a href="#" class="navbar-brand mr-auto">
            <img src="../img/Logo.png" alt="ITFit" width="64" height="64"/>
        </a>
        <span class="areagestion navbar-text">
            <ul class="navbar-nav">
                <li class="nav-link">
                    <a class ="enlace" href="#">Inventario</a>
                </li>
                <li class="nav-link">
                    <a class ="enlace" href="../php/logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </span>
    </nav>
    
    <div class="inicio container">
        <div class="row">
            <div class="vertical-menu col-lg-2 col-sm-3">
                <a href="./inventario.php">Inventario</a>
                <a href="./maquinas.php">Máquinas</a>
                <a href="./productos.php">Productos</a>
                <a href="#" class="active">Incidencias</a>
            </div>
            <div class="inicio col-lg-6 col-sm-6">
                <h1>Inventario > Incidencias</h1>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-4 col-sm-6">
            <form action="../php/Inventario/anadirincidencia.php" method="post">
                <h4>Añadir incidencia</h4>
                <p>Centro:</p>
                <select name="IdCentro" class="field">
                    <?php
                        include "../php/config_bbdd.php" ;
                        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("<h5>No puedo conectarme a la BD.</h5>");
                        $consulta = "Select IdCentro from Centro" ;
                        $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                        while($columna = mysqli_fetch_array($resultado)){
                            echo "<option value=" . $columna['IdCentro'] . "> Centro " . $columna['IdCentro'] . "</option>" ;
                        }
                    ?>
                </select>
                <p>Identificador de máquina:</p>
                <input type="text" name="IdMaquina" size="20" class="field" maxlength="30"/>
                <p>Identificador de instancia de máquina:</p>
                <input type="text" name="IdInstancia" size="20" class="field" maxlength="30"/>
                <p>Identificador de incidencia:</p>
                <input type="text" name="IdIncidencia" size="20" class="field" maxlength="30"/>
                <p>Descripcion:</p>
                <input type="text" name="Descripcion" size="20" class="field" maxlength="30"/>
                <p>Fecha:</p>
                <input type="date" name="FechaIncidencia" class="field">
                <input type="submit" class="botton" value="Añadir">
            </form>
        </div>

        <div class="col-lg-4 col-sm-6">
            <form action="../php/Inventario/alterarincidencia.php" method="post">
                <h4>Editar estado de incidencia</h4>
                <p>Centro:</p>
                <select name="IdCentro" class="field">
                    <?php
                        include "../php/config_bbdd.php" ;
                        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("<h5>No puedo conectarme a la BD.</h5>");
                        $consulta = "Select IdCentro from Centro" ;
                        $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                        while($columna = mysqli_fetch_array($resultado)){
                            echo "<option value=" . $columna['IdCentro'] . "> Centro " . $columna['IdCentro'] . "</option>" ;
                        }
                    ?>
                </select>
                <p>Identificador de máquina:</p>
                <input type="text" name="IdMaquina" size="20" class="field" maxlength="30"/>
                <p>Identificador de instancia de máquina:</p>
                <input type="text" name="IdInstancia" size="20" class="field" maxlength="30"/>
                <p>Identificador de incidencia:</p>
                <input type="text" name="IdIncidencia" size="20" class="field" maxlength="30"/>
                <p>Estado:</p>
                <select name="Estado" class="field">
                    <option value="Enviada">Enviada</option>
                    <option value="Inspeccionando">Inspeccionando</option>
                    <option value="Arreglando">Arreglando</option>
                    <option value="Completada">Completada</option>
                </select>
                <input type="submit" class="botton" value="Modificar">
            </form>
        </div>

        <div class="col-lg-4 col-sm-6">
            <form action="../php/Inventario/eliminarincidencia.php" method="post">
                <h4>Eliminar incidencia</h4>
                <p>Centro:</p>
                <select name="IdCentro" class="field">
                    <?php
                        include "../php/config_bbdd.php" ;
                        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("<h5>No puedo conectarme a la BD.</h5>");
                        $consulta = "Select IdCentro from Centro" ;
                        $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                        while($columna = mysqli_fetch_array($resultado)){
                            echo "<option value=" . $columna['IdCentro'] . "> Centro " . $columna['IdCentro'] . "</option>" ;
                        }
                    ?>
                </select>
                <p>Identificador de máquina:</p>
                <input type="text" name="IdMaquina" size="20" class="field" maxlength="8"/>
                <p>Identificador de instancia de máquina:</p>
                <input type="text" name="IdInstancia" size="20" class="field" maxlength="8"/>
                <p>Identificador de incidencia:</p>
                <input type="text" name="IdIncidencia" size="20" class="field" maxlength="30"/>
                <input type="submit" class="botton" value="Eliminar">
            </form>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <form>
            <h3>Lista de productos</h3>
            <?php
                $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("<h5>No puedo conectarme a la BD.</h5>");
                $consulta = "Select * from Incidencias Order By Estado" ;
                $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                echo "<table borde='2'>";
                echo "<tr>";
                echo "<th>Id.Centro</th>";
                echo "<th>Id.Maquina</th>";
                echo "<th>Id.Instancia</th>";
                echo "<th>Id.Incidencia</th>";
                echo "<th>Descripción</th>";
                echo "<th>Fecha</th>";
                echo "<th>Estado</th>";
                echo "</tr>";
                while($columna = mysqli_fetch_array($resultado)){
                    echo "<tr>";
	                echo "<td>" . $columna['IdCentro'] . "</td><td>" . $columna['IdMaquina'] . "</td><td>" . $columna['IdInstancia'] ."</td><td>" . $columna['IdIncidencia'] ."</td><td>" . $columna['Descripcion'] . "</td><td>" . $columna['FechaIncidencia'] ."</td><td>" . $columna['Estado'] . "</td>";
	                echo "</tr>";
                }
                echo "</table>";
            ?>
        </form>
        </div>
    </div>

    </body>
       

</html>