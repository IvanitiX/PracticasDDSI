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
            
        </style>

  
<?php 
      $DB_SERVER = "localhost";
      $DB_USERNAME = "root";
      $DB_PASSWORD = "ITFit";
      $DB_DATABASE = "itfit";
     
   $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $fecha = $idEmpleado= "";
    $ferr = $idEmplerr = "";

    $array = array(
        "fecha"=> "false",
        "empl"=> "false",
        
    );

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["fecha"])){
            $ferr = "Campo obligatorio";
            
        }else{
            $fecha = $_POST["fecha"];
            $array["fecha"] = "true";

        }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["idEmpleado"])){
            $idEmplerr = "Campo obligatorio";
            
        }else{
            $idEmpleado = $_POST["idEmpleado"];
            $array["empl"] = "true";

        }
    }
  
        $anadido = "";
        $resultado = 0;

        if($array["fecha"] == "true" && $array["empl"] == "true"  ){
            
           
            $baja = "Baja";
            $consulta0= "SELECT * from empleadostrabajan where idEmpleado='$idEmpleado' " ;
            $resultado0 = mysqli_query( $db, $consulta0 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado0);
            $estado = $ret["Estado"];
            if($estado == $baja){
                $enbaja = true;
            }else{
                $enbaja = false;
                $consulta = "UPDATE empleadostrabajan Set Estado='$baja' , incorporacion='$fecha' where idEmpleado='$idEmpleado' " ;
                $resultado = mysqli_query( $db, $consulta ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            }
            
        
         
            
        }
             
        if($resultado > 0){

            $anadido = true;
            $consulta1 = "SELECT *  FROM empleadostrabajan where idEmpleado='$idEmpleado' " ;
            $resultado1 = mysqli_query( $db, $consulta1 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado1);
            $idCentro = $ret["IdCentro"];

            $consulta2 = "SELECT *  FROM centro where idCentro='$idCentro' " ;
            $resultado2 = mysqli_query( $db, $consulta2 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado2);

            $bajas = $ret["Bajas"];
            
            $bajas = $bajas + 1;
            
            $consulta = "UPDATE centro Set Bajas=$bajas where idCentro='$idCentro' " ;
            $resultado = mysqli_query( $db, $consulta ) or die ( " Algo ha ido mal en la consulta a la base de datos");
    
            $consulta3 = "SELECT *  FROM asocia where idCentro='$idCentro' " ;
            $resultado3 = mysqli_query( $db, $consulta3 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado3);
            $idCadena = $ret["idCadena"];

            $consulta4 = "SELECT *  FROM cadena where idCadena='$idCadena' " ;
            $resultado4 = mysqli_query( $db, $consulta4 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado4);
            $bajascad = $ret["Bajas"];

            $bajascad = $bajascad +1; 

            if($bajascad > 3){
                $vacantes = $ret["Vacantes"];
                $vacantes = $vacantes + 1;

            }else{
                $vacantes = $ret["Vacantes"];

            }

            $consulta = "UPDATE cadena Set Bajas=$bajascad , Vacantes=$vacantes  where idCadena='$idCadena' " ;
            $resultado = mysqli_query( $db, $consulta ) or die ( " Algo ha ido mal en la consulta a la base de datos");


        
        }else{
            $anadido = false;
        }
      
        
        //echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost:8081/php/RRHH/jornada.php\">";

    
 
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
                    <a href="../../RRHH/InformegeneralRRHH.php">Calcular Informe geneal RRHH</a>
                    <a href="../../RRHH/dardealta.php">Dar de alta empleado</a>
                    <a href="../../RRHH/despedir.html">Despedir empleado</a>
                    <a href="../../RRHH/asignarcurso.php" class="active">Asignar curso</a>
                    <a href="../../RRHH/consultar.php">Consultar</a>
                    <a href="../../RRHH/bajaempleado.php">Dar de baja empleado</a>
            </div>
    
            <div class="inicio col-lg-6 col-sm-6 offset-sm-3">
                    <form action ="#" method="post">
                        <h4>Asignar curso</h4>
                        <?php
                            if ($anadido == true){
                                echo "<div class=\"alert alert-success\" role=\"alert\">
                                Baja asignada con exito
                                </div>" ;
                            }if($anadido == false){
                                if($enbaja == true){
                                    echo "<div class=\"alert alert-success\" role=\"alert\">
                                El empleado seleccionado ya esta de baja.
                                </div>" ;
                                }else{
                                    echo "<div class=\"alert alert-success\" role=\"alert\">
                                Hay algún error.
                                </div>" ;
                                }
                                
                            }
                            else{
                                echo "<p><span class=\"error\">* Todos los campos son obligatorios</span></p>" ;
                            }
                        ?>
                        
                        <h4>Dar de baja a empleado</h4>
                        <p>Fecha de vencimiento:</p>
                        <input type="date" name="fecha" class="field" size="20" maxlength="10"/>
                        <span class = "error"><?php echo $ferr;?></span>
                        <p></p>
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
                     
                        <p></p>
                        <input type="submit" class ="botton" name="enviar" value="Submit" />
                            
                    </form>
            </div>
        </div>
    </div>

</body>
</html>