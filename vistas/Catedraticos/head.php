<?php 
 session_start();

 if (isset($_SESSION['usuario'])) {
 
  if ($_SESSION['usuario']['tipo'] != "Catedratico") {
    header('Location: ../../');
  }
   
 }
 else{
  header('Location: ../../');
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Control de Notas</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="../../js/sweetalert.min.js"></script>
  <style>
    .salir { color: #FF0000; }
  </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Bienvenido <?php echo $_SESSION['usuario']['tipo'];?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">                                     
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="../salir.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        
                        <li>
                            <a href="ingreso_notas_id_profesor.php"><i class="fa fa-edit fa-fw"></i> Ingreso de notas</a>                  
                        </li>
                        
                        <li>
                            <a href="../agenda/"><i class="fa fa-calendar fa-fw"></i> Eventos</a>    
                        </li>
                     
                     
                        
                        <li class="">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Reportes Varios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="ingreso_id_imprimir_alumnos.php">Imprimir alumnos por salon</a>
                                </li>
                                <li>
                                    <a class="active" href="ingreso_id_imprimir_profesores.php">Imprimir asignacion de los profesores</a>
                                </li>
                                <li>
                                    <a class="active" href="ingreso_id_imprimir_solvencia.php">Reportes de solvencia</a>
                                </li>
                               
                                <li>
                                    <a class="active" href="ingreso_id_imprimir_eventos.php">Imprimir eventos</a>
                                </li>                                
                                <li>
                                    <a href="../salir.php">Salir</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li >
                            <a href="../salir.php"><i></i><h1 class="salir"><center> Salir</h1></a>                  
                        </li>




                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
