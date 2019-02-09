<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from
$id_grado=$_GET['id'];
$id_asignacion_grado_seccion = $_GET['id_asignacion_grado_seccion'];
$sql = "SELECT * FROM grado g INNER join asignacion_grado_seccion ag on g.id_grado=ag.id_grado  where ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion'";
$result = $conexion->query($sql); 
while($row = $result->fetch_assoc()) {
    $nombre_grado=$row["nombre"] ;
    $seccion = $row["seccion"];
    $jornada = $row["jornada"];
    $id_anio_ciclo_escolar= $row["id_anio_ciclo_escolar"];
}  
if (isset($_POST['nombre_materia'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['nombre_materia']!="") 
    {   // Recibimos los demas datos desde el form
        $id_materia = $_POST['nombre_materia'];
        $id_catedratico = $_POST['nombre_catedratico'];


        $sql = "SELECT * FROM asignacion_maestro_seccion where id_pensum='$id_materia'  and id_asignacion_grado_seccion='$id_asignacion_grado_seccion'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
        echo'<script> swal("No se puede inscribir un nuevo catedratico a esta materia") </script';
        } else {
            $query="INSERT INTO asignacion_maestro_seccion (id_pensum,id_profesor, id_asignacion_grado_seccion) VALUES('$id_materia','$id_catedratico','$id_asignacion_grado_seccion')";
            if ($conexion->query($query) === TRUE) {
                echo "Ingresado Correctamente";
                echo'<script> swal("Ingresado Correctamente") </script';
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }          
        }

    }
}
$sql = "SELECT * FROM asignacion_maestro_seccion am inner join profesores p on p.dpi_profesor=am.id_profesor inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=am.id_asignacion_grado_seccion inner join pensum pe on pe.id_pensum = am.id_pensum where ag.id_asignacion_grado_seccion = '$id_asignacion_grado_seccion'";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Maestros asignados al grado: <?php echo $nombre_grado." sección: ".$seccion." jornada: ".$jornada;?> </h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Asignar Maestros a sección</button>
                        <button class="btn btn-info" onClick="window.location = 'asignacion_de_secciones.php?id= <?php echo $id_anio_ciclo_escolar;?>';">Regresar</button>
                       
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Materias Ingresadas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th>Id asignación</th>
                                        <th>Nombre de la materia</th>
                                        <th>Catedratico Encargado</th>
                                        <th>Cambiar catedratico</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                   while($row = $result->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>" . $row["id_asignacion_maestro_seccion"] . "</td>";
                                        echo "<td>" . $row["nombre_materia"] . "</td>";
                                        echo "<td>" . $row["nombres"] ." ". $row["apellidos"]. "</td>";
                                        $id=  $row["id_asignacion_maestro_seccion"];  
                                        echo "<td><center>" ."<a href='editar_asignacion_catedraticos.php?id=$id' class='btn btn-success ' role='button'>Cambiar</a>". "</center></td>";  
                                        
                                    }  
                                   
                                    ?>                                       
                           
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
     
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

<?php
$sql = "SELECT * FROM pensum p inner join grado g on p.id_grado = g.id_grado where p.id_grado='$id_grado' and p.estado='activo'";
$result_materia = $conexion->query($sql); 
$sql = "SELECT * FROM profesores";
$result_catedratico = $conexion->query($sql); 
?>


<body style="background: white;">

  

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Asignar Maestro</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <label for="nombre_materia">Nombre de la materia</label>
            <select class="form-control" name="nombre_materia" id="nombre_materia"> 
                <?php     while($row = $result_materia->fetch_assoc()) { ?>
                <option value="<?php echo $row["id_pensum"]?>"><?php echo $row["nombre_materia"]?></option>  
                <?php } ?>           
            </select>
            <label for="nombre_catedratico">Nombre del catedratico</label>
            <select class="form-control" name="nombre_catedratico" id="nombre_catedratico"> 
                <?php     while($row = $result_catedratico->fetch_assoc()) { ?>
                <option value="<?php echo $row["dpi_profesor"]?>"><?php echo $row["nombres"]." ".$row["apellidos"]?></option>  
                <?php } ?>           
            </select>
                    <br>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
</body>
</html>