<?php
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';
echo $id_catedratico=$_POST["id_catedratico"];
echo $anio=$_POST["anio"]."<br>";


$sql = "SELECT * FROM asignacion_maestro_seccion am inner join profesores pr on pr.dpi_profesor= am.id_profesor inner join pensum pen on pen.id_pensum = am.id_pensum inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion = am.id_asignacion_grado_seccion inner join grado on grado.id_grado= ag.id_grado inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar=ag.id_anio_ciclo_escolar where anio_ciclo_escolar='$anio' and dpi_profesor='$id_catedratico' ";
$result_catedratico = $conexion->query($sql); 
$nombre_grado="";
	$jornada="";
	$seccion="";
	$nombre_catedratico="";
while ( $row = $result_catedratico->fetch_assoc()) {
	$nombre_catedratico=$row["nombres"]." ".$row["apellidos"];
	$nombre_grado=$row["nombre"];
	$jornada=$row["jornada"];
	$seccion=$row["seccion"];
	$anio_ciclo_escolar=$row["anio_ciclo_escolar"];
	$id_grado=$row["id_grado"];
	$row["nombre_materia"]." ".$row["anio_ciclo_escolar"]."<br>";

}

$result_catedratico = $conexion->query($sql); 
 ?>




                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Materias asignadas al catedratico <?php echo $nombre_catedratico; ?> </h1>
                    <div class="pull-right form-inline"><br>
                        
                        <button class="btn btn-info" onClick="window.location = 'ingreso_notas_id_profesor.php?';">Regresar</button>
                      
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Materias asignadas al catedratico <?php echo $nombre_catedratico; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th>Nombre del catedatico</th>
                                        <th>Grado, seccion y jornada</th>
                                        <th>Nombre de la meteria</th>
                                        <th>Ingresar Notas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                   while($row = $result_catedratico ->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>" . $row["nombres"]." ".$row["apellidos"]. "</td>";
                                        echo "<td>" ."Grado: " . $row["nombre"]." Seccion: " . $row["seccion"] ." Jornada: ". $row["jornada"]."</td>";
                                        echo "<td>" . $row["nombre_materia"].  "</td>";
                                        $id=  $row["id_asignacion_grado_seccion"]; 
                                        $id_pensum= $row["id_pensum"]; 
                                        echo "<td><center>" ."<a href='ingreso_notas_alumno.php?id=$id&id_pensum=$id_pensum' class='btn btn-primary ' role='button'>Ingresar</a>". "</center></td>";
                                      
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