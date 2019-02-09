<?php 
 session_start();

 if (isset($_SESSION['usuario'])) {
 
  if ($_SESSION['usuario']['tipo'] != "Admin") {
    header('Location: ../../');
  }
   
 }
 else{
  header('Location: ../../');
 }
?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
<h1>Welcome Administrador
</h1>
    <a href="../salir.php">Cerrar sesion</a>
   </body>
 </html>
