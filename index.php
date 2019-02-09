<?php 
 session_start();

 if (isset($_SESSION['usuario'])) {
  switch ($_SESSION['usuario']['tipo']) {
    case 'Root':
        header('Location: vistas/Root/');
        break;
    case 'Admin':
        header('Location: vistas/Administrativa/');
        break;
    case 'Catedratico':
        header('Location: vistas/Catedraticos/');
        break;
    case 'Propietario':
        header('Location: vistas/Propietario/');
        break;
    }

 }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Ingreso</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
    </div>
    <div class="main">
     <form action="" id="formLg">
        
        <select name="usuariolg" id="selectLogin">
          <option value="Root"> Principal </option>      
          <option value="Administrador"> Administrador </option>
          <option value="Catedratico"> Catedratico </option>  
          <option value="Propietario"> Propetario </option>                                               
        </select>
        <input type="password" name="passlg"  placeholder="Contraseña" required>
        <input type="submit" class="botonlg"  value="Iniciar Sesion" >
     </form>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
