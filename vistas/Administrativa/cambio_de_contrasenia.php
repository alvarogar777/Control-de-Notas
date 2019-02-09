<?php 

include '../../conexion/config.php';
$nombre_pago=$_POST['nombre_pago'];
$passe=$_POST['passe'];
$error=0;
$sql = "SELECT * FROM usuarios where usuario='Root'";
$result_pase= $conexion->query($sql); 
while($row = $result_pase->fetch_assoc()) { 
          $pase_encr = $row["password"];  
 } 
 if (md5($passe) != $pase_encr)
  {
    $url = "ingreso_id_cambio_pass.php?err=1";
	header('Location: '.$url);
	exit();
  }

  if ($nombre_pago==1) {
  	$tipo="Root";
  }
  if ($nombre_pago==2) {
  	$tipo="Admin";
  }
  if ($nombre_pago==3) {
  	$tipo="Catedratico";
  }


  if (isset($_POST['passe2'])) {
  	if ($_POST['passe2'] == $_POST['passe3']) {
  		$passe2 =md5($_POST['passe2']);
  		$sql = "UPDATE usuarios SET password='$passe2' where tipo='$tipo'";
        if ($conexion->query($sql) === TRUE) {
            $url = "ingreso_id_cambio_pass.php?done=1";
			header('Location: '.$url);
        } else {
            echo "Error: " . $conexion->error;
        }

  	}
  	else{
  		$error=1;  		
  	}
  }

include "head.php";
?>

   <div id="page-wrapper">
   <div class="row">
                <div class="col-lg-12">
                	<?php 
                	if ($error==1) {
                		echo'<script> swal("Error las contraseñas no coinciden") </script';
                	}
                	
                	?>
  
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php 
              if (isset($_GET['err'])) {
                echo "<script> swal('Error con la palabra clave') </script";
              }
            ?>
                   <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cambio de contraseñas <?php echo $tipo; ?></h1>
                    <div class="pull-right form-inline"><br>
                      
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
  
          </ol>
            <div class="container">
            <div class="card card-login mx-auto mt-8">
              <div class="card-body">
                <br><br>
                <form action="#" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <center><h3>Cambio de contraseñas</h3></center> 
                   	<input type="hidden" required name="nombre_pago" class="form-control" id="nombre_pago" value="<?php echo $nombre_pago ?>"> 
                     <br>
                     <input type="hidden" required name="passe" class="form-control" id="passe" value="<?php echo $passe?>"> 
                     <br>
                    <label for="passe2">Ingrese su nueva contraseña</label>
                        <input type="password" required name="passe2" class="form-control" id="passe2" value="" placeholder="contraseña"> 
                    <br>
                    <label for="passe3">Ingrese nuevamente</label>
                        <input type="password" required name="passe3" class="form-control" id="passe3" value="" placeholder="contraseña"> 
                    <br>
                    <br>
                               
                  </div>      
                  <center><button type="Submit" class="btn btn-primary">Entrar</button></center>
                </form>  
              </div>
            </div>
          </div>
        </div>
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
