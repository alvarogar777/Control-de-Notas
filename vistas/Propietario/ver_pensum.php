<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from
$id_grado=$_GET['id'];

$sql = "SELECT * FROM grado p where p.id_grado='$id_grado'";
$result = $conexion->query($sql); 
while($row = $result->fetch_assoc()) {
    $nombre_grado=$row["nombre"] ;
}  
if (isset($_POST['nombres'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['nombres']!="") 
    {   // Recibimos los demas datos desde el form
        $nombres = $_POST['nombres'];


        $sql = "SELECT * FROM pensum where pensum.nombre_materia='$nombres' and pensum.id_grado='$id_grado'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
        echo'<script> swal("La Materia ya existe ") </script';
        } else {
            $query="INSERT INTO pensum (nombre_materia, estado, id_grado) VALUES('$nombres','activo','$id_grado')";
            if ($conexion->query($query) === TRUE) {
                echo "Ingresado Correctamente";
                echo'<script> swal("Materia Ingresada Correctamente") </script';
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }          
        }

    }
}
$sql = "SELECT * FROM pensum p inner join grado g on p.id_grado = g.id_grado where p.id_grado='$id_grado'";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Materias del grado <?php echo $nombre_grado?> </h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir materia</button>
                        <button class="btn btn-info" onClick="window.location = 'agregar_grado.php';">Lista de grados</button>
                        
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
                                        <th>Id materia</th>
                                        <th>Grado</th>
                                        <th>Nombre de la materia</th>
                                        <th>Estado</th>
                                        <th>Ver y Editar materia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                   while($row = $result->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td><center>" . $row["id_pensum"] . "</center></td>";
                                        echo "<td><center>" . $row["nombre"] . "</center></td>";
                                        echo "<td><center>" . $row["nombre_materia"] . "</center></td>";
                                        echo "<td><center>" . $row["estado"] . "</center></td>";
                                        $id=  $row["id_pensum"];
                                        $nombre=$row["nombre"];
                                        echo "<td><center>" ."<a href='editar_pensum.php?id=$id' class='btn btn-primary ' role='button'> Ver</a>". "</center></td>";
                                       
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
        <h4 class="modal-title" id="myModalLabel">Agregar nueva materia</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="nombres">Nombre de la materia</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" placeholder="Ingresa el nombre de la materia">
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