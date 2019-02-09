<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

$id_grado=$_GET['id'];
// Verificamos si se ha enviado el campo con name from
if (isset($_POST['id_maestro'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['id_maestro']!="") 
    {   // Recibimos los demas datos desde el form
        $id_maestro = $_POST['id_maestro'];

        $sql = "UPDATE asignacion_grado_seccion SET id_profesores='$id_maestro' where id_asignacion_grado_seccion='$id_grado'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado";
        } else {
            echo "Error: " . $conexion->error;
        }

    }
}

$sql = "SELECT g.nombre as nombre_grado, seccion, p.nombres as nombre_profesor, p.apellidos as apellido_profesor, ag.id_asignacion_grado_seccion,ac.id_anio_ciclo_escolar, ac.anio_ciclo_escolar from asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ag.id_anio_ciclo_escolar=ac.id_anio_ciclo_escolar inner join profesores p on p.dpi_profesor=ag.id_profesores inner join grado g on g.id_grado = ag.id_grado  where ag.id_asignacion_grado_seccion='$id_grado'";
$result = $conexion->query($sql); 
     
                                
                                  
                                    
//$conexion->close();
?>

  <!-- Page Content -->
    
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <h1 class="page-header"><?php echo "Año escolar ". $row["anio_ciclo_escolar"]  ?></h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Cambiar maestro guía</button>
                        <button class="btn btn-info" onClick="window.location = 'asignacion_de_secciones.php?id= <?php echo $row["id_anio_ciclo_escolar"] ?>';">Regresar</button>
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->

                    
                    <label>Grado</label>
                    <input readonly  class="form-control" value="<?php echo $row["nombre_grado"] ?>">
                    <br>
                    <label>Sección</label>
                    <input readonly  class="form-control" value="<?php echo $row["seccion"] ?>">
                    <br>
                    <label>Profesor Guía</label>
                    <input readonly  class="form-control" value="<?php echo $row["nombre_profesor"]." ".$row["apellido_profesor"] ?>">
                    <br>
    
                    <?php  } ?>
 
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
$sql = "SELECT * FROM profesores";
$result = $conexion->query($sql); 
?>


<body style="background: white;">
    <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Cambiar Maestro</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">                                                                        
                    <label for="id_maestro">Maestro Guía</label>
                    <select class="form-control" name="id_maestro" id="id_maestro">
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row["dpi_profesor"]; ?>"><?php echo $row["nombres"]." ".$row["apellidos"];?></option>
                    <?php   }   ?>
                        

                    </select>
                    <br>
      
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Editar</button>
        </form>

        
    </div>
  </div>
</div>
</div>
</body>
</html>