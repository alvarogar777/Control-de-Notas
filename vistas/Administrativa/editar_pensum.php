<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

$id_grado=$_GET['id'];
// Verificamos si se ha enviado el campo con name from
if (isset($_POST['nombres'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['nombres']!="") 
    {   // Recibimos los demas datos desde el form
        $nombre_materia = $_POST['nombres'];
        $estado = $_POST['estado'];

        $sql = "UPDATE pensum SET nombre_materia='$nombre_materia', estado='$estado' where id_pensum='$id_grado'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado";
        } else {
            echo "Error: " . $conexion->error;
        }

    }
}

$sql = "SELECT * FROM pensum where id_pensum = $id_grado";
$result = $conexion->query($sql); 
     
                                
                                  
                                    
//$conexion->close();
?>

  <!-- Page Content -->
    
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php while($row = $result->fetch_assoc()) { ?>
                    <h1 class="page-header">Materia</h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Editar materia</button>
                        <button class="btn btn-info" onClick="window.location = 'ver_pensum.php?id= <?php echo $row["id_grado"] ?>';">Ver materias</button>
                    </div>
                </div>
                <!-- /.col-lg-12 -->

                    
                    <label>Nombre</label>
                    <input readonly  class="form-control" value="<?php echo $row["nombre_materia"] ?>">
                    <br>
                    <label>Estado</label>
                    <input readonly  class="form-control" value="<?php echo $row["estado"] ?>">
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
$sql = "SELECT * FROM pensum where id_pensum = $id_grado";
$result = $conexion->query($sql); 
?>


<body style="background: white;">
    <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Editar materia</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">

            <?php while($row = $result->fetch_assoc()) { ?>

                    <label for="id_alumno">Id</label>
                    <input type="text" required autocomplete="off" name="id_alumno" class="form-control" id="id_alumno" value="<?php echo $id_grado ?>" readonly>
                    <br>
                    <label for="nombres">Nombres</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" value="<?php echo $row["nombre_materia"] ?>">
                    <br>                                                                            
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="estado">
                        <?php if($row["estado"]=='activo'){ ?>
                        <option value="activo">activo</option>  
                        <option value="inactivo">inactivo</option>
                        <?php } else{ ?>  
                        <option value="inactivo">inactivo</option>
                        <option value="activo">activo</option>                          
                        <?php }?>

                    </select>
                    <br>
      
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Editar</button>
        </form>

        <?php   }  

        ?>
    </div>
  </div>
</div>
</div>
</body>
</html>