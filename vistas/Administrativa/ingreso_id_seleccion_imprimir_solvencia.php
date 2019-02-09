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
if (isset($_POST['id_grado'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['id_grado']!="") 
    {   // Recibimos los demas datos desde el form
        $id_grado = $_POST['id_grado'];
        $seccion = $_POST['seccion'];
        $profesor = $_POST['profesor'];
        $jornada = $_POST['jornada'];

        $sql = "SELECT * FROM asignacion_grado_seccion a where a.id_anio_ciclo_escolar='$id_anio_ciclo_escolar' and a.seccion ='$seccion' and a.id_grado=$id_grado and a.jornada='$jornada'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
        echo'<script> swal("La sección y el grado ya fueron abiertos") </script';
        } else {
            $query="INSERT INTO asignacion_grado_seccion (id_anio_ciclo_escolar,seccion,id_profesores,id_grado,jornada) VALUES('$id_anio_ciclo_escolar','$seccion','$profesor','$id_grado','$jornada')";
            if ($conexion->query($query) === TRUE) {
                echo "Ingresado Correctamente";
                echo'<script> swal("Grado y sección Ingresado Correctamente") </script';
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }          
        }

    }
}
$sql = "SELECT g.nombre as nombre_grado, seccion, p.nombres as nombre_profesor, p.apellidos as apellido_profesor, ag.id_asignacion_grado_seccion,jornada, g.id_grado  from asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ag.id_anio_ciclo_escolar=ac.id_anio_ciclo_escolar inner join profesores p on p.dpi_profesor=ag.id_profesores inner join grado g on g.id_grado = ag.id_grado where ac.id_anio_ciclo_escolar='$id_anio_ciclo_escolar' ";
$result = $conexion->query($sql); 

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
                <form action="../pdf/imprimirMoraMes.php" method="POST" enctype="multipart/form-data" target="_blank">
                  <div class="form-group">
                    <center><h3>Seleccione la informacion</h3></center>                  
      
                     
                        <label for="ciclo">Ciclo escolar</label>
                          <select class="form-control" name="ciclo" id="ciclo">
                              <?php while($row = $result->fetch_assoc()) { ?>
                              <option value="<?php echo  $row["id_asignacion_grado_seccion"]; ?>"> <?php echo " Grado: ".$row["nombre_grado"]." Sección: ".$row["seccion"]." Jornada: ".$row["jornada"];?> </option>  
                              <?php }?>                         
                          </select>
                        <br>
                        <label for="mes">Mes</label>
                           <select class="form-control" name="mes" id="mes">                   
                              <option value="enero"> Enero </option>    
                              <option value="febrero"> Febrero </option>  
                              <option value="marzo"> Marzo </option>  
                              <option value="abril"> Abril </option>    
                              <option value="mayo"> Mayo </option>  
                              <option value="junio"> Junio </option>  
                              <option value="julio"> Julio </option>  
                              <option value="agosto"> Agosto </option>  
                              <option value="septiembre"> Septiembre</option>  
                              <option value="octubre"> Octubre </option>  
                              <option value="noviembre"> Noviembre </option>  
                              
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