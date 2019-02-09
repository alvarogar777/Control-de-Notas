<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';



 $id_alumno=$_GET['id_alumno'];
 $id_asignacion_grado_seccion=$_GET['id_asignacion_grado_seccion'];
 $id_recibo=$_GET['id_recibo'];


$sql = "select * from alumnos where alumnos.id_alumno='$id_alumno' ";
$result_alumno = $conexion->query($sql); 

$sql = "select * from recibo r inner join asignacion_grado_seccion ag on r.id_asignacion_grado_seccion=ag.id_asignacion_grado_seccion inner join grado g on g.id_grado=ag.id_grado inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar=ag.id_anio_ciclo_escolar where id_alumno= '$id_alumno' and tipo_pago='Inscripcion' and ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' ORDER BY id_recibo DESC ";
$result_ciclo = $conexion->query($sql); 
$sql = "select * from recibo where id_alumno='$id_alumno' and tipo_pago='Inscripcion' ORDER BY id_recibo DESC ";
$result_recibo= $conexion->query($sql); 

?>
                  <div id="page-wrapper">
   

            <?php 
              if (isset($_GET['err'])) {
                echo "<script> swal('Error con la palabra clave') </script";
              }
            ?>
                  <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <h1><li class="breadcrumb-item active">Eliminación de inscripción de alumno</li></h1>
  
          </ol>
            <div class="container">
            <div class="card card-login mx-auto mt-8">
              <div class="card-body">
                <form action="eliminar_inscripcion.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <center><h3>Debera estar seguro de la eliminación</h3></center>  
                    <?php while($row = $result_alumno->fetch_assoc()) { ?>
                      <label for="id_alumno">Id alumno</label>
                      <input readonly type="number" required name="id_alumno" class="form-control" id="id_alumno" value="<?php echo $row["id_alumno"];?>"> 
                      <label for="nombre_alumno">Nombres y Apellidos</label>
                      <input readonly type="text" required name="nombre_alumno" class="form-control" id="nombre_alumno" value="<?php echo $row["nombres"]." ".$row["apellidos"];?>">
                        <?php }?>  
                        <br>
                      <label for="ciclo">Ciclo escolar</label>
                      <select class="form-control" name="ciclo" id="ciclo">
                          <?php while($row = $result_ciclo->fetch_assoc()) { ?>
                          <option value="<?php echo  $row["id_asignacion_grado_seccion"]; ?>"> <?php echo "Año: ". $row["anio_ciclo_escolar"]." Grado: ".$row["nombre"]." sección: ".$row["seccion"]." Jornada: ".$row["jornada"];?> </option>  
                          <?php }?>                         
                      </select>
                      <br>
                      <input readonly type="text" required name="id_recibo" class="form-control" id="id_recibo" value="<?php echo $id_recibo;?>">
                      
                      <label for="pase">Introduzca palabra clave</label>
                        <input type="password" required name="pase" class="form-control" id="pase" value=""> 
                        <br>          
                  </div>      
                  <center><button type="Submit" class="btn btn-primary">Eliminar</button></center>
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
<script type="text/javascript">
/*$(document).ready(function() {  
 
function realizaProceso(){       
        var parametros = {
                        "valorCaja1" : $('#ciclo').val(),               
        };
        $.ajax({
                data:  parametros,
                url:   '../peticiones/actualizar_inscripciones.php',
                type:  'post',
             
                success:  function (response) {
                       // $("#total").html(response);
                        document.getElementById("total").value = response;
                }
        });
}

    setInterval(realizaProceso, 500); 

}); */
</script>
</html>
