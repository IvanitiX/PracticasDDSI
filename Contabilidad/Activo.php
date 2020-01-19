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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'fecha');
      data.addColumn('number', 'total');
      data.addRows([
        //voy a usar php
        <?php
            include '../php/config_bbdd.php'; 
            $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die ("<h5>No puedo conectarme a la BD.</h5>");
            $consulta = "Select Fecha, Sum(Importe) from Activos Group by Fecha" ;
            $resultado = mysqli_query( $db, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            
            while($columna = mysqli_fetch_array($resultado)){
                echo "['" . $columna['Fecha'] . "' , " . $columna['Sum(Importe)'] . "] , " ;
            }
        ?>
      ]);

      // Set chart options
      var options = {'title':'Activo de la temporada',
                     'width':400,
                     'height':300};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('grafico'));
      chart.draw(data, options);
    }
    </script>
        </head>
        <body>
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark header">
                <a href="#" class="navbar-brand mr-auto">
                <img src="../img/Logo.png" alt="ITFit" width="64" height="64"/>
            </a>
            <span class="areagestion navbar-text">
                <ul class="navbar-nav">
                    <li class="nav-link">
                        <a class ="enlace" href="login.html">Área de gestión</a>
                        <a class ="enlace" href="../Contabilidad/contabilidad.html">Contabilidad</a>
                    </li>
                </ul>
            </span>
        </nav>
    
    <body>
        <div class="inicio container">
            <div class="row">
                <div class="vertical-menu col-lg-4 col-sm-4">
                    <a href="./Contabilidad.html" >Contabilidad</a>
                    <a href="./Activo.php">Activo</a>
                    <a href="./Pasivo.php">Pasivo</a>
                    <a href="./Transaccion.html">Transaccion</a>
                    <a href="./Balance_Economico.html">Balance Economico</a>
                </div>
                <div class="inicio col-lg-6 col-sm-6">
                    <h1>Contabilidad > Activo</h1>
                </div>

                <div class="row">
                    <div class="col-sm-4 offset-sm-11">
                        <div id="grafico"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>