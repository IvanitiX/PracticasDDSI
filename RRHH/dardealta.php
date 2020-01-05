<!DOCTYPE HTML>
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
      
      
    
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark header">
            <a href="../inicio.html" class="navbar-brand mr-auto">
                <img src="../img/Logo.png" alt="ITFit" width="64" height="64"/>
            </a>
            <span class="areagestion navbar-text">
                <ul class="navbar-nav">
                    <li class="nav-link">
                        <a class ="enlace" href="login.html">Área de gestión</a>
                        <a class ="enlace" href="../RRHH/RRHH.html">Recursos Humanos</a>
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
                            <a href="" class="active">Recursos Humanos</a>
                            <a href="./jornada.html">Asignar Jornada laboral</a>
                            <a href="./InformegeneralRRHH.html">Calcular Informe geneal RRHH</a>
                            <a href="./dardealta.php">Dar de alta empleado</a>
                            <a href="./despedir.html">Despedir empleado</a>
                            <a href="./asignarcurso.html">Asignar curso</a>
                            <a href="./bajaempleado.html">Dar de baja empleado</a>
                        </div>
            
                        <div class="inicio col-lg-6 col-sm-6 offset-sm-3">
                            <form action ="../php/RRHH/dardealta.php" class="formrrhh" , method="post">
                                <h4>Dar de alta empleado</h4>
                                   <p>Nombre:</p>
                                       <input type="text" name="nombre" class="field" size="20" maxlength="10"/>
                   
                                   
                                   <p>Apellidos:</p>
                                       <input type="text" name="apellidos" class="field"size="20" maxlength="30"/>
                   
                                   
                                   <p>Domicilio:  </p>
                                       <input type="text" name="domicilio" class="field" size="20" maxlength="30"/>
                   
                                 
                                   <p>E-mail:</p>
                                       <input type="text" name="correo" class="field" size="20" maxlength="30"/>
                   
                                   
                                   <p>Telefono:</p>
                                       <input type="text" name="telefono" class="field" size="20" maxlength="9"/>
                   
                                   
                                   <p>DNI:</p>
                                       <input type="text" name="DNI" size="20" class="field" maxlength="9"/>
                   
                                   
                                   <p>Puesto:</p>
                                       <input type="text" name="puesto" class="field" size="20" maxlength="20"/>
                   
                                   
                                
                                   <p>Selecciona Centro </p>
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
                                       <p></p>
                                      
                                       <input type="submit" value="Submit" class="botton" />

                                 
                               </form>
                    
                        </div>
                    </div>
                </div>
            
            </body>
       
            

</html>