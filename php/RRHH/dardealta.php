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
   $anadido= $idEmpleado=$nombre = $apellidos = $domicilio = $correo = $telefono = $dni = $puesto = $centro = "";
    $err1=$err2= $centroerr = $nomerr = $apellidoerr = $domicilioerr = $correrr = $teleferr = $dnierr = $puestoerr  = "";

    $array = array(
        "centro"=> "false",
        "nombre"=> "false",
        "apellidos" => "false",
        "domcilio" => "false",
        "correo" => "false",
        "telefono" => "false",
        "dni" => "false",
        "puesto" => "false",
    );

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["IdCentro"])){
            $centroerr = "Campo obligatorio";
            
        }else{
            $centro = $_POST["IdCentro"];
            $array["centro"] = "true";
            //echo $centro;

        }
        if(empty($_POST["nombre"])){
            $nomerr = "Campo obligatorio";
        }else{
            $nombre = $_POST["nombre"];
            $array["nombre"] = "true";
           // echo $nombre;
        }

        if(empty($_POST["apellidos"])){
            $apellidoerr = "Campo obligatorio";
        }else{
            $apellidos =$_POST["apellidos"];
            $array["apellidos"] = "true";
            //echo $apellidos;
        }

        if(empty($_POST["domicilio"])){
            $domicilioerr = "Campo obligatorio";
        }else{
            $domicilio =$_POST["domicilio"];
            $array["domicilio"] = "true";
           // echo $domicilio;
        }

        if(empty($_POST["correo"])){
            $correrr = "Campo obligatorio";
        }else{
            $correo =$_POST["correo"];
            $array["correo"] = "true";
           // echo $correo;
        }

        if(empty($_POST["telefono"])){
            $teleferr = "Campo obligatorio";
        }else{
            $telefono =$_POST["telefono"];
            if(strlen($telefono)!= 9){
                $err2 = "Numero de caracteres erróneo";
            }else{
                $array["telefono"] = "true";               
            }
          //  echo $telefono;
           

        }
        if(empty($_POST["DNI"])){
            $dnierr = "Campo obligatorio";
        }else{
            $dni =$_POST["DNI"];
            $idEmpleado = substr($dni ,0,-1);
            if(strlen($dni) < 9){
                $err1 = "Numero de caracteres erróneo";
            }else{
                $array["dni"] = "true";
               
            }

           // echo $dni;
            //echo "ID " . $idEmpleado ;
            
        }

        if(empty($_POST["puesto"])){
            $puestoerr = "Campo obligatorio";
        }else{
            $puesto =$_POST["puesto"];
            $array["puesto"] = "true";
           // echo $puesto;
        }
        
        
        if($array["centro"] == "true" && $array["nombre"] == "true" &&  $array["apellidos"] = "true"  
        &&  $array["domicilio"] = "true" &&  $array["correo"] = "true" &&  $array["telfono"] = "true"
        &&  $array["dni"] = "true" &&  $array["puesto"] = "true"){
            $null ="NULL";
            $estado = 'Activo';

            $consulta0 ="SELECT * FROM contiene WHERE `idCentro`= '$centro'";
            $resultado0 = mysqli_query( $db, $consulta0 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado0);
            $idCadena = $ret["idCadena"];

            $consulta1 = "SELECT * FROM cadena WHERE `idCadena`= '$idCadena'";
            $resultado1 = mysqli_query( $db, $consulta1 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            $ret = mysqli_fetch_array($resultado1);
            $vacantes = $ret["Vacantes"];
            $altasCad = $ret["Altas"];
            $emplecad = $ret["NumEmpleados"];
            if($vacantes > 0){
                $consulta2 ="SELECT * FROM centro WHERE `idCentro`= '$centro'";

          
                $resultado2 = mysqli_query( $db, $consulta2 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
            
                $ret = mysqli_fetch_array($resultado2);
                $altas = $ret["Altas"];
            
                $altas = $altas + 1;
            
                $emple = $ret["NumEmpleados"];
                $emple = $emple + 1;
    
            
                $consulta3 = "UPDATE centro Set Altas=$altas, NumEmpleados=$emple where idCentro='$centro'" ;
                $resultado3 = mysqli_query( $db, $consulta3 ) or die ( " Algo ha ido mal en la consulta a la base de datos");
                   
                $altasCad = $altasCad + 1;
                $emplecad = $emplecad + 1;
                $vacantes = $vacantes - 1;

                $consulta4 = "UPDATE cadena Set Altas=$altasCad, NumEmpleados=$emplecad , Vacantes=$vacantes where idCadena='$idCadena'" ;
                $resultado4 = mysqli_query( $db, $consulta4 ) or die ( " Algo ha ido mal en la consulta a la base de datos");

                $consulta = "INSERT INTO empleadostrabajan values ('$idEmpleado','$nombre','$apellidos','$domicilio','$centro','$correo','$telefono','$dni','$puesto',0,'$estado','No')" ;
                $resultado = mysqli_query( $db, $consulta ) or die ( " Algo ha ido mal en la consulta a la base de datos");

            }else{
                $anadido = false;
            }
            
            if($resultado > 0 ) {
                //echo "¡Añadido! con identificador $idEmpleado";
                $anadido = true ;
            }
            else echo "No se ha añadido" ;
            
        }
        
      // echo "<meta http-equiv=\"refresh\" content=\"1 ; url=http://localhost:8081/php/RRHH/dardealta.php\">";

    }
 
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

        </head>

        <body>
           
            <body>
            <div class="inicio container">
                <div class="row">
                    <div class="vertical-menu col-lg-2 col-sm-3">
                            <a href="../../RRHH/RRHH.html">Recursos Humanos</a>
                            <a href="../../RRHH/jornada.php" class="active">Asignar Jornada laboral</a>
                            <a href="../../RRHH/InformegeneralRRHH.php">Calcular Informe geneal RRHH</a>
                            <a href="../../RRHH/dardealta.php">Dar de alta empleado</a>
                            <a href="../../RRHH/despedir.html">Despedir empleado</a>
                            <a href="../../RRHH/asignarcurso.php">Asignar curso</a>
                            <a href="../../RRHH/consultar.php">Consultar empleado</a>
                            <a href="../../RRHH/bajaempleado.php">Dar de baja empleado</a>
                    </div>
    
            
                        <div class="inicio col-lg-6 col-sm-6 offset-sm-3">
                            <form action ="#" class="formrrhh" , method="post">
                                <h4>Dar de alta empleado</h4>
                                <?php
                                    if ($anadido == true){
                                        echo "<div class=\"alert alert-success\" role=\"alert\">
                                        Añadido con éxito con identificador $idEmpleado
                                      </div>" ;
                                    }if($anadido == false){
                                        echo "<div class=\"alert alert-success\" role=\"alert\">
                                        Seleccione otro  centro , maximo de empleados alcanzados.
                                      </div>" ;
                                    }
                                    else{
                                        echo "<p><span class=\"error\">* Todos los campos son obligatorios</span></p>" ;
                                    }
                                ?>
                                   <p>Nombre:</p>
                                       <input type="text" name="nombre" class="field" size="20" maxlength="10"/>
                                       <span class = "error"><?php echo $nomerr;?></span>

                                   
                                   <p>Apellidos:</p>
                                       <input type="text" name="apellidos" class="field"size="20" maxlength="30"/>
                                       <span class = "error"><?php echo $apellidoerr;?></span>

                                   
                                   <p>Domicilio:  </p>
                                       <input type="text" name="domicilio" class="field" size="20" maxlength="30"/>
                                       <span class = "error"><?php echo $domicilioerr;?></span>
                 
                                 
                                   <p>E-mail:</p>
                                       <input type="text" name="correo" class="field" size="20" maxlength="30"/>
                                       <span class = "error"><?php echo $correrr;?></span>
                 
                                   
                                   <p>Telefono:</p>
                                       <input type="text" name="telefono" class="field" size="20" maxlength="9"/>
                                       <span class = "error"><?php echo $teleferr;?></span>
                                       <span class = "error"><?php echo $err2;?></span>

                                   
                                   <p>DNI:</p>
                                       <input type="text" name="DNI" size="20" class="field" maxlength="9"/>
                                       <span class = "error"><?php echo $dnierr;?></span>
                                       <span class = "error"><?php echo $err1;?></span>

                                   
                                   <p>Puesto:</p>
                                       <input type="text" name="puesto" class="field" size="20" maxlength="20"/>
                                       <span class = "error"><?php echo $puestoerr;?></span>
                   
                                   
                                 
                   
                                   
                                   <p>Selecciona Centro </p>
                                   <select name="IdCentro" class="field">
                                    <?php
                                        $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE) or die ("No puedo conectarme a la BD.");
                                        $consulta = "Select IdCentro from Centro" ;
                                        $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                                        while($columna = mysqli_fetch_array($resultado)){
                                            echo "<option value=" . $columna['IdCentro'] . "> Centro " . $columna['IdCentro'] . "</option>" ;
                                        }
                                    ?>
                                    </select>
                                       <span class = "error"><?php echo $centroerr;?></span>

                                       <p></p>
                                       <input type="submit" value="Submit" class="botton" />
                                  
                                 
                               </form>
                    
                        </div>
                    </div>
                </div>
            
            </body>
       
            

</html>