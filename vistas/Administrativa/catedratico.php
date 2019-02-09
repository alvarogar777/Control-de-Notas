<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from

if (isset($_POST['dpi_catedratico'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['dpi_catedratico']!="" AND $_POST['nombres']!="") 
    {   // Recibimos los demas datos desde el form
        $dpi_catedratico = $_POST['dpi_catedratico'];
        $nombres = $_POST['nombres'];
        $apellidos= $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $sql = "SELECT * FROM profesores where dpi_profesor='$dpi_catedratico'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) {
		echo'<script> swal("El dpi ya fue inscrito") </script';
		} else {
			$query="INSERT INTO profesores (dpi_profesor, nombres, apellidos, telefono, correo) VALUES('$dpi_catedratico','$nombres','$apellidos','$telefono','$correo')";
	        if ($conexion->query($query) === TRUE) {
			    echo "Ingresado Correctamente";
			    echo'<script> swal("Catedratico Ingresado Correctamente") </script';
			} else {
			    echo "Error: " . $query . "<br>" . $conexion->error;
			}		   
		}

    }
}
$sql = "SELECT * FROM profesores";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Catedraticos </h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir Catedratico</button>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Catedraticos ingresados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th><center><strong>ID</strong></th>
                                        <th><center><strong>Nombres</strong></th>
                                        <th><center><strong>Apellidos</strong></th>
                                        <th><center><strong>Ver y Editar</strong></th>
                                        <th><center><strong>Imprimir Lista de grados</strong></th>
         
                                    </tr>
                                </thead>
                                <tbody>
                                    
							    <?php
								   while($row = $result->fetch_assoc()) {
								    	echo "<tr class='odd gradeX'>";
									    echo "<td><center><strong>" . $row["dpi_profesor"] . "</strong></td>";
								    	echo "<td><center><strong>" . $row["nombres"] . "</strong></td>";
								    	echo "<td><center><strong>" . $row["apellidos"] . "</strong></td>";					
								      	$id=  $row["dpi_profesor"];
								      	$nombre=$row["nombres"];
                                        echo "<td><center>" ."<a href='ver_catedratico.php?id=$id' class='btn btn-success ' role='button'>Ver y Editar</a>". "</center></td>";	
                                        echo "<td><center>" ."<a href='ingreso_id_profesor_asignacion.php?id=$id' class='btn btn-success ' role='button'>Imprimir lista</a>". "</center></td>";  					   		

								   	    echo "</tr>\n";   
								    }  
								    $conexion->close();
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




<body style="background: white;">

  

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo alumno</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="dpi_catedratico">DPI Catedratico</label>
                    <input type="number" required autocomplete="off" name="dpi_catedratico" class="form-control" id="dpi_catedratico" placeholder="Ingrese CUI">
                    <br>
                    <label for="nombres">Nombres</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" placeholder="Ingresa los nombres">
                    <br>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" required autocomplete="off" name="apellidos" class="form-control" id="apellidos" placeholder="Ingresa los apellidos">
                    <br>
                    <label for="telefono">Telefonos</label>
                    <input type="text" autocomplete="off" name="telefono" class="form-control" id="telefono" placeholder="Ingrese los telefonos">
                    <br>  
                    <label for="correo">Correo</label>
                    <input type="email"  autocomplete="off" name="correo" class="form-control" id="correo" placeholder="Ingresa el correo">
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