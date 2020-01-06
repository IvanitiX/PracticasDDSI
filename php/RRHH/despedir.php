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
      $DB_PASSWORD = "";
      $DB_DATABASE = "itfit";
     
   $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE) or die ("No puedo conectarme a la BD.");
    $centro =  "";
    $centroerr = "";

    $array = array(
        "idEmpleado"=> "false",
       
    );

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["idEmpleado"])){
            $centroerr = "Campo obligatorio";
            
        }else{
            $idEmpleado = $_POST["idEmpleado"];
            $array["idEmpleado"] = "true";
       

        }
       

        $anadido = "";
        if($array["idEmpleado"] == "true"  ){
            $consulta1 = "SELECT * FROM empleadostrabajan WHERE `idEmpleado`= '$idEmpleado'";
            $resultado1 = mysqli_query( $db, $consulta1 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado1);
            $idCentro = $ret["IdCentro"];

            $consulta2 = "SELECT * FROM centro WHERE `idCentro`= '$idCentro'";
            $resultado2 = mysqli_query( $db, $consulta2 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado2);
            $Numempl = $ret["NumEmpleados"];
            $Numempl = $Numempl - 1;

            $consulta3 = "UPDATE centro Set NumEmpleados=$Numempl where idCentro='$idCentro'" ;
            $resultado3 = mysqli_query( $db, $consulta3 ) or die ( " Algo ha ido mal en la consulta a la base de datos");

            $consulta4 ="SELECT * FROM contiene WHERE `idCentro`= '$idCentro'";
            $resultado4 = mysqli_query( $db, $consulta4 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado4);
            $idCadena = $ret["idCadena"];

            $consulta5 = "SELECT * FROM cadena WHERE `idCadena`= '$idCadena'";
            $resultado5 = mysqli_query( $db, $consulta5 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado5);
            $vacantes = $ret["Vacantes"];
            $vacantes = $vacantes + 1;
            $emplecad = $ret["NumEmpleados"];
            $emplecad = $emplecad - 1 ;

            $consulta6 = "UPDATE cadena Set  NumEmpleados=$emplecad , Vacantes=$vacantes where idCadena='$idCadena'" ;
            $resultado6 = mysqli_query( $db, $consulta6 ) or die ( " Algo ha ido mal en la consulta a la base de datos");

            $consulta0 =  "DELETE from empleadostrabajan where idEmpleado = '$idEmpleado' " ;
            $resultado0 = mysqli_query( $db, $consulta0 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            
            if($resultado0 >0){
                $anadido ="true";

            }else{
                $anadido = "false";
                
            }
            
            
          
        }
        
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
                    <a href="../../RRHH/InformegeneralRRHH.php" class="active">Calcular Informe geneal RRHH</a>
                    <a href="../../RRHH/dardealta.php">Dar de alta empleado</a>
                    <a href="../../RRHH/despedir.html">Despedir empleado</a>
                    <a href="../../RRHH/asignarcurso.html">Asignar curso</a>
                    <a href="../../RRHH/bajaempleado.html">Dar de baja empleado</a>
            </div>
    
            <div class="inicio col-lg-6 col-sm-6 offset-sm-3">
                <form action="#" class="formrrhh" method="post">
                    <h4>Despedir empleado</h4>
                    <?php
                                    if ($anadido == true){
                                        echo "<div class=\"alert alert-success\" role=\"alert\">
                                        Empleado despedido $idEmpleado
                                      </div>" ;
                                    }if($anadido == false){
                                        echo "<div class=\"alert alert-success\" role=\"alert\">
                                       IdEmpleado incorrecto.
                                      </div>" ;
                                    }
                                    else{
                                        echo "<p><span class=\"error\">* Todos los campos son obligatorios</span></p>" ;
                                    }
                                ?>
                    <p>idEmpleado:</p>
                    <input type="text" name="idEmpleado" class="field" size="20" maxlength="8"/>
                    <p></p>
                    <input type="submit" value="Submit" class="botton" />
            
                </form>
                
                    
                   
            </div>
        </div>
    </div>

</body>
</html>