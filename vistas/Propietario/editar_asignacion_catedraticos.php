<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

$id_asignacion_maestro_seccion=$_GET['id'];
// Verificamos si se ha enviado el campo con name from
if (isset($_POST['nombre_catedratico'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['nombre_catedratico']!="") 
    {   // Recibimos los demas datos desde el form
        $id_profesores = $_POST['nombre_catedratico'];

        $sql = "UPDATE asignacion_maestro_seccion SET id_profesor='$id_profesores' where id_asignacion_maestro_seccion='$id_asignacion_maestro_seccion'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado";
        } else {
            echo "Error: " . $conexion->error;
        }

    }
}

$sql = "SELECT * FROM asignacion_maestro_seccion am inner join profesores p on p.dpi_profesor=am.id_profesor inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=am.id_asignacion_grado_seccion inner join pensum pe on pe.id_pensum = am.id_pensum inner join grado g on g.id_grado = ag.id_grado where am.id_asignacion_maestro_seccion = '$id_asignacion_maestro_seccion'";
$result = $conexion->query($sql); 
     
                                
                                  
                                    
//$conexion->close();
?>

  <!-- Page Content -->
    
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <h1 class="page-header"><?php echo "Grado: ".$row["nombre"]." Sección: ".$row["seccion"]." Jornada: ".$row["jornada"] ?></h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Editar</button>
                        <button class="btn btn-info" onClick="window.location = 'asignacion_catedraticos.php?id= <?php echo $row["id_grado"]."&id_asignacion_grado_seccion=".$row["id_asignacion_grado_seccion"] ?>';">Ver materias</button>
                    </div>
                </div>
                <!-- /.col-lg-12 -->

                    
                    <label>Nombre Catedratico</label>
                    <input readonly  class="form-control" value="<?php echo $row["nombres"]." ".$row["apellidos"] ?>">
                    <br>
                    <label>Nombre Materia</label>
                    <input readonly  class="form-control" value="<?php echo $row["nombre_materia"] ?>">
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