<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';



 $id_alumno=$_GET['id'];
 $id_asignacion_grado_seccion=$_GET['id_grado'];
 $anio=$_GET['anio'];

$sql = "SELECT * FROM tipo_pago WHERE anio = $anio";
$result_mensualidades = $conexion->query($sql); 

$sql = "SELECT * FROM tipo_pago WHERE anio = $anio";
$result_tipo_pago = $conexion->query($sql); 

$sql = "SELECT * FROM alumnos where id_alumno='$id_alumno'";
$result_alumno = $conexion->query($sql); 


?>
                   <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pagos Relizados</h1>
                    <div class="pull-right form-inline"><br>
              
                        <button class="btn btn-success" onClick="window.location = 'mensualidades.php?id=<?php echo $id_alumno; ?>';">Regresar</button>
                    </div>
                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" > 
                                <thead>
                                    <tr>                                      
                      
                                        <th>Año</th>
                                        <th>Nombre del pago</th>
                                        <th>Estado</th>
                                        <th>Imprimir</th>
                                    </tr>
                                </thead>
                                <tbody>                        
                                  <?php
                                  echo "<tr class='odd gradeX'>";
                                   while($row = $result_mensualidades->fetch_assoc()) {
                                        $id_tipo_pago = $row["id_tipo_pago"];
                                        $nombre_pago= $row["nombre_pago"];
                                        $sql = "SELECT * FROM recibo where id_alumno='$id_alumno' and id_asignacion_grado_seccion='$id_asignacion_grado_seccion' and tipo_pago='$id_tipo_pago'";
                                        $result_estado = $conexion->query($sql);    
                                        $estado=0;
                                        while($row = $result_estado->fetch_assoc()) {
                                          $estado=1;
                                        }

                                        echo "<td>" .$anio. "</td>";
                                        echo "<td>" .$nombre_pago. "</td>";
                                        if ($estado==1) {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                            ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_pagos_varios.php?id= <?php echo $id_alumno."&id_ciclo=".$id_asignacion_grado_seccion."&id_pago=".$id_tipo_pago;  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                       
                         
                                        ?>
                                 
</td>       

                                        <?php
       
                                        
                                    }                                     
                                    ?> 
                              
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                <?php 
              if (isset($_GET['err'])) {
                echo "<script> swal('Error con la palabra clave') </script";
              }
            ?>
        

  
          
            <div class="container">
            <div class="card card-login mx-auto mt-8">
              <div class="card-body">
                <form action="guardar_recibo_otros.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <center><h3>Verifique bien los datos antes de el pago </h3></center>  
                    <?php while($row = $result_alumno->fetch_assoc()) { ?>
                      <label for="id_alumno">Id alumno</label>
                      <input readonly type="number" required name="id_alumno" class="form-control" id="id_alumno" value="<?php echo $row["id_alumno"];?>"> 
                      <label for="nombre_alumno">Nombres y Apellidos</label>
                      <input readonly type="text" required name="nombre_alumno" class="form-control" id="nombre_alumno" value="<?php echo $row["nombres"]." ".$row["apellidos"];?>">
                        <?php }?>  
                        <br>
                      <label for="nombre_pago">pago</label>
                      <select class="form-control" name="nombre_pago" id="nombre_pago">    
                      <?php
                      while($row = $result_tipo_pago->fetch_assoc()) { ?>
                          <option value="<?php echo $row["id_tipo_pago"]; ?>"> <?php echo $row["nombre_pago"]; ?> </option>
                       <?php }
                      ?>                                                                                  
           
                      </select>
                      <br>   
                      <input hidden  type="number" name="ciclo" value="<?php echo  $id_asignacion_grado_seccion ?>"> 
                      <input hidden  type="text" name="anio" value="<?php echo  $anio?>"> 

                
                      <label for="total">Cantidad de Pago</label>
                        <input type="number"  step='0.01' required name="total" class="form-control" id="total" > 
                        <br>
                      <label for="persona_paga">Nombre de la persona o institución a quien desea que salga el recibo</label>
                        <input type="text" required name="persona_paga" class="form-control" id="persona_paga" value=""> 
                        <br>
                      <label for="pase">Introduzca palabra clave</label>
                        <input type="password" required name="pase" class="form-control" id="pase" value=""> 
                        <br>          
                  </div>      
                  <center><button type="Submit" class="btn btn-primary">Pagar</button></center>
                </form>  
              </div>
            </div>
          </div>
        </div>
      </div>

     
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

    <script type="text/javascript">
$(document).ready(function() {  
 
function realizaProceso(){       
        var parametros = {
                        "valorCaja1" : $('#nombre_pago').val(),               
        };
        $.ajax({
                data:  parametros,
                url:   '../../peticiones/actualizar_total_pago.php',
                type:  'post',
             
                success:  function (response) {
                       // $("#total").html(response);
                        document.getElementById("total").value = response;
                }
        });
}

    setInterval(realizaProceso, 500); 

}); 
</script>

</body>

</html>
