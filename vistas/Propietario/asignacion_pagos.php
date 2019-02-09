<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from


$sql = "SELECT * FROM grado p ";
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
        $cantidad = $_POST['cantidad'];
        $anio = $_POST['anio'];


        $sql = "SELECT * FROM tipo_pago t where t.nombre_pago='$nombres'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
        echo'<script> swal("El nombre del pago ya existe") </script';
        } else {
            $query="INSERT INTO tipo_pago (nombre_pago, estado, pago,anio) VALUES('$nombres','activo','$cantidad','$anio')";
            if ($conexion->query($query) === TRUE) {
                echo "Ingresado Correctamente";
                echo'<script> swal("El nuevo pago fue ingresado Exitosamente") </script';
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }          
        }

    }
}
$sql = "SELECT * FROM tipo_pago";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tipos de pagos</h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir nuevo pago</button>

                       
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pagos Ingresadas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th>Id Pago</th>
                                        <th>Nombre del pago</th>
                                        <th>Cantidad</th>
                                        <th>Año</th>
                                        <th>Estado</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                   while($row = $result->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td><center>" . $row["id_tipo_pago"] . "</td>";
                                        echo "<td><center>" . $row["nombre_pago"] . "</td>";
                                        echo "<td><center>" . $row["pago"] . "</td>";
                                        echo "<td><center>" . $row["anio"] . "</td>";
                                        echo "<td><center>" . $row["estado"] . "</td>";
                                        $id=  $row["id_tipo_pago"];
                                        echo "<td><center>" ."<a href='editar_asignacion_pagos.php?id=$id' class='btn btn-success ' role='button'>Ver y Editar</a>". "</center></td>";
                                     
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
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo pago</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="nombres">Nombre de el pago</label>
                    <input type="text" required autocomplete="off" name="nombres" class="form-control" id="nombres" placeholder="Ingresa el nombre de la materia">
                    <br>


                    <label for="cantidad">Cantidad</label>
                    <input type="number" step="0.01" required autocomplete="off" name="cantidad" class="form-control" id="cantidad" placeholder="Ingresa el pago requerido">
                    <br>
                    <label for="anio">Año</label>
                    <input type="number"  required autocomplete="off" name="anio" class="form-control" id="anio" placeholder="Ingresa el pago requerido">
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