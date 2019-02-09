<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';



 $id_alumno=$_GET['id'];
 $id_asignacion_grado_seccion=$_GET['id_grado'];



$sql = "SELECT * FROM mensuallidades where id_alumno='$id_alumno' and id_asignacion_grado_seccion='$id_asignacion_grado_seccion' ";
$result_mensualidades = $conexion->query($sql); 

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
                      
                                        <th>Mes</th>
                                        <th>Estado</th>
                                        <th>Imprimir</th>
                                    </tr>
                                </thead>
                                <tbody>                        
                                  <?php
                                   while($row = $result_mensualidades->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        $id_alumno = $row["id_alumno"];
                                       
                                        echo "<td>" ."Enero". "</td>";
                                        if (!$row["enero"]==null or !$row["enero"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                            ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=enero";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Febrero". "</td>";
                                        if (!$row["febrero"]==null or !$row["febrero"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=febrero";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Marzo". "</td>";
                                        if (!$row["marzo"]==null or !$row["marzo"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=marzo";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Abril". "</td>";
                                        if (!$row["abril"]==null or !$row["abril"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=abril";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Mayo". "</td>";
                                        if (!$row["mayo"]==null or !$row["mayo"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";     
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=mayo";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php                                       
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Junio". "</td>";
                                        if (!$row["junio"]==null or !$row["junio"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=junio";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Julio". "</td>";
                                        if (!$row["julio"]==null or !$row["julio"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=julio";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Agosto". "</td>";
                                        if (!$row["agosto"]==null or !$row["agosto"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=agosto";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Septiembre". "</td>";
                                        if (!$row["septiembre"]==null or !$row["septiembre"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=septiembre";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                        echo "<td>" ."Octubre". "</td>";
                                        if (!$row["octubre"]==null or !$row["octubre"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=octubre";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
                                        <?php
                                        }
                                        else{
                                         echo "<td class='danger'>" . "No Pagado" . "</td>";
                                         echo "<td class='danger'>" . " " . "</td></tr>";
                                        }

                                         echo "<td>" ."Noviembre". "</td>";
                                        if (!$row["noviembre"]==null or !$row["noviembre"]=="") {
                                            echo "<td class='success'>" . "Pagado" . "</td>";
                                             ?>
                                        <td>  <input type="button" class="btn btn-danger" value="Imprimir" onclick="javascript:window.open('../pdf/impimirPdf_mes.php?id= <?php echo $row["id_alumno"]."&id_ciclo=".$id_asignacion_grado_seccion."&mes=noviembre";  ?>','','width=900,height=700,left=50,top=50,toolbar=yes');" /> </tr></td>  
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
                <form action="guardar_recibo_mensualidades.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <center><h3>Verifique bien los datos antes de el pago </h3></center>  
                    <?php while($row = $result_alumno->fetch_assoc()) { ?>
                      <label for="id_alumno">Id alumno</label>
                      <input readonly type="number" required name="id_alumno" class="form-control" id="id_alumno" value="<?php echo $row["id_alumno"];?>"> 
                      <label for="nombre_alumno">Nombres y Apellidos</label>
                      <input readonly type="text" required name="nombre_alumno" class="form-control" id="nombre_alumno" value="<?php echo $row["nombres"]." ".$row["apellidos"];?>">
                        <?php }?>  
                        <br>
                      <label for="mes">Mes</label>
                      <select class="form-control" name="mes" id="mes">                          
                          <option value="enero"> Enero </option>  
                          <option value="febrero"> Febrero </option> 
                          <option value="marzo"> Marzo </option>                                                 
                          <option value="abril"> Abril </option> 
                          <option value="mayo"> Mayo</option> 
                          <option value="junio"> Junio </option> 
                          <option value="julio"> Julio </option> 
                          <option value="agosto"> Agosto</option> 
                          <option value="septiembre"> Septiembre </option> 
                          <option value="octubre">Octubre</option> 
                          <option value="noviembre">Noviembre</option> 
                      </select>
                      <br>   
                      <input hidden type="number" name="ciclo" value="<?php echo  $id_asignacion_grado_seccion ?>"> 
                
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

</body>

</html>
