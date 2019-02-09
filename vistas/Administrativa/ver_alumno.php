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
        $id_alumno = $_POST['id_alumno'];
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

        $sql = "UPDATE alumnos SET nombres='$nombres', apellidos='$apellidos',fechanacimiento='$fecha_nacimiento',matricula='$no_matricula',sexo='$sexo',nombrepadre='$nombre_padre',nombremadre='$nombre_madre',direccion='$direccion',telefono='$telefono',correo='$correo' where id_alumno='$id_alumno'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado";
        } else {
            echo "Error: " . $conexion->error;
        }

    }
}
$id_alumno = $_GET['id'];
$sql = "SELECT * FROM alumnos where id_alumno = $id_alumno";
$result = $conexion->query($sql); 
     
                                
                                  
                                    
//$conexion->close();
?>

  <!-- Page Content -->
    
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alumno</h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Editar Alumno</button>
                        <button class="btn btn-info" onClick="window.location = 'alumno.php';">Lista de alumnos</button>
                    </div>
                </div>
                <!-- /.col-lg-12 -->

                    <?php while($row = $result->fetch_assoc()) { ?>
                    <label>Nombres</label>
                    <input readonly  class="form-control" value="<?php echo $row["nombres"] ?>">
                    <br>
                    <label>Apellidos</label>
                    <input readonly  class="form-control" value="<?php echo $row["apellidos"] ?>">
                    <br>
                    <label>Fecha de Nacimiento</label>
                    <input readonly class="form-control" value="<?php echo $row["fechanacimiento"] ?>">
                    <br>
                    <label>Matricula</label>
                    <input readonly class="form-control" value="<?php echo $row["matricula"] ?>">
                    <br>
                    <label>Sexo</label>
                    <input readonly class="form-control" value="<?php echo $row["sexo"] ?>">
                    <br>
                    <label>Nombre del padre</label>
                    <input readonly class="form-control" value="<?php echo $row["nombrepadre"] ?>">
                    <br>
                    <label>Fecha de la Madre</label>
                    <input readonly class="form-control" value="<?php echo $row["nombremadre"] ?>">
                    <br>
                    <label>Direccion</label>
                    <input readonly class="form-control" value="<?php echo $row["direccion"] ?>">
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
$id_alumno = $_GET['id'];
$sql = "SELECT * FROM alumnos where id_alumno = $id_alumno";
$result = $conexion->query($sql); 
?>


<body style="background: white;">
    <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Editar Alumno</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">

            <?php while($row = $result->fetch_assoc()) { ?>

                    <label for="id_alumno">Id</label>
                    <input type="text" required autocomplete="off" name="id_alumno" class="form-control" id="id_alumno" value="<?php echo $id_alumno ?>" readonly>
                    <br>
                    <label for="nombres">Nombres</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" value="<?php echo $row["nombres"] ?>">
                    <br>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" required autocomplete="off" name="apellidos" class="form-control" id="apellidos" value="<?php echo $row["apellidos"] ?>">
                    <br>
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" required autocomplete="off" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="<?php echo $row["fechanacimiento"] ?>">
                    <br>  
                    <label for="no_matricula">Matricula</label>
                    <input type="text" required autocomplete="off" name="no_matricula" class="form-control" id="no_matricula" value="<?php echo $row["matricula"] ?>">
                    <br>                                                                            
                    <label for="sexo">sexo</label>
                    <select class="form-control" name="sexo" id="sexo">
                        <?php if($row["sexo"]=='femenino'){ ?>
                        <option value="femenino">femenino</option>  
                        <option value="masculino">masculino</option>
                        <?php } else{ ?>  
                        <option value="masculino">masculino</option>
                        <option value="femenino">femenino</option>                          
                        <?php }?>

                    </select>
                    <br>
                    <label for="nombre_padre">Nombre del padre</label>
                    <input type="text" autocomplete="off" name="nombre_padre" class="form-control" id="nombre_padre" <?php echo $row["nombrepadre"] ?>>
                    <br>
                    <label for="nombre_madre">Nombre de la madre</label>
                    <input type="text"  autocomplete="off" name="nombre_madre" class="form-control" id="nombre_madre" <?php echo $row["nombremadre"] ?>>
                    <br>
                    <label for="direccion">Dirección</label>
                    <input type="text" autocomplete="off" name="direccion" class="form-control" id="direccion" <?php echo $row["direccion"] ?>>
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