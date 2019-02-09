<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';



 $id_alumno=$_GET['id'];


$sql = "select * from alumnos where alumnos.id_alumno='$id_alumno' ";
$result_alumno = $conexion->query($sql); 

$sql = "select * from recibo r inner join asignacion_grado_seccion ag on r.id_asignacion_grado_seccion=ag.id_asignacion_grado_seccion inner join grado g on g.id_grado=ag.id_grado inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar=ag.id_anio_ciclo_escolar where id_alumno= '$id_alumno' and tipo_pago='Inscripcion' ORDER BY id_recibo DESC";
$result_ciclo = $conexion->query($sql); 


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
                                        <th>Grado</th>
                                        <th>Sección</th>
                                        <th>Jornada</th>
                                        <th>Año</th>
                                        <th>  Imprimir </th>
                                    </tr>
                                </thead>
                                <tbody>                        
                                  <?php
                                   while($row = $result_ciclo->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>" . $row["nombre"] . "</td>";
                                        echo "<td>" . $row["seccion"] . "</td>";
                                        echo "<td>" . $row["jornada"] . "</td>";
                                        echo "<td>" . $row["anio_ciclo_escolar"] . "</td>";
                                        $id=  $row["id_asignacion_grado_seccion"];  
                                        $id_alumno=  $row["id_alumno"]; 
                                         ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirNotasIdPersonal.php?id= <?php echo $id."&id_alumno=".$id_alumno  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" />
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
