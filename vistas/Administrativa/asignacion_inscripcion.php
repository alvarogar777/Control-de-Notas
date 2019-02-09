<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';



 $id_alumno=$_GET['id'];


$sql = "select * from alumnos where alumnos.id_alumno='$id_alumno' ";
$result_alumno = $conexion->query($sql); 

$sql = "SELECT g.nombre as nombre_grado, seccion, p.nombres as nombre_profesor, p.apellidos as apellido_profesor, ag.id_asignacion_grado_seccion,jornada, g.id_grado, ac.anio_ciclo_escolar, g.categoria from asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ag.id_anio_ciclo_escolar=ac.id_anio_ciclo_escolar inner join profesores p on p.dpi_profesor=ag.id_profesores inner join grado g on g.id_grado = ag.id_grado where estado_ciclo_escolar= 'activo' ORDER BY `ac`.`anio_ciclo_escolar` DESC  ";
$result_ciclo = $conexion->query($sql); 
$sql = "select * from recibo where id_alumno='$id_alumno' and tipo_pago='Inscripcion' ORDER BY id_recibo DESC ";
$result_recibo= $conexion->query($sql); 

?>
                  <div id="page-wrapper">
   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ultimo pago
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>                                      
                                        <th>Id recibo</th>
                                        <th>Fecha y hora de pago</th>
                                        <th>Tipo de pago</th>
                                        <th>  Imprimir </th>
                                    </tr>
                                </thead>
                                <tbody>                        
                                  <?php
                                   while($row = $result_recibo->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>" . $row["id_recibo"] . "</td>";
                                        echo "<td>" . date("d/m/Y", strtotime($row["fecha_hora_pago"]))  . "</td>";
                                        echo "<td>" . $row["tipo_pago"] . "</td>";
                                        $id=  $row["id_recibo"];  
                                         ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf.php?id= <?php echo $row["id_recibo"]  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" />
</td>       

                                        <?php
       
                                        
                                    }                                     
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
            <!-- /.row -->

            <?php 
              if (isset($_GET['err'])) {
                echo "<script> swal('Error con la palabra clave') </script";
              }
            ?>
                  <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <h1><li class="breadcrumb-item active">Inscripción del alumno </li></h1>
  
          </ol>
            <div class="container">
            <div class="card card-login mx-auto mt-8">
              <div class="card-body">
                <form action="guardar_recibo.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <center><h3>Verifique bien los datos antes de la inscripción</h3></center>  
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
                          <option value="<?php echo  $row["id_asignacion_grado_seccion"]; ?>"> <?php echo "Año: ". $row["anio_ciclo_escolar"]." Grado: ".$row["nombre_grado"]." sección: ".$row["seccion"]." Jornada: ".$row["jornada"];?> </option>  
                          <?php }?>                         
                      </select>
                      <br>
                      <label for="total">Pago de Inscripción</label>
                        <input type="number"  step='0.01' required name="total" class="form-control" id="total" > 
                        <br>
                      <label for="persona_paga">Nombre de la persona o institución a quien desea que salga el recibo</label>
                        <input type="text" required name="persona_paga" class="form-control" id="persona_paga" value=""> 
                        <br>
                      <label for="pase">Introduzca palabra clave</label>
                        <input type="password" required name="pase" class="form-control" id="pase" value=""> 
                        <br>          
                  </div>      
                  <center><button type="Submit" class="btn btn-primary">Inscribir</button></center>
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
