<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../styles/estilos.css">
        <link rel="stylesheet" type="text/css" href="../../styles/form.css">

        <meta http-equiv="X-UA-Compatible" content="firefox">
        <link rel="stylesheet" href="../../styles/inicio.css">
    
        <link rel="icon" type="image/png" href="../../img/favicon.png" sizes="256x256">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <?php
            include "../config_bbdd.php" ;
            $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("No puedo conectarme a la BD.");

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["IDCliente"])){
                    $IDCliente = 0;
                }else{
                    $IDCliente = $_POST['IDCliente'];

                    $consulta = "SELECT * FROM `citas` WHERE cliente = " . $IDCliente . ";";
                    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                }
            }
        ?>
    </head>
    
    
    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark header">
            <a href="../../inicio.html" class="navbar-brand mr-auto">
                <img src="../../img/Logo.png" alt="ITFit" width="64" height="64"/>
            </a>
            <span class="areagestion navbar-text">
                <ul class="navbar-nav">
                    <li class="nav-link">
                        <a class ="enlace" href="#">Gestión de clientes</a>
                    </li>
                    <li class="nav-link">
                        <a class ="enlace" href="../logout.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </span>
        </nav>

        <div class="inicio container">
            <div class="row">
                <div class="vertical-menu col-lg-2 col-sm-3">
                    <a href="../../Clientes/Clientes.php">Clientes</a>
                    <a href="../../Clientes/Citas.php" class="active">Citas</a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <h1>Gestión clientes</h1>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <form action="./aniadircita.php" method="post">
                    <h4>Dar cita</h4>
                    <p>Identificador cliente</p>
                    <input type="text" name="IDCliente" size="20" class="field" maxlength="30"/>
                    <p>Fecha</p>
                    <input type="datetime-local" name="Fecha"/>
                    <p>Tipo</p>
                    <select name="Tipo">
                        <option>Deportiva</option>
                        <option>Nutricion</option>
                    </select>
                    
                    <input type="submit" class="botton" value="Añadir">
                </form>
            </div>

            <div class="col-lg-4 col-sm-6">
                <form action="./consultarcita.php" method="post">
                    <h4>Consultar cita</h4>
                    <p>Identificador cliente</p>
                    <input type="text" name="IDCliente" size="20" class="field" maxlength="30"/>
                    
                    <input type="submit" class="botton" value="Consultar">
                </form>
            </div>
            
            <div class="col-lg-4 col-sm-6">
                <form>
                    <h4>Citas encontradas</h4>
                    
                    <?php
                        if($IDCliente){
                            $i = 0;
                            while($cliente = mysqli_fetch_array($resultado)){
                                $i++;
                                echo ("<p> Fecha y hora " .
                                $cliente['fecha'] .
                                "Tipo " .
                                $cliente['tipo'] . "</p>");
                            }
                            if($i == 0) echo "<p>Ninguna</p>";
                        }
                    ?>
                    
                </form>
            </div>

        </div>
    </body>
    
</html>