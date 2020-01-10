<?php
    
?>

<!DOCTYPE HTML>
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
      
        <style>
            
          .error{color: #FF0000;}

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 10px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th,td {
                background-color: rgba(7, 101, 138, 0.5);
                color: white;
            }   
        </style>

  
<?php 
      $DB_SERVER = "localhost";
      $DB_USERNAME = "root";
      $DB_PASSWORD = "";
      $DB_DATABASE = "itfit";
     
   $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $idEmpleado =  "";
    $emplerr = "";

    $array = array(
        "empl"=> "false",
       
    );

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["idEmpleado"])){
            $emplerr = "Campo obligatorio";
            
        }else{
            $idEmpleado = $_POST["idEmpleado"];
            $array["empl"] = "true";
            

        }
       

        $anadido = "";
       
            $consulta ="SELECT * FROM empleadostrabajan WHERE `idEmpleado`= '$idEmpleado'";
            $resultado = mysqli_query( $db, $consulta) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado);
            $nombre = $ret["nombre"];
            $apellidos = $ret["apellidos"];
            $domicilio = $ret["domicilio"];
            $centro = $ret["IdCentro"];
            $mail = $ret["correo"];
            $puesto = $ret["Puesto"];
            $Jornada = $ret["Jornada"];
            $estado = $ret["Estado"];
            $cursos = $ret["Formación"];
            $incorporacion = $ret["incorporacion"];
            $telef = $ret["Telefono"];
            $dni = $ret["dni"];


          

         
          
            $anadido ="true";
        
        
        //echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost:8081/php/RRHH/jornada.php\">";

    }
 
?>
      </head>
<?php
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark header">
            <a href="../../inicio.html" class="navbar-brand mr-auto">
                <img src="../../img/Logo.png" alt="ITFit" width="64" height="64"/>
            </a>
            <span class="areagestion navbar-text">
                <ul class="navbar-nav">
                    <li class="nav-link">
                        <a class ="enlace" href="../login.html">Área de gestión</a>
                        <a class ="enlace" href="../../RRHH/RRHH.html">Recursos Humanos</a>
                    </li>
                </ul>
            </span>
        </nav>
<body>
    <div class="inicio container">
        <div class="row">
            <div class="vertical-menu col-lg-2 col-sm-3">
                    <a href="../../RRHH/RRHH.html">Recursos Humanos</a>
                    <a href="../../RRHH/jornada.php" >Asignar Jornada laboral</a>
                    <a href="../../RRHH/InformegeneralRRHH.php" >Calcular Informe geneal RRHH</a>
                    <a href="../../RRHH/dardealta.php">Dar de alta empleado</a>
                    <a href="../../RRHH/despedir.html">Despedir empleado</a>
                    <a href="../../RRHH/asignarcurso.php">Asignar curso</a>
                    <a href="../../RRHH/consultar.php" class="active">Consultar empleado</a>
                    <a href="../../RRHH/bajaempleado.php">Dar de baja empleado</a>
            </div>
    
            <div class="inicio col-lg-6 col-sm-6 offset-sm-3">
                    <form action ="#" method="post">
                        <h4>Consultar empleado</h4>
                        <?php
                            if ($anadido == true){
                                echo "<div class=\"alert alert-success\" role=\"alert\">
                                Consulte el informe
                                </div>" ;
                            }if($anadido == false){
                                echo "<div class=\"alert alert-success\" role=\"alert\">
                                 Hay algún error.
                                </div>" ;
                            }
                            else{
                                echo "<p><span class=\"error\">* Todos los campos son obligatorios</span></p>" ;
                            }
                        ?>
                        
                        <select name="idEmpleado" class="field">
                                <?php
                                    $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE) or die ("No puedo conectarme a la BD.");
                                    $consulta = "Select idEmpleado from empleadostrabajan" ;
                                    $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                                    while($columna = mysqli_fetch_array($resultado)){
                                        echo "<option value=" . $columna['idFormacion'] . ">  " . $columna['idEmpleado'] . "</option>" ;
                                    }
                                ?>
                            </select>
                            <p></p>
                     
                        <input type="submit" class ="botton" name="enviar" value="Submit" />
                            
                    </form>
                    
                    <h4>Empleado  <?php echo $idEmpleado; ?></h4>
                    <table class="tabla">
                        <tr>
                            <th>Nombre: </th>
                            <td><?php echo $nombre; ?></td>

                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td><?php echo $apellidos; ?></td>

                        </tr>
                        <tr>
                            <th>Domicilio:</th>
                            <td><?php echo $domicilio; ?></td>

                        </tr>
                        <tr>
                            <th>Centro</th>
                            <td><?php echo $centro; ?></td>

                        </tr>

                        <tr>
                            <th>Mail:</th>
                            <td><?php echo $mail; ?></td>

                        </tr>
                        <tr>
                            <th>Teléfono: </th>
                            <td><?php echo $telef; ?></td>

                        </tr>
                        <tr>
                            <th>DNI:</th>
                            <td><?php echo $dni; ?></td>

                        </tr>
                        <tr>
                            <th>Puesto:</th>
                            <td><?php echo $puesto; ?></td>

                        </tr>
                        <tr>
                            <th>Jornada:</th>
                            <td><?php echo $Jornada; ?><p>horas diarias </p></td>

                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td><?php echo $estado; ?></td>

                        </tr>
                        <tr>
                            <th>Cursos:</th>
                            <td><?php echo $cursos; ?></td>

                        </tr>
                        <tr>
                            <th>Incorporacion:</th>
                            <td><?php echo $incorporacion; ?></td>

                        </tr>

                    </table>
            </div>
        </div>
    </div>

</body>
</html>