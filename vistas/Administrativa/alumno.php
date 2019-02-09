<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from

if (isset($_POST['nombres'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['nombres']!="" AND $_POST['apellidos']!="") 
    {   // Recibimos los demas datos desde el form
        $nombres = $_POST['nombres'];
        $apellidos= $_POST['apellidos'];
        $fecha_nacimiento  = $_POST['fecha_nacimiento'];
        $no_matricula = $_POST['no_matricula'];
        $sexo = $_POST['sexo'];
        $nombre_padre = $_POST['nombre_padre'];
        $nombre_madre = $_POST['nombre_madre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $sql = "SELECT * FROM alumnos where alumnos.matricula='$no_matricula'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) {
		echo'<script> swal("La Matricula ya existe ") </script';
		} else {
			$query="INSERT INTO alumnos (nombres, apellidos, fechanacimiento, matricula, sexo, nombrepadre, nombremadre, direccion, telefono, correo) VALUES('$nombres','$apellidos','$fecha_nacimiento','$no_matricula','$sexo','$nombre_padre','$nombre_madre','$direccion','$telefono','$correo')";
	        if ($conexion->query($query) === TRUE) {
			    echo "Ingresado Correctamente";
			    echo'<script> swal("Alumno Ingresado Correctamente") </script';
			} else {
			    echo "Error: " . $query . "<br>" . $conexion->error;
			}		   
		}

    }
}
$sql = "SELECT *, DATE_FORMAT(fechanacimiento, '%d/%m/%y')as fecha FROM alumnos";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alumnos </h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir Alumno</button>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Alumnos ingresados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th><center><strong>Matricula</strong></th>
                                        <th><center><strong>Nombres</strong></th>
                                        <th><center><strong>Apellidos</strong></th>
                                        <th><center><strong>Fecha Nacimiento</strong></th>                                  
                                        <th><center><strong>Inscribir</strong></th>
                                        <th><center><strong>Pagos</strong></th>
                                        <th><center><strong>Imprimir notas</strong></th>
                                        <th><center><strong>Ver y Editar Alumno</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
							    <?php
								   while($row = $result->fetch_assoc()) {
								    	echo "<tr class='odd gradeX'>";
									    echo "<td><center><strong>" . $row["id_alumno"] . "</strong></td>";
								    	echo "<td><center><strong>" . $row["nombres"] . "</strong></td>";
								    	echo "<td><center><strong>" . $row["apellidos"] . "</strong></td>";
								    	echo "<td><center><strong>" . $row["fecha"] . "</td>";
								      	$id=  $row["id_alumno"];
								      	$nombre=$row["nombres"];
								   		
                                        echo "<td><center>" ."<a href='asignacion_inscripcion?id=$id' class='btn btn-success ' role='button'>Inscribir</a>". "</center></td>";
								      	 echo "<td><center>" ."<a href='mensualidades.php?id=$id' class='btn btn-success ' role='button'>Pagos</a>". "</center></td>";
                                         echo "<td><center>" ."<a href='notas_id_personal.php?id=$id' class='btn btn-success ' role='button'>Imprimir</a>". "</center></td>";
								   	     
                                        echo "<td><center>" ."<a href='ver_alumno.php?id=$id' class='btn btn-primary ' role='button'>Editar</a>". "</center></td>";
                                          echo "</tr>";
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
                    <label for="nombres">Nombres</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" placeholder="Ingresa los nombres">
                    <br>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" required autocomplete="off" name="apellidos" class="form-control" id="apellidos" placeholder="Ingresa los apellidos">
                    <br>
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" required autocomplete="off" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="Ingresa fecha de nacimiento">
                    <br>  
                    <label for="no_matricula">Matricula</label>
                    <input type="text" required autocomplete="off" name="no_matricula" class="form-control" id="no_matricula" placeholder="Ingresa la matricula">
                    <br>                                                                            
                    <label for="sexo">sexo</label>
                    <select class="form-control" name="sexo" id="sexo">
                        <option value="masculino">masculino</option>
                        <option value="femenino">femenino</option>          
                    </select>
                    <br>
                    <label for="nombre_padre">Nombre del padre</label>
                    <input type="text" autocomplete="off" name="nombre_padre" class="form-control" id="nombre_padre" placeholder="Nombre completo del padre">
                    <br>
                    <label for="nombre_madre">Nombre de la madre</label>
                    <input type="text"  autocomplete="off" name="nombre_madre" class="form-control" id="nombre_madre" placeholder="Nombre completo de la madre">
                    <br>
                    <label for="direccion">Dirección</label>
                    <input type="text" autocomplete="off" name="direccion" class="form-control" id="direccion" placeholder="Dirección completa">
                    <br>
                    <label for="telefono">Telefonos</label>
                    <input type="text"  autocomplete="off" name="telefono" class="form-control" id="telefono" placeholder="Telefonos">
                    <br>
                    <label for="correo">Correo</label>
                    <input type="text"  autocomplete="off" name="correo" class="form-control" id="correo" placeholder="correo">
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