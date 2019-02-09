<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';



 $id_alumno=$_GET['id'];


$sql = "select * from alumnos where alumnos.id_alumno='$id_alumno' ";
$result_alumno = $conexion->query($sql); 

$sql = "SELECT g.nombre as nombre_grado, seccion, p.nombres as nombre_profesor, p.apellidos as apellido_profesor, ag.id_asignacion_grado_seccion,jornada, g.id_grado, ac.anio_ciclo_escolar, g.categoria from asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ag.id_anio_ciclo_escolar=ac.id_anio_ciclo_escolar inner join profesores p on p.dpi_profesor=ag.id_profesores inner join grado g on g.id_grado = ag.id_grado ORDER BY `ac`.`anio_ciclo_escolar` DESC  ";
$result_ciclo = $conexion->query($sql); 
$sql = "SELECT * FROM recibo r inner join alumnos a on a.id_alumno = r.id_alumno inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=r.id_asignacion_grado_seccion inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar= ag.id_anio_ciclo_escolar inner join grado g on g.id_grado=ag.id_grado where a.id_alumno='$id_alumno' and tipo_pago='Inscripcion' ";
$result_recibo= $conexion->query($sql); 

?>
                   <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mensualidades</h1>
                    <div class="pull-right form-inline"><br>
              
                        <button class="btn btn-success" onClick="window.location = 'alumno.php';">Regresar</button>
                    </div>
                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>                                      
                                        <th>Id Alumno</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Año del ciclo</th>
                                        <th> Nombre del grado </th>
                                        <th> Pagar Mensualidades</th>
                                    </tr>
                                </thead>
                                <tbody>                        
                                  <?php
                                   while($row = $result_recibo->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>" . $row["id_alumno"] . "</td>";
                                        echo "<td>" .$row["nombres"]." ".$row["apellidos"] . "</td>";
                                        echo "<td>" . $row["anio_ciclo_escolar"] . "</td>";
                                        echo "<td>" . $row["nombre"] ." ".$row["seccion"]." ".$row["jornada"]. "</td>";
                                        $id=  $row["id_alumno"]; 
                                        $id_grado= $row["id_asignacion_grado_seccion"]; 
                                        echo "<td><center>" ."<a href='pago_mensualidad.php?id=$id&id_grado=$id_grado' class='btn btn-primary ' role='button'>Gestionar pagos</a>". "</center></td>"; 
                                         ?>
                                 
                                        </td>       

                                        <?php                                   
                                    }                                     
                                    ?> 
                              
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
     
                        </div>
                        <!-- /.panel-body -->
<?php 
$sql = "SELECT * FROM recibo r inner join alumnos a on a.id_alumno = r.id_alumno inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=r.id_asignacion_grado_seccion inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar= ag.id_anio_ciclo_escolar inner join grado g on g.id_grado=ag.id_grado where a.id_alumno='$id_alumno' and tipo_pago='Inscripcion' ";
$result_recibo= $conexion->query($sql); 
?>

                        <div class="col-lg-12">
                    <h1 class="page-header">Otros pagos</h1>
                    <div class="pull-right form-inline"><br>
              
           
                    </div>
                </div>

                     <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>                                      
                                        <th>Id Alumno</th>
                                        <th>Nombre y Apellidos</th>
                                        <th>Año del ciclo</th>
                                        <th> Nombre del grado </th>
                                        <th>Otros Pagos</th>
                                    </tr>
                                </thead>
                                <tbody>                        
                                   <?php
                                   while($row = $result_recibo->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo "<td>" . $row["id_alumno"] . "</td>";
                                        echo "<td>" .$row["nombres"]." ".$row["apellidos"] . "</td>";
                                        echo "<td>" . $row["anio_ciclo_escolar"] . "</td>";
                                        echo "<td>" . $row["nombre"] ." ".$row["seccion"]." ".$row["jornada"]. "</td>";
                                        $id=  $row["id_alumno"]; 
                                        $id_grado= $row["id_asignacion_grado_seccion"]; 
                                        $anio=$row["anio_ciclo_escolar"];
                                        echo "<td><center>" ."<a href='pago_varios.php?id=$id&id_grado=$id_grado&anio=$anio' class='btn btn-primary ' role='button'>Gestionar pagos</a>". "</center></td>"; 
                                         ?>
                                 
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

</html>
