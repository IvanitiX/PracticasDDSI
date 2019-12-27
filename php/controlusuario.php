<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {} 

else {
   echo "<h1>Inicia Sesion para acceder a este contenido.</h1>";
   sleep(3) ;
   header('Location: http://localhost/html/login.html');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion
exit;
}

$now = time();

if($now > $_SESSION['expire']) {
session_destroy();
header('Location: http://localhost/html/login.html');//redirige a la página de login, modifica la url a tu conveniencia
echo "Tu sesion ha expirado.
<a href='login.html'>Inicia Sesion</a>";
exit;
}
?>