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
    if ($_POST['nombres']!="") 
    {   // Recibimos los demas datos desde el form
        $nombres = $_POST['nombres'];
        $categoria = $_POST['categoria'];

        $sql = "SELECT * FROM grado where grado.nombre='$nombres'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
        echo'<script> swal("El nombre ya existe") </script';
        } else {
            $query="INSERT INTO grado (nombre,categoria) VALUES('$nombres','$categoria')";
            if ($conexion->query($query) === TRUE) {
                echo "Ingresado Correctamente";
                echo'<script> swal("Salon Ingresado Correctamente") </script';
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }          
        }

    }
}
$sql = "SELECT * FROM grado";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Grados </h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir Grado</button>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Grados Ingresados
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Editar e imprimir materias</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                   while($row = $result->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td><center>" . $row["id_grado"] . "</center></td>";
                                        echo "<td><center>" . $row["nombre"] . "</center></td>";
                                        echo "<td><center>" . $row["categoria"] . "</center></td>";
 
                                        $id=  $row["id_grado"];
                                        $nombre=$row["nombre"];
                                 
                                       echo "<td><center>" ."<a href='ver_pensum.php?id=$id' class='btn btn-success ' role='button'> Ver y Editar</a>". "</center></td>";
 
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
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo </h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="nombres">Nombre completo del grado</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" placeholder="Ingresa el nombre">
                    <br>  
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="categoria" id="categoria">                    
                        <option value="Pre-primaria">Pre-primaria</option>  
                        <option value="Primaria">Primaria</option>                     
                        <option value="Basicos">Basicos</option>   
                        <option value="Diversificado">Diversificado</option>                         
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