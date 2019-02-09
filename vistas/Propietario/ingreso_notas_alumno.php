<?php
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';
$id_asignacion_grado_seccion=$_GET["id"];
$id_pensum=$_GET["id_pensum"];
$contador_ingreso=0;

$sql_info = "SELECT * FROM asignacion_grado_seccion ag inner join grado g on g.id_grado=ag.id_grado inner join pensum pen on pen.id_grado=g.id_grado inner join profesores pr on pr.dpi_profesor= ag.id_profesores where id_asignacion_grado_seccion='$id_asignacion_grado_seccion' and id_pensum='$id_pensum'";
$result_info_general = $conexion->query($sql_info); 
while ($row=$result_info_general->fetch_assoc()) {
   $nombre_grado= $row["nombre"];
   $nombre_materia= $row["nombre_materia"];
   $nombre_catedratico= $row["nombres"];
   $apellido_catedratico= $row["apellidos"];
   $jornada= $row["jornada"];
   $seccion= $row["seccion"];
}

$sql_lista_alumno = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno= a.id_alumno where r.tipo_pago='Inscripcion' and r.id_asignacion_grado_seccion='$id_asignacion_grado_seccion'";
$result_alumno = $conexion->query($sql_lista_alumno); 

while ( $row = $result_alumno->fetch_assoc()) {
	$id_alumno=$row["id_alumno"];
    $id_asignacion_grado_seccion=$row["id_asignacion_grado_seccion"];
	$row["tipo_pago"];
    $insertar=0;
    $sql_alumno = "SELECT * FROM notas_alumno where id_asignacion_grado_seccion='$id_asignacion_grado_seccion' and id_pensum='$id_pensum' and id_alumno='$id_alumno'";
    $result_ya_ingresado = $conexion->query($sql_alumno); 
    while ($row2 = $result_ya_ingresado->fetch_assoc()) {
       $insertar=1;
    }
    $insertar;
 
    if ($insertar==0) {
        $query="INSERT INTO notas_alumno (id_alumno, id_pensum, id_asignacion_grado_seccion, unidad1, unidad2, unidad3, unidad4) VALUES('$id_alumno', '$id_pensum' ,'$id_asignacion_grado_seccion','0','0','0','0')";       
          if ($conexion->query($query) === TRUE) {
                $contador_ingreso++;
                $insertar=0;
              
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }
    }

    $sql_lista_alumno = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno= a.id_alumno inner join notas_alumno na on na.id_alumno= r.id_alumno  where r.tipo_pago='Inscripcion' and r.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' and na.id_pensum='$id_pensum' ORDER BY r.id_alumno ASC";

    $result_lista_alumno= $conexion->query($sql_lista_alumno); 


}




 ?>




                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo "grado: ". $nombre_grado." sección: ".$seccion." jornada: ".$jornada." materia: ".$nombre_materia;?> </h1>
                    
                    <div class="pull-right form-inline"><br>
                        
                        <button class="btn btn-info" onClick="window.location = 'ingreso_notas_id_profesor.php?';">Regresar</button>
                      
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php 
            if (isset($_GET["correcto"])) {
                echo'<script> swal("Ingreso de notas correctamente") </script';                
            }
            else{
            echo'<script> swal("Nuevos Alumnos:'.$contador_ingreso.'") </script';}
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Materias asignadas al catedratico <?php echo $nombre_catedratico." ".$apellido_catedratico; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="guardar_nota_alumno.php" method="POST" enctype="multipart/form-data">
                            <table width="100%" class="table table-striped table-bordered table-hover" id=""> 
                                <thead>
                                    <tr>
                                        <th>Id alumno</th>
                                        <th>Nombre y apellido</th>                                        
                                        <th>Unidad 1</th>
                                        <th>Unidad 2</th>
                                        <th>Unidad 3</th>
                                        <th>Unidad 4</th>
                                        <th>Promedio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                    $contador=0;
                                   while($row = $result_lista_alumno ->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>" . $row["id_alumno"]."</td>";
                                        echo "<td>" . $row["nombres"]." ".$row["apellidos"]. "</td>";
                                        $id=  $row["id_alumno"];                                          
                                        $id_notas_alumno=$row["id_notas_alumno"];
                                        $nota_unidad1=$row["unidad1"];
                                        $nota_unidad2=$row["unidad2"];
                                        $nota_unidad3=$row["unidad3"];
                                        $nota_unidad4=$row["unidad4"];
                                        $promedio=($nota_unidad1+$nota_unidad2+$nota_unidad3+$nota_unidad4)/4;

                                         ?>
                                       
                                        <td><input required type="number"  name="nota1[<?php echo $contador; ?>]" class="form-control" id="nota1[<?php echo $contador; ?>]" value="<?php echo $nota_unidad1;?>" placeholder="Ingrese nota"> </td>

                                        <td><input required type="number"  name="nota2[<?php echo $contador; ?>]" class="form-control" id="nota2[<?php echo $contador; ?>]" value="<?php echo $nota_unidad2;?>" placeholder="Ingrese nota"> </td>

                                        <td><input required type="number"  name="nota3[<?php echo $contador; ?>]" class="form-control" id="nota3[<?php echo $contador; ?>]" value="<?php echo $nota_unidad3;?>" placeholder="Ingrese nota"> </td>

                                        <td><input required type="number"  name="nota4[<?php echo $contador; ?>]" class="form-control" id="nota4[<?php echo $contador; ?>]" value="<?php echo $nota_unidad4;?>" placeholder="Ingrese nota"> </td>

                                        <td><input readonly type="text"  name="promedio[<?php echo $contador; ?>]" class="form-control" id="promedio[<?php echo $contador; ?>]" value="<?php echo $promedio;?>" placeholder="Ingrese nota"> </td>

                                        <input type="hidden" required name="id_alum[<?php echo $contador; ?>]" class="form-control" id="id_alum[<?php echo $contador; ?>]" value="<?php echo $id;?>" placeholder="Ingrese nota"> 

                                        <input type="hidden" required name="id_notas_alumno[<?php echo $contador; ?>]" class="form-control" id="id_notas_alumno[<?php echo $contador; ?>]" value="<?php echo $id_notas_alumno;?>" placeholder="Ingrese nota">


                                <?php    
                                $contador++;                            
                                    } 
                                ?>    
                               

                                <input type="hidden" required name="id_asignacion_grado_seccion" class="form-control" id="id_asignacion_grado_seccion" value="<?php echo $id_asignacion_grado_seccion;?>" placeholder="Ingrese nota"> 

                                <input  type="hidden" required name="id_pensum" class="form-control" id="id_pensum" value="<?php echo $id_pensum;?>" placeholder="Ingrese nota"> 

                       
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <center><button type="Submit" class="btn btn-primary">Ingresar</button></center>
                        </form>
     
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
