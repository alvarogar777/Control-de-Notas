<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['dpi_profesor'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['dpi_profesor']!="" AND $_POST['nombres']!="") 
    {   // Recibimos los demas datos desde el form
        $id_catedratico = $_GET['id'];
        $dpi_profesor = $_POST['dpi_profesor'];
        $nombres = $_POST['nombres'];
        $apellidos= $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        $sql = "UPDATE profesores SET dpi_profesor='$dpi_profesor', apellidos='$apellidos',nombres='$nombres',telefono='$telefono',correo='$correo' where dpi_profesor='$id_catedratico'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado";
        } else {
            echo "Error: Ya existe el dpi " . $conexion->error;
            echo'<script> swal("Error: El dpi ya fue inscrito") </script';
        }

    }
}
$id_catedratico = $_GET['id'];
$sql = "SELECT * FROM profesores where dpi_profesor = $id_catedratico";
$result = $conexion->query($sql); 
     
                                
                                  
                                    
//$conexion->close();
?>

  <!-- Page Content -->
    
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Catedratico</h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Editar Catedratico</button>
                        <button class="btn btn-info" onClick="window.location = 'catedratico.php';">Lista de catedraticos</button>
                    </div>
                </div>
                <!-- /.col-lg-12 -->

                    <?php while($row = $result->fetch_assoc()) { ?>
                    <label>DPI</label>
                    <input readonly class="form-control" value="<?php echo $row["dpi_profesor"] ?>">
                    <br>
                    <label>Nombres</label>
                    <input readonly  class="form-control" value="<?php echo $row["nombres"] ?>">
                    <br>
                    <label>Apellidos</label>
                    <input readonly  class="form-control" value="<?php echo $row["apellidos"] ?>">
                    <br>                   
                    <label>Telefonos</label>
                    <input readonly class="form-control" value="<?php echo $row["telefono"] ?>">
                    <br>
                    <label>Correo</label>
                    <input readonly class="form-control" value="<?php echo $row["correo"] ?>">
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
$id_catedratico = $_GET['id'];
$sql = "SELECT * FROM profesores where dpi_profesor = $id_catedratico";
$result = $conexion->query($sql); 
?>


<body style="background: white;">
    <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Editar Caterdatico</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">

            <?php while($row = $result->fetch_assoc()) { ?>

                    <label for="dpi_profesor">DPI</label>
                    <input type="number" required autocomplete="off" name="dpi_profesor" class="form-control" id="dpi_profesor" value="<?php echo $row['dpi_profesor'] ?>">
                    <br>
                    <label for="nombres">Nombres</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" value="<?php echo $row["nombres"] ?>">
                    <br>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" required autocomplete="off" name="apellidos" class="form-control" id="apellidos" value="<?php echo $row["apellidos"] ?>">
                    <br>                    
                    <label for="telefono">Telefonos</label>
                    <input type="text"  autocomplete="off" name="telefono" class="form-control" id="telefono" <?php echo $row["telefono"] ?>>
                    <br>
                    <label for="correo">Correo</label>
                    <input type="text"  autocomplete="off" name="correo" class="form-control" id="correo" <?php echo $row["correo"] ?>>
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