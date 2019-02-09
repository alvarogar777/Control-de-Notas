<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';
$id_anio_ciclo_escolar = $_GET['id'];
$sql = "SELECT * FROM anio_ciclo_escolar a where a.id_anio_ciclo_escolar='$id_anio_ciclo_escolar'";
$result = $conexion->query($sql);
while($row = $result->fetch_assoc()) {
$anio_ciclo_escolar = $row["anio_ciclo_escolar"] ;
}  

$sql = "SELECT g.nombre as nombre_grado, seccion, p.nombres as nombre_profesor, p.apellidos as apellido_profesor, ag.id_asignacion_grado_seccion,jornada, g.id_grado  from asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ag.id_anio_ciclo_escolar=ac.id_anio_ciclo_escolar inner join profesores p on p.dpi_profesor=ag.id_profesores inner join grado g on g.id_grado = ag.id_grado where ac.id_anio_ciclo_escolar='$id_anio_ciclo_escolar' ";
$result = $conexion->query($sql); 

$sql = "SELECT * FROM tipo_pago where anio ='$anio_ciclo_escolar' ";
$result_tipo_pago = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Grados asignados al año: <?php echo $anio_ciclo_escolar; ?></h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-info" onClick="window.location = 'ingreso_id_imprimir_solvencia.php';">Regresar</button>
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Grado y secciones abiertas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                <form action="../pdf/imprimirMoraEventoMes.php" method="POST" enctype="multipart/form-data" target="_blank">
                  <div class="form-group">
                    <center><h3>Seleccione la informacion</h3></center>                  
      
                     
                        <label for="ciclo">Ciclo escolar</label>
                          <select class="form-control" name="ciclo" id="ciclo">
                              <?php while($row = $result->fetch_assoc()) { ?>
                              <option value="<?php echo  $row["id_asignacion_grado_seccion"]; ?>"> <?php echo " Grado: ".$row["nombre_grado"]." Sección: ".$row["seccion"]." Jornada: ".$row["jornada"];?> </option>  
                              <?php }?>                         
                          </select>
                        <br>
                        <label for="tipo_pago">Tipo de pago</label>
                          <select class="form-control" name="tipo_pago" id="tipo_pago">
                              <?php while($row = $result_tipo_pago->fetch_assoc()) { ?>
                              <option value="<?php echo  $row["id_tipo_pago"]; ?>"> <?php echo $row["nombre_pago"];?> </option>  
                              <?php }?>                         
                          </select>
                        <br>
                        
                               
                  </div>      
                  <center><button type="Submit" class="btn btn-primary">Entrar</button></center>
                </form> 
             
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